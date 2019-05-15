<?php
function getPosts()
{
    $db = DatabaseConnection::dbConnect();
    $req = $db->query('SELECT number, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post ORDER BY creation_date_fr DESC LIMIT 0, 5');

    return $req;
}

function getPost($postId)
{
    $db = DatabaseConnection::dbConnect();
    $req = $db->prepare('SELECT number, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post WHERE number = ? ORDER BY creation_date_fr DESC');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId)
{
    $db = DatabaseConnection::dbConnect();
    $comments = $db->prepare('SELECT id, autor, text, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentt WHERE post_id = ? ORDER BY comment_date_fr DESC');
    $comments->execute(array($postId));

    return $comments;
}

function getidpost($postId)
{
    return $postId;
}

function dbConnect()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=testblog;charset=utf8', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        return $db;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function addcom($idpost, $author, $comment)
{

    try {
        $db = DatabaseConnection::dbConnect();
        $addcom = $db->prepare('INSERT INTO commentt (post_id,autor,text,comment_date) VALUES (:idpost, :autor, :comment, NOW()) ');
        $addcom->execute(array(':idpost' => $idpost, ':autor' => $author, ':comment' => $comment));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function updatecomment($id, $idpost, $newcom)
{
    try {
        $db = DatabaseConnection::dbConnect();
        //$update = $db->exec('UPDATE `commentt` SET `text` = \'kikoui lol\' WHERE `commentt`.`id` = 1') ;
        $update = $db->prepare('UPDATE `commentt` SET `text` = :newcom, `comment_date` = NOW()  WHERE `commentt`.`id` = :id AND `commentt`.`post_id` = :idpost ');
        $update->execute(array(':newcom' => $newcom, ':idpost' => $idpost, ':id' => $id));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function addmember($pseudo, $pass, $email)
{

    try {
        $db = DatabaseConnection::dbConnect();
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

function verrifauteur(){
    try {
        $db = DatabaseConnection::dbConnect();
        $recup = $db->prepare('SELECT * FROM commentt WHERE autor = :autor AND post_id= :post_id');
        $recup->execute(array(':pseudo' => $_SESSION['username'], ':post_id' => $_SESSION['username'] ));
        $result = $recup->fetch();
        $isautor = $result->rowCount();
        if ($isautor = 0)
            return 0;
        else
            return 1;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function isadmin($username){
    try{
        $db = DatabaseConnection::dbConnect();
        $recup = $db->prepare('SELECT * FROM membre WHERE pseudo = :username');
        $recup->execute(array(':username' => $username));
        $result = $recup->fetch();
        return $result;
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
