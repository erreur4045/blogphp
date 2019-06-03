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
        $db = DatabaseConnection::dbConnect();
        $deletepost = $db->prepare('DELETE FROM blogphp_posts WHERE number = :id AND author = :author');
        $deletepost->execute(array(
            ':id'=>$post->getNumber(),
            ':author'=>$post->getAuthor()
        ));
        $deletecom = $db->prepare('DELETE FROM blogphp_commentaire WHERE post_id = :id ');
        $deletecom->execute(array(
            ':id'=>$post->getNumber()
        ));
        return 1;
    }
    public function addPost(Post $post)
    {
        $db = DatabaseConnection::dbConnect();
        $recup = $db->prepare('INSERT INTO `blogphp_posts` (`title`, `content`, `date`, `author`) VALUES (:title, :content, NOW(), :author)');
        $recup->execute(array(
            ':title'=>$post->getTitle(),
            ':content'=>$post->getContent(),
            ':author'=>$post->getAuthor()
        ));
        return 1;
    }

    public function updatePost(Post $post)
    {
        echo $post->getNumber();
        $db = DatabaseConnection::dbConnect();
        $recup = $db->prepare('UPDATE blogphp_posts SET title = :newtitle, content = :newcontent, date = NOW() WHERE `blogphp_posts`.`number` = :number AND author = :author');
        $result = $recup->execute(array(
        ':newtitle' => $post->getTitle(),
        ':number' => $post->getNumber(),
        'newcontent'=>$post->getContent(),
        'author'=>$post->getAuthor()
    ));
    }

    public function deletePost(Post $post)
    {
        $req = DatabaseConnection::dbConnect()->prepare('DELETE FROM `blogphp_posts` WHERE number = :idpost');
        $req->execute(array(
            ':idpost' => $post->getNumber()
        ));
    }

    public function selectLastPosts()
    {
        $lastpost = [];

        $q = DatabaseConnection::dbConnect()->query('SELECT number, title, content, date, author FROM blogphp_posts ORDER BY date DESC LIMIT 0, 5');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $lastpost[] = new Post($donnees);
        }

        return $lastpost;
    }

    public function selectAuthorByNumberPost(Post $post)
    {
        $req = DatabaseConnection::dbConnect()->prepare('SELECT * FROM `blogphp_posts` WHERE number = :idpost');
        $req->execute(array(
            ':idpost' => $post->getNumber()
        ));
        return $req;
    }

    public function selectAllPosts()
    {
        $req = DatabaseConnection::dbConnect()->query('SELECT number, title, content, date, author FROM blogphp_posts ORDER BY date DESC');
        return $req;
    }
    public function selectPostById(Post $post)
    {
        $req = DatabaseConnection::dbConnect()->prepare('SELECT number, title, content, author, date FROM blogphp_posts WHERE number = :number');
        $req->execute(array(
            ':number' => $post->getNumber()
        ));
        $post = $req->fetch();

        return $post;
    }
    public function selectPostByAuthorSession(Post $post)
    {
        $req = DatabaseConnection::dbConnect()->prepare('SELECT * FROM blogphp_posts WHERE author = :author ORDER BY date DESC');
        $req->execute(array(
            ':author' => $post->getAuthor()
        ));
        $result = $req->fetchAll();
        var_dump($result);
        return $req;
    }
}