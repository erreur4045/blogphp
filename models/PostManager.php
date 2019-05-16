<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 16/05/2019
 * Time: 11:32
 */

class PostManager
{
    public function __construct()
    {

    }

    public function addPost()
    {
        
    }

    public function updatePost()
    {

    }

    public function deletePost()
    {
        
    }

    public function selectPosts()
    {
        $req = DatabaseConnection::dbConnect()->query('SELECT number, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, author FROM post ORDER BY creation_date_fr DESC LIMIT 0, 5');

        return $req;
    }

    public function selectPostById($postId)
    {
        $req = DatabaseConnection::dbConnect()->prepare('SELECT number, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post WHERE number = ? ORDER BY creation_date_fr DESC');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
}