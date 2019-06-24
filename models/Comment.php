<?php
class Comment
{
    private $id;
    private $text;
    private $comment_date;
    private $author;
    private $postid;
    private $approved;

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
    public function getApproved()
    {
        return $this->approved;
    }
    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
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
     * @param mixed $approved
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
    }
    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
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