<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 18/05/2019
 * Time: 23:09
 */

class UserManager
{
    function GetAllPostsByUser(User $user){

        try{
            $all_post = [];
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare('SELECT * FROM blogphp_posts WHERE author = :username');
            $recup->execute(array(
                ':username' => $user->getPseudo()
            ));
            while ($donnees = $recup->fetch(PDO::FETCH_ASSOC))
            {
                $all_post[] = new Post($donnees);
            }
            return $all_post;
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    function GradeUser(User $user){

        try{
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare('SELECT grade FROM blogphp_membres WHERE pseudo = :username');
            $recup->execute(array(
                ':username' => $user->getPseudo()
            ));

        $donnees = $recup->fetch();

            return new User($donnees);
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function AddUser(User $user)
    {

        try {
            $db = DatabaseConnection::dbConnect();

            $verrifname = $db->prepare('SELECT * FROM blogphp_membres WHERE pseudo=:pseudo ');
            $verrifname->execute(array(
                ':pseudo' => $user->getPseudo()
            ));
            $isname = $verrifname->rowCount();

            $verrifmail = $db->prepare('SELECT * FROM blogphp_membres WHERE email=:email ');
            $verrifmail->execute(array(
                ':email' => $user->getEmail()
            ));
            $ismail = $verrifmail->rowCount();
            if ($isname > 0) {
                return 1;
            } elseif ($ismail > 0) {
                return 2;
            } else {
                $pass_hache = password_hash($user->getPass(), PASSWORD_DEFAULT);
                $req = $db->prepare('INSERT INTO blogphp_membres(pseudo, pass, email, datesub) VALUES(:pseudo, :pass, :email, CURDATE())');
                $req->execute(array(
                    ':pseudo' => $user->getPseudo(),
                    ':pass' => $pass_hache,
                    ':email' => $user->getEmail()
                ));
            }

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function ConnectionUser(User $user)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare('SELECT * FROM blogphp_membres WHERE pseudo = :pseudo');
            $recup->execute(array(
                ':pseudo' => $user->getPseudo()));

            $result = $recup->fetch();
            return password_verify($user->getPass(), $result['pass']);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function GetUsersNotAccepted()
    {
        try {
            $all_user = [];
            $db = DatabaseConnection::dbConnect();
            $recup = $db->query('SELECT * FROM blogphp_membres WHERE grade IS NULL');
            while ($donnees = $recup->fetch(PDO::FETCH_ASSOC))
            {
                $all_user[] = new User($donnees);
            }
            return $all_user;

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function GetAllUser()
    {
        try {
            $all_user = [];
            $db = DatabaseConnection::dbConnect();
            $recup = $db->query('SELECT * FROM blogphp_membres WHERE grade IS NOT NULL AND grade != 1');
            while ($donnees = $recup->fetch(PDO::FETCH_ASSOC))
            {
                $all_user[] = new User($donnees);
            }
            return $all_user;

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function ChangeGradeUser(User $user)
    {
        var_dump($user);
        try{
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare('UPDATE blogphp_membres SET grade = :grade WHERE id = :id');
            $recup->execute(array(
                ':id' => $user->getId(),
                ':grade' => $user->getGrade()
            ));
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function GetDataByIdUser(User $user)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare('SELECT * FROM blogphp_membres WHERE id = :id');
            $recup->execute(array(
                ':id' => $user->getId()
            ));
            $data = $recup->fetch();
            return new User($data);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function SuppUser(User $user)
    {

        try {
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare('DELETE FROM blogphp_membres WHERE blogphp_membres.id = :id;');
            $recup->execute(array(
                ':id' => $user->getId()
            ));
            $recup = $db->prepare('DELETE FROM blogphp_posts WHERE author = :author');
            $recup->execute(array(
                ':author' => $user->getPseudo()
            ));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}