<?php
/**
 * PostManager class file
 *
 * PHP Version 7.0
 *
 * @category Post
 * @package  Post
 * @author   Maxime THIERRY <contact@maximethierry.xyz>
 * @license  Phpstorm exemple@exemple.com
 * @link     Exemple
 */

/**
 * PostManager class
 *
 * Class qui permet la gestion des methodes associer a la class Post
 *
 * @category Post
 * @package  Post
 * @author   Maxime THIERRY <contact@maximethierry.xyz>
 * @license  Phpstorm exemple@exemple.com
 * @link     Exemple
 */


class PostManager
{
    /**
     * Suppresion des posts avec id et author
     *
     * @param Post $post object Post
     *
     * @return void
     */
    public function suppr(Post $post)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $deletepost = $db->prepare(
                'DELETE FROM blogphp_posts 
                            WHERE number = :id 
                                  AND author = :author'
            );
            $deletepost->execute(
                array(
                ':id' => $post->getNumber(),
                ':author' => $post->getAuthor()
                    )
            );
            $deletecom = $db->prepare(
                'DELETE FROM blogphp_commentaire 
                              WHERE postid = :id '
            );
            $deletecom->execute(
                array(
                ':id' => $post->getNumber()
                    )
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Ajout d'un post avec titre content et auteur
     *
     * @param Post $post object Post
     *
     * @return void
     */
    public function addPost(Post $post)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare(
                'INSERT INTO `blogphp_posts` 
                            (`title`, `content`, `date`, `author`) 
                            VALUES (:title, :content, NOW(), :author)'
            );
            $recup->execute(
                array(
                ':title' => $post->getTitle(),
                ':content' => $post->getContent(),
                ':author' => $post->getAuthor()
                    )
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * MAJ d'un post avec titre content et auteur
     *
     * @param Post $post object Post
     *
     * @return void
     */
    public function updatePost(Post $post)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare(
                'UPDATE blogphp_posts 
                            SET title = :newtitle, 
                                content = :newcontent, 
                                date = NOW() 
                            WHERE `blogphp_posts`.`number` = :number 
                            AND author = :author'
            );
            $result = $recup->execute(
                array(
                ':newtitle' => $post->getTitle(),
                ':number' => $post->getNumber(),
                'newcontent' => $post->getContent(),
                'author' => $post->getAuthor()
                    )
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Supprime un post avec idpost
     *
     * @param Post $post object Post
     *
     * @return void
     */
    public function deletePost(Post $post)
    {
        try {
            $req = DatabaseConnection::dbConnect()->prepare(
                'DELETE FROM `blogphp_posts` WHERE number = :idpost'
            );
            $req->execute(
                array(
                ':idpost' => $post->getNumber()
                    )
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * MAJ d'un post avec titre content et auteur
     *
     * @return void
     */
    public function selectLastPosts()
    {
        try {
            $lastpost = [];

            $q = DatabaseConnection::dbConnect()->query(
                'SELECT number, title, content, date, author 
                                FROM blogphp_posts 
                                    ORDER BY date DESC LIMIT 0, 6'
            );

            while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
                $lastpost[] = new Post($donnees);
            }
            return $lastpost;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Recupere l'auteur avec idpost
     *
     * @param Post $post object Post
     *
     * @return Array un array obj post
     */
    public function selectAuthorByNumberPost(Post $post)
    {
        try {
            $req = DatabaseConnection::dbConnect()->prepare(
                'SELECT * FROM `blogphp_posts` WHERE number = :idpost'
            );
            $req->execute(
                array(
                ':idpost' => $post->getNumber()
                    )
            );
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            if ($donnees == false)
                return 0;
            else
                return new Post($donnees);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Selectionne tout les posts
     *
     * @return Array un array obj post
     */
    public function selectAllPosts()
    {
        try {
            $allpost = [];

            $q = DatabaseConnection::dbConnect()->query(
                'SELECT number, title, content, date, author 
                            FROM blogphp_posts ORDER BY date DESC'
            );

            while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
                $allpost[] = new Post($donnees);
            }

            return $allpost;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Selectionne un post par number (l'id du post)
     *
     * @param Post $post object Post
     *
     * @return Array un array obj post
     */
    public function selectPostById(Post $post)
    {
        try {
            $req = DatabaseConnection::dbConnect()->prepare(
                'SELECT number, title, content, author, date 
                              FROM blogphp_posts 
                              WHERE number = :number'
            );
            $req->execute(
                array(
                ':number' => $post->getNumber()
                    )
            );
            $isempty = $req->rowCount();
            if ($isempty >= 1) {
                $post = $req->fetch();
                if ($post == false)
                    return 0;
                else
                return new Post($post);
            } else {
                false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }

    /**
     * MAJ d'un post avec titre content et auteur
     *
     * @param Post $post object Post
     *
     * @return void
     */
    //todo : renvoyer new post
    public function selectPostByAuthorSession( Post $post)
    {
        try {
            $req = DatabaseConnection::dbConnect()->prepare(
                'SELECT * FROM blogphp_posts 
                                WHERE author = :author 
                                ORDER BY date DESC'
            );
            $req->execute(
                array(
                ':author' => $post->getAuthor()
                     )
            );
            $result = $req->fetchAll();
            return $req;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}