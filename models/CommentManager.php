<?php
/**
 * CommentManager class file
 *
 * PHP Version 7.0
 *
 * @category Comment
 * @package  Comment
 * @author   Maxime THIERRY <contact@maximethierry.xyz>
 * @license  Phpstorm exemple@exemple.com
 * @link     Exemple
 */

/**
 * CommentManager class
 *
 * Class qui permet la gestion des methodes associer a la class Comment
 *
 * @category Comment
 * @package  Comment
 * @author   Maxime THIERRY <contact@maximethierry.xyz>
 * @license  Phpstorm exemple@exemple.com
 * @link     Exemple
 */

class CommentManager
{
    /**
     * Recupere les commentaire avec le idpost
     *
     * @param Comment $comment object commentaire
     *
     * @return array Un array d'objets Comment
     */
    // todo function doit recevoir un obj post
    public function getComments(Comment $comment)
    {
        try {
            $all_comments = [];
            $db = DatabaseConnection::dbConnect();
            $comments = $db->prepare(
                'SELECT id, postid, autor, approved, text, 
               DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date 
             FROM blogphp_commentaire 
             WHERE postid = :idpost 
               AND approved = 1 ORDER BY comment_date ASC '
            );
            $comments->execute(array(':idpost' => $comment->getPostid()));

            while ($donnees = $comments->fetch(PDO::FETCH_ASSOC)) {
                $all_comments[] = new Comment($donnees);
            }

            return $all_comments;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Recupere les commentaire par l'auteur
     *
     * @param Comment $comment object commentaire
     *
     * @return array Un array d'objets Comment
     */
    //todo function doit recevoir un obj user
    public function getCommentsByUser(Comment $comment)
    {
        try {
            $all_comments_by_user = [];
            $db = DatabaseConnection::dbConnect();
            $comments = $db->prepare(
                'SELECT id, autor, text, postid, 
            DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date 
            FROM blogphp_commentaire 
            WHERE autor = :author ORDER BY comment_date DESC'
            );
            $comments->execute(array(':author' => $comment->getAutor()));
            while ($donnees = $comments->fetch(PDO::FETCH_ASSOC)) {
                $all_comments_by_user[] = new Comment($donnees);
            }
            return $all_comments_by_user;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Recupere les commentaire à approver
     *
     * @param Comment $comment object commentaire
     *
     * @return array Un array d'objets Comment
     */
    public function getCommentsToBeApproved(Comment $comment)
    {
        //todo : pas passer par obj com, autor post = autor personne connecter
        try {
            $get_comments_to_approve = [];
            $db = DatabaseConnection::dbConnect();
            $comments = $db->prepare(
                'SELECT *
                            FROM blogphp_posts
                            JOIN blogphp_commentaire ON blogphp_commentaire.postid = blogphp_posts.number
                            WHERE autor != :author 
                              AND author = :author
                              AND approved = 0'
            );
            $comments->execute(array(':author' => $comment->getAutor()));
            while ($donnees = $comments->fetch(PDO::FETCH_ASSOC)) {
                $get_comments_to_approve[] = new Comment($donnees);
            }

            return $get_comments_to_approve;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Ajoute un commentaire avec la 0 pour approved pour approbation par l'auteur
     *
     * @param Comment $comment object commentaire
     *
     * @return void
     */
    public function addCommentWithVerrif(Comment $comment)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $addcom = $db->prepare(
                'INSERT INTO blogphp_commentaire 
                              (postid,autor,text,comment_date,approved) 
                              VALUES (:idpost, :autor, :comment, NOW(),0) '
            );
            $addcom->execute(
                array(
                ':idpost' => $comment->getPostid(),
                ':autor' => $comment->getAutor(),
                ':comment' => $comment->getText()
                )
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Ajoute un commentaire avec la 1 pour approved sans approbation car même auteur
     *
     * @param Comment $comment object commentaire
     *
     * @return void
     */
    public function addCommentLessVerrif(Comment $comment)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $addcom = $db->prepare(
                'INSERT INTO blogphp_commentaire 
                              (postid,autor,text,comment_date,approved) 
                            VALUES (:idpost, :autor, :comment, NOW(),1)'
            );
            $addcom->execute(
                array(
                ':idpost' => $comment->getPostid(),
                ':autor' => $comment->getAutor(),
                ':comment' => $comment->getText()
                    )
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Met à jour un commentaire
     *
     * @param Comment $comment object commentaire
     *
     * @return void
     */
    public function updateComment(Comment $comment)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $update = $db->prepare(
                'UPDATE `blogphp_commentaire` 
                             SET `text` = :newcom  
                             WHERE `blogphp_commentaire`.`id` = :id 
                             AND `blogphp_commentaire`.`postid` = :idpost '
            );
            $update->execute(
                array(
                ':newcom' => $comment->getText(),
                ':idpost' => $comment->getPostid(),
                ':id' => $comment->getId()
                    )
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Recupere un commentaire avec idpost id et auteur
     *
     * @param Comment $comment object commentaire
     *
     * @return Array un array obj com
     */
    public function getComment(Comment $comment)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $thecomment = $db->prepare(
                'SELECT text FROM blogphp_commentaire 
                              WHERE postid = :idpost 
                                AND id= :id 
                                AND autor = :author'
            );
            $thecomment->execute(
                array(
                ':idpost' => $comment->getPostid(),
                ':id' => $comment->getId(),
                'author' => $comment->getAutor()
                    )
            );
            $com = $thecomment->fetch();
            return new Comment($com);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Supprime commentaire avec id et idpost
     *
     * @param Comment $com object commentaire
     *
     * @return void
     */
    public function supprCom(Comment $com)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare(
                'DELETE FROM blogphp_commentaire 
                                WHERE id = :id AND postid = :postid'
            );
            $recup->execute(
                array(
                ':id' => $com->getId(),
                ':postid' => $com->getPostid()
                    )
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Valide commentaire, function appeler dans la vue dashboard,
     * change la valeur de approved à 1.
     *
     * @param Comment $com object commentaire
     *
     * @return void
     */
    public function validCom(Comment $com)
    {
        try {

            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare(
                'UPDATE `blogphp_commentaire` 
                              SET `approved` = 1 
                              WHERE id = :id 
                                AND postid = :postid'
            );
            $recup->execute(
                array(
                    ':id' => $com->getId(),
                    ':postid' => $com->getPostid()
                )
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Recupere les commentaire par l'auteur
     *
     * @param Comment $comment object commentaire
     *
     * @return obj Un obj Comment
     */
    public function getAuthorByIdCom(Comment $comment)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $comments = $db->prepare(
                'SELECT autor
            FROM blogphp_commentaire 
            WHERE id = :id '
            );
            $comments->execute(
                array(':id' => $comment->getId())
            );
            $author = $comments->fetch();
            return new Comment($author);

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}