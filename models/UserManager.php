<?php
/**
 * PostManager class file
 *
 * PHP Version 7.0
 *
 * @category User
 * @package  User
 * @author   Maxime THIERRY <contact@maximethierry.xyz>
 * @license  Phpstorm exemple@exemple.com
 * @link     Exemple
 */

/**
 * UserManager class
 *
 * Class qui permet la gestion des methodes associer a la class Post
 *
 * @category User
 * @package  User
 * @author   Maxime THIERRY <contact@maximethierry.xyz>
 * @license  Phpstorm exemple@exemple.com
 * @link     Exemple
 */

class UserManager
{
    /**
     * Récuperer tout les post par utilisateur
     *
     * @param User $user object User
     *
     * @return Array un array de new post
     */
    function getAllPostsByUser(User $user)
    {
        try{
            $all_post = [];
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare(
                'SELECT blogphp_posts.id, title, content, date, pseudo, grade, authorpost
FROM blogphp_posts
  JOIN blogphp_membres ON blogphp_posts.authorpost = blogphp_membres.id
WHERE blogphp_membres.id = :id'
            );
            $recup->execute(
                array(
                ':id' => $user->getId()
                    )
            );
            while ($donnees = $recup->fetch(PDO::FETCH_ASSOC)) {
                $all_post[] = new Post($donnees);
            }
            return $all_post;
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Récuperer le grade de l'utilisateur avec son pseudo
     * utiiliser à la connexion pour $_session['grade']
     *
     * @param User $user object User
     *
     * @return Obj un Obj de new User
     */
    function dataUser(User $user)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare(
                'SELECT * 
                            FROM blogphp_membres 
                            WHERE pseudo = :pseudo'
            );
            $recup->execute(
                array(
                ':pseudo' => $user->getPseudo()
                     )
            );
            $donnees = $recup->fetch();
            if ($donnees) {
                return new User($donnees);
            } else {
                return null;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Ajoute un utilisateur
     *
     * @param User $user object User
     *
     * @return int 2 = deja mail 1 = deja psuedo
     */
    public function addUser(User $user)
    {
        try {
            $db = DatabaseConnection::dbConnect();

            $verrifname = $db->prepare(
                'SELECT * 
                            FROM blogphp_membres 
                            WHERE pseudo=:pseudo '
            );
            $verrifname->execute(
                array(
                ':pseudo' => $user->getPseudo()
                    )
            );
            $isname = $verrifname->rowCount();

            $verrifmail = $db->prepare(
                'SELECT * 
                            FROM blogphp_membres 
                            WHERE email=:email '
            );
            $verrifmail->execute(
                array(
                ':email' => $user->getEmail()
                    )
            );
            $ismail = $verrifmail->rowCount();
            if ($isname > 0) {
                return 1;
            } elseif ($ismail > 0) {
                return 2;
            } else {
                $pass_hache = password_hash($user->getPass(), PASSWORD_DEFAULT);
                $req = $db->prepare(
                    'INSERT INTO blogphp_membres(pseudo, pass, email, datesub) 
                                VALUES(:pseudo, :pass, :email, CURDATE())'
                );
                $req->execute(
                    array(
                    ':pseudo' => $user->getPseudo(),
                    ':pass' => $pass_hache,
                    ':email' => $user->getEmail()
                        )
                );
            }

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Connect un utilisateur
     *
     * @param User $user object User
     *
     * @return Boolean
     **/
    public function connectionUser(User $user)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare(
                'SELECT * 
                            FROM blogphp_membres 
                            WHERE pseudo = :pseudo'
            );
            $recup->execute(
                array(
                ':pseudo' => $user->getPseudo()
                    )
            );

            $result = $recup->fetch();
            $pass = new User($result);
            if ($pass == false)
                return 0;
            return password_verify($user->getPass(), $pass->getPass());
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Recuper le(s) utilisateur(s) inscript mais pas encore accepter
     * function utiliser dans le dashboard admin
     *
     * @return Array un Array de new User
     */
    public function getUsersNotAccepted()
    {
        try {
            $all_user = [];
            $db = DatabaseConnection::dbConnect();
            $recup = $db->query(
                'SELECT * 
                            FROM blogphp_membres 
                            WHERE grade IS NULL'
            );
            while ($donnees = $recup->fetch(PDO::FETCH_ASSOC)) {
                $all_user[] = new User($donnees);
            }
            return $all_user;

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Recuper le(s) utilisateur(s) inscript et non admin
     * function utiliser dans le dashboard admin
     *
     * @return Array un Array de new User
     */
    public function getAllUser()
    {
        try {
            $all_user = [];
            $db = DatabaseConnection::dbConnect();
            $recup = $db->query(
                'SELECT * 
                            FROM blogphp_membres 
                            WHERE grade IS NOT NULL 
                            AND grade != 1'
            );
            while ($donnees = $recup->fetch(PDO::FETCH_ASSOC)) {
                $all_user[] = new User($donnees);
            }
            return $all_user;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Modifie le grade à 2 ce qui permet de publier un aticle
     *
     * @param User $user object User
     *
     * @return void
     */
    public function changeGradeUser(User $user)
    {
        try{
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare(
                'UPDATE blogphp_membres 
                            SET grade = :grade 
                            WHERE id = :id'
            );
            $recup->execute(
                array(
                ':id' => $user->getId(),
                ':grade' => $user->getGrade()
                    )
            );
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Récupere toutes les infos de la table blogphp_membres
     *
     * @param User $user object User
     *
     * @return Obj un Obj User
     */
    public function getDataByIdUser(User $user)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare(
                'SELECT * 
                              FROM blogphp_membres 
                              WHERE id = :id'
            );
            $recup->execute(
                array(
                ':id' => $user->getId()
                    )
            );
            $data = $recup->fetch(PDO::FETCH_ASSOC);
            if ($data == false)
                return 0;
            return new User($data);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Récupere toutes les infos de la table blogphp_membres
     *
     * @param User $user object User
     *
     * @return Obj un Obj User
     */
    public function getDataByPseudoUser(User $user)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare(
                'SELECT * 
                              FROM blogphp_membres 
                              WHERE pseudo = :pseudo'
            );
            $recup->execute(
                array(
                    ':pseudo' => $user->getPseudo()
                )
            );
            $data = $recup->fetch(PDO::FETCH_ASSOC);
            if ($data == false)
                return 0;
            return new User($data);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Supprime un utilisateur et tout les articles associés
     *
     * @param User $user object User
     *
     * @return void
     */
    public function suppUser(User $user)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $recup = $db->prepare(
                'DELETE 
                            FROM blogphp_commentaire 
                            WHERE author = :author'
            );
            $recup->execute(
                array(
                    ':author' => $user->getId()
                )
            );
            $recup = $db->prepare(
                'DELETE 
                            FROM blogphp_posts 
                            WHERE authorpost = :author'
            );
            $recup->execute(
                array(
                    ':author' => $user->getId()
                )
            );
            $recup = $db->prepare(
                'DELETE 
                            FROM blogphp_membres 
                            WHERE blogphp_membres.id = :id'
            );
            $recup->execute(
                array(
                ':id' => $user->getId()
                    )
            );

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}