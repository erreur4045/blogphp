<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 01/04/2019
 * Time: 12:57
 * PHP version 7.2
 *
 * Post class
 *
 * Classe qui permet de creer et recuper les valeurs d'un post
 *
 * @category Exemple
 * @package  BlogphpOCR_OCR_Php_Symfony
 * @author   Maxime <contact@maximethierry.xyz>
 * @license  Phpstorm exemple@exemple.com
 * @link     Exemple
 */

class Post
{
    private $id;
    private $title;
    private $content;
    private $date;
    private $authorpost;

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
    public function getAuthorpost()
    {
        return $this->authorpost;
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
     * @param mixed $authorpost
     */
    public function setAuthorpost($authorpost)
    {
            $this->authorpost = $authorpost;
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