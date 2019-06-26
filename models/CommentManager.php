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
    public function getComments(Post $data)
    {
        try {
            $all_comments = [];
            $db = DatabaseConnection::dbConnect();
            $comments = $db->prepare(
                'SELECT
  blogphp_commentaire.id,                              
  blogphp_posts.id,                                    
 blogphp_membres.pseudo as authorstring,
  approved                                           ,
  author,
  postid,
  text                                                ,
  DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date
FROM blogphp_commentaire
  JOIN blogphp_posts ON blogphp_commentaire.postid = blogphp_posts.id
  JOIN blogphp_membres ON blogphp_posts.authorpost = blogphp_membres.id
WHERE postid = :id
      AND approved = 1
ORDER BY comment_date ASC
'
            );
            $comments->execute(array(':id' => $data->getId()));

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
    public function getCommentsByUser(User $user)
    {
        try {
            $all_comments_by_user = [];
            $db = DatabaseConnection::dbConnect();
            $comments = $db->prepare(
                'SELECT blogphp_commentaire.id, author, text, postid ,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date
FROM blogphp_commentaire
JOIN blogphp_membres ON blogphp_commentaire.author = blogphp_membres.id
WHERE blogphp_membres.id = :id'
            );
            $comments->execute(array(':id' => $user->getId()));
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
    public function getCommentsToBeApproved(User $user)
    {
        try {
            $get_comments_to_approve = [];
            $db = DatabaseConnection::dbConnect();
            $comments = $db->prepare(
                '
                SELECT blogphp_commentaire.id, text, comment_date, approved, author, postid, pseudo, grade
FROM blogphp_commentaire
  JOIN blogphp_membres ON blogphp_commentaire.author = blogphp_membres.id
WHERE author != :id
      AND approved = 0'
            );
            $comments->execute(array(':id' => $user->getId()));
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
                              (postid,author,text,comment_date,approved) 
                              VALUES (:idpost, :autor, :comment, NOW(),0) '
            );
            $addcom->execute(
                array(
                ':idpost' => $comment->getPostid(),
                ':autor' => $comment->getAuthor(),
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
                              (postid,author,text,comment_date,approved) 
                            VALUES (:idpost, :autor, :comment, NOW(),1)'
            );
            $addcom->execute(
                array(
                ':idpost' => $comment->getPostid(),
                ':autor' => $comment->getAuthor(),
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
                                AND id = :id 
                                AND author = :author'
            );
            $thecomment->execute(
                array(
                ':idpost' => $comment->getPostid(),
                ':id' => $comment->getId(),
                'author' => $comment->getAuthor()
                    )
            );
            $com = $thecomment->fetch();
            if ($com == false)
                return 0;
            else
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
                'SELECT author
            FROM blogphp_commentaire 
            WHERE id = :id '
            );
            $comments->execute(
                array(':id' => $comment->getId())
            );
            $author = $comments->fetch();
            if ($author == false)
                return 0;
            else
                return new Comment($author);

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}