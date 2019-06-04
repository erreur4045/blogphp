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
                $req = $db->prepare('INSERT INTO blogphp_membres(pseudo, pass, email, date_sub) VALUES(:pseudo, :pass, :email, CURDATE())');
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
}