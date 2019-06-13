<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 16/05/2019
 * Time: 11:32
 */

class PostManager
{
    public function suppr(Post $post)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $deletepost = $db->prepare('DELETE FROM blogphp_posts WHERE number = :id AND author = :author');
            $deletepost->execute(array(
                ':id' => $post->getNumber(),
                ':author' => $post->getAuthor()
            ));
            $deletecom = $db->prepare('DELETE FROM blogphp_commentaire WHERE post_id = :id ');
            $deletecom->execute(array(
                ':id' => $post->getNumber()
            ));
            return 1;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function addPost(Post $post)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare('INSERT INTO `blogphp_posts` (`title`, `content`, `date`, `author`) VALUES (:title, :content, NOW(), :author)');
            $recup->execute(array(
                ':title' => $post->getTitle(),
                ':content' => $post->getContent(),
                ':author' => $post->getAuthor()
            ));
            return 1;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function updatePost(Post $post)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare('UPDATE blogphp_posts SET title = :newtitle, content = :newcontent, date = NOW() WHERE `blogphp_posts`.`number` = :number AND author = :author');
            $result = $recup->execute(array(
                ':newtitle' => $post->getTitle(),
                ':number' => $post->getNumber(),
                'newcontent' => $post->getContent(),
                'author' => $post->getAuthor()
            ));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function deletePost(Post $post)
    {
        try {
            $req = DatabaseConnection::dbConnect()->prepare('DELETE FROM `blogphp_posts` WHERE number = :idpost');
            $req->execute(array(
                ':idpost' => $post->getNumber()
            ));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function selectLastPosts()
    {
        try {
            $lastpost = [];

            $q = DatabaseConnection::dbConnect()->query('SELECT number, title, content, date, author FROM blogphp_posts ORDER BY date DESC LIMIT 0, 6');

            while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
                $lastpost[] = new Post($donnees);
            }
            return $lastpost;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function selectAuthorByNumberPost(Post $post)
    {
        try {
            $all_post = [];
            $req = DatabaseConnection::dbConnect()->prepare('SELECT * FROM `blogphp_posts` WHERE number = :idpost');
            $req->execute(array(
                ':idpost' => $post->getNumber()
            ));
            while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
                $all_post[] = new Post($donnees);
            }
            return $all_post;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function selectAllPosts()
    {
        try {
            $allpost = [];

            $q = DatabaseConnection::dbConnect()->query('SELECT number, title, content, date, author FROM blogphp_posts ORDER BY date DESC');

            while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
                $allpost[] = new Post($donnees);
            }

            return $allpost;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function selectPostById(Post $post)
    {
        try {
            $req = DatabaseConnection::dbConnect()->prepare('SELECT number, title, content, author, date FROM blogphp_posts WHERE number = :number');
            $req->execute(array(
                ':number' => $post->getNumber()
            ));
            $isempty = $req->rowCount();
            if ($isempty >= 1) {
                $post = $req->fetch();
                return new Post($post);
            } else {
                return 2;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }

    public
    function selectPostByAuthorSession(
        Post $post
    ) {
        try {
            $req = DatabaseConnection::dbConnect()->prepare('SELECT * FROM blogphp_posts WHERE author = :author ORDER BY date DESC');
            $req->execute(array(
                ':author' => $post->getAuthor()
            ));
            $result = $req->fetchAll();
            return $req;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}