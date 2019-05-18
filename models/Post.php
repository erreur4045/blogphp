<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 06/05/2019
 * Time: 12:15
 */

class Post
{
    private $number;
    private $title;
    private $content;
    private $date;
    private $author;

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

    /*------------------------------getters-------------------------------------------*/


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
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }


    /*------------------------------setters-------------------------------------------*/
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
    private function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $content
     */
    private function setNumber($number)
    {
        $this->number = $number;
    }
    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        if (is_string($author) && strlen($author) <= 255) {
            $this->author = (string)$author;
        }
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        if (is_string($title) && strlen($title) <= 255) {
            $this->title = (string)$title;
        }
    }

}