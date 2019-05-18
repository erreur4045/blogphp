<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 16/05/2019
 * Time: 11:32
 */

class PostManager
{
    public function addPost(Post $post)
    {
        $db = DatabaseConnection::dbConnect();
        $recup = $db->prepare('INSERT INTO `post` (`title`, `content`, `date`, `author`) VALUES (:title, :content, NOW(), :author)');
        $recup->execute(array(
            ':title'=>$post->getTitle(),
            ':content'=>$post->getContent(),
            ':author'=>$post->getAuthor()
        ));
        return 1;
    }

    public function updatePost(Post $post)
    {
        $db = DatabaseConnection::dbConnect();
        $recup = $db->prepare('UPDATE `post` SET `title` = :newtitle, `content` = :newcontent WHERE `post`.`number` = 20');
        $recup->execute(array(
            ':newtitle' => $post->getTitle(),
            'newcontnent'=>$post->getContent()
        ));
    }

    public function deletePost(Post $post)
    {
        $req = DatabaseConnection::dbConnect()->prepare('DELETE FROM `post` WHERE `post`.`number` = :idpost');
        $req->execute(array(
            ':idpost' => $post->getNumber()
        ));
    }

    public function selectLastPosts()
    {
        $req = DatabaseConnection::dbConnect()->query('SELECT number, title, content, date, author FROM post ORDER BY date DESC LIMIT 0, 5');
        return $req;
    }

    public function selectAllPosts()
    {
        $req = DatabaseConnection::dbConnect()->query('SELECT number, title, content, date, author FROM post ORDER BY date DESC');
        return $req;
    }
    public function selectPostById(Post $post)
    {
        $req = DatabaseConnection::dbConnect()->prepare('SELECT number, title, content, date FROM post WHERE number = ? ORDER BY date DESC');
        $req->execute(array($post->getNumber()));
        $post = $req->fetch();

        return $post;
    }
    public function selectPostByAuthorSession(Post $post)
    {
        $req = DatabaseConnection::dbConnect()->prepare('SELECT * FROM post WHERE author = :author ORDER BY date DESC');
        $req->execute(array(
            ':author' => $post->getAuthor()
        ));
        $result = $req->fetchAll();
        var_dump($result);
        return $req;
    }
}