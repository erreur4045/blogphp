<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 06/05/2019
 * Time: 15:27
 */

class Comment
{
    private $id;
    private $postid;
    private $autor;
    private $text;
    private $comment_date;

    public function __construct()
    {

    }

    public function GetComments($postid)
    {
        $db = DatabaseConnection::dbConnect();
        $comments = $db->prepare('SELECT id, autor, text, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentt WHERE post_id = ? ORDER BY comment_date_fr DESC');
        $comments->execute(array($postid));

        return $comments;
    }
    public function AddComment($postid, $author, $comment_date)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $addcom = $db->prepare('INSERT INTO commentt (post_id,autor,text,comment_date) VALUES (:idpost, :autor, :comment, NOW()) ');
            $addcom->execute(array(':idpost' => $postid, ':autor' => $author, ':comment' => $comment_date));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function UpdateComment($id, $postid, $newcom)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $update = $db->prepare('UPDATE `commentt` SET `text` = :newcom, `comment_date` = NOW()  WHERE `commentt`.`id` = :id AND `commentt`.`post_id` = :idpost ');
            $update->execute(array(':newcom' => $newcom, ':idpost' => $postid, ':id' => $id));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPostid()
    {
        return $this->postid;
    }

    /**
     * @param mixed $postid
     */
    public function setPostid($postid)
    {
        $this->postid = $postid;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getCommentDate()
    {
        return $this->comment_date;
    }

    /**
     * @param mixed $comment_date
     */
    public function setCommentDate($comment_date)
    {
        $this->comment_date = $comment_date;
    }

    
}