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
    private $isadmin;


    function isadmin($username){
        try{
            $db = dbConnect();
            $recup = $db->prepare('SELECT * FROM membre WHERE pseudo = :username');
            $recup->execute(array(':username' => $username));
            $result = $recup->fetch();
            return $result;
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function AddUser($pseudo, $pass, $email)
    {
        //echo "<pre>";
        //var_dump($pseudo, $pass, $email);
        try {
            $db = dbConnect();
            $verrifname = $db->prepare('SELECT * FROM membre WHERE pseudo=:pseudo ');
            $verrifname->execute(array(':pseudo' => $pseudo));
            $isname = $verrifname->rowCount();
            $verrifmail = $db->prepare('SELECT * FROM membre WHERE email=:email ');
            $verrifmail->execute(array(':email' => $email));
            $ismail = $verrifmail->rowCount();
            if ($isname > 0) {
                return 1;
            } elseif ($ismail > 0) {
                return 2;
            } else {
                $pass_hache = password_hash($pass, PASSWORD_DEFAULT);
                $req = $db->prepare('INSERT INTO membre(pseudo, pass, email, date_sub) VALUES(:pseudo, :pass, :email, CURDATE())');
                $req->execute(array(
                    ':pseudo' => $pseudo,
                    ':pass' => $pass_hache,
                    ':email' => $email
                ));
            }

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function ConnectionUser($pseudo, $pass)
    {
        try {
            $db = dbConnect();
            $recup = $db->prepare('SELECT * FROM membre WHERE pseudo = :pseudo');
            $recup->execute(array(':pseudo' => $pseudo));
            $result = $recup->fetch();
            return password_verify($pass, $result['pass']);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function VerrifAutor()
    {
        try {
            $db = dbConnect();
            $recup = $db->prepare('SELECT * FROM commentt WHERE autor = :autor AND post_id= :post_id');
            $recup->execute(array(':pseudo' => $_SESSION['username'], ':post_id' => $_SESSION['username'] ));
            $result = $recup->fetch();
            $isautor = $result->rowCount();
            if ($isautor = 0)
                return 0;
            else
                return 1;
            return 1;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

/*    public function IsAdmin($username)
    {
        try{
            $db = dbConnect();
            $recup = $db->prepare('SELECT * FROM membre WHERE pseudo = :username');
            $recup->execute(array(':username' => $username));
            $result = $recup->fetch();
            return $result;
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }*/

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
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getDatesub()
    {
        return $this->datesub;
    }

    /**
     * @param mixed $datesub
     */
    public function setDatesub($datesub)
    {
        $this->datesub = $datesub;
    }

    /**
     * @return mixed
     */
    public function getIsadmin()
    {
        return $this->isadmin;
    }

    /**
     * @param mixed $isadmin
     */
    public function setIsadmin($isadmin)
    {
        $this->isadmin = $isadmin;
    }


}