<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 06/05/2019
 * Time: 12:15
 */

class post
{
    private $id;
    private $title;
    private $content;
    private $date;


    public function AddNewPost()
    {

    }

    public function GetArticles()
    {
        $db = DatabaseConnection::dbConnect();
        $req = $db->query('SELECT number, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, author FROM post ORDER BY creation_date_fr DESC LIMIT 0, 5');

        return $req;
    }

    public static function GetArticlesById($postId)
    {
        $db = DatabaseConnection::dbConnect();
        $req = $db->prepare('SELECT number, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post WHERE number = ? ORDER BY creation_date_fr DESC');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

}