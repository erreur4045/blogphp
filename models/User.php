<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 06/05/2019
 * Time: 15:55
 */

class User
{
    private $id;
    private $pseudo;
    private $pass;
    private $email;
    private $datesub;
    private $grade;


    public function __construct($donnees)
    {
        if (isset($donnees))
            $this->hydrate($donnees);
        else
            echo 'pas de donnees dans le construct';
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
    /*------------------------------setters-------------------------------------------*/
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $datesub
     */
    public function setDatesub($datesub)
    {
        $this->datesub = $datesub;
    }

    /**
     * @param mixed $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /*------------------------------getters-------------------------------------------*/
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
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getDatesub()
    {
        return $this->datesub;
    }

    /**
     * @return mixed
     */
    public function getGrade()
    {
        return $this->grade;
    }
}