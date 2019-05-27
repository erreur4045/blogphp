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

    public function __construct($donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $values)
        {
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($values);
            }
        }
    }

    public function GetComments($postid)
    {
        $db = DatabaseConnection::dbConnect();
        $comments = $db->prepare('SELECT id, autor, text, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM blogphp_commentaire WHERE post_id = ? ORDER BY comment_date_fr DESC');
        $comments->execute(array($postid));

        return $comments;
    }
    public function AddComment($postid, $author, $comment_date)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $addcom = $db->prepare('INSERT INTO blogphp_commentaire (post_id,autor,text,comment_date) VALUES (:idpost, :autor, :comment, NOW()) ');
            $addcom->execute(array(':idpost' => $postid, ':autor' => $author, ':comment' => $comment_date));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function UpdateComment($id, $postid, $newcom)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $update = $db->prepare('UPDATE `blogphp_commentaire` SET `text` = :newcom, `comment_date` = NOW()  WHERE `blogphp_commentaire`.`id` = :id AND `blogphp_commentaire`.`post_id` = :idpost ');
            $update->execute(array(':newcom' => $newcom, ':idpost' => $postid, ':id' => $id));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /*---------------------------------------getteurs-------------------------------/*
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
    public function getPostid()
    {
        return $this->postid;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getComment_date()
    {
        return $this->comment_date;
    }
/*---------------------------------------setteurs-------------------------------/*
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $postid
     */
    public function setPostid($postid)
    {
        $this->postid = $postid;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @param mixed $comment_date
     */
    public function setComment_date($comment_date)
    {
        $this->comment_date = $comment_date;
    }

}