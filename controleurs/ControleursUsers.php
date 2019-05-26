<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 09/05/2019
 * Time: 16:03
 */

require_once ('models/User.php');
require_once ('models/UserManager.php');
require_once ('models/Post.php');
require_once ('models/PostManager.php');

function dashboard()
{
    if (!isset($_SESSION['username']))
        require ('view/Co_error.php');
    else{
        $data = array(
            'pseudo' => $_SESSION['username'],
        );
        $user = new User($data);
        $manage_user = new UserManager($user);
        $result_post = $manage_user->GetAllPostsByUser($user);

        $data = array(
            'autor' => $_SESSION['username'],
        );
        $com = new Comment($data);
        //echo $com->getAutor();
        $manage_user = new CommentManager($com);
        $result_com = $manage_user->GetCommentsByUser($com);

        require('view/DashboardView.php');
    }
}

function dashboard2()
{
    if (!isset($_SESSION['username']))
        require ('view/Co_error.php');
    else{
        $data = array(
            'pseudo' => $_SESSION['username'],
        );
        $user = new User($data);
        $manage_user = new UserManager($user);
        $result_post = $manage_user->GetAllPostsByUser($user);

        $data = array(
            'autor' => $_SESSION['username'],
        );
        $com = new Comment($data);
        //echo $com->getAutor();
        $manage_user = new CommentManager($com);
        $result_com = $manage_user->GetCommentsByUser($com);

        require('view/DashboardView2.php');
    }
}

function dashboard3()
{
    if (!isset($_SESSION['username']))
        require ('view/Co_error.php');
    else{
        $data = array(
            'pseudo' => $_SESSION['username'],
        );
        $user = new User($data);
        $manage_user = new UserManager($user);
        $result_post = $manage_user->GetAllPostsByUser($user);

        $data = array(
            'autor' => $_SESSION['username'],
        );
        $com = new Comment($data);
        //echo $com->getAutor();
        $manage_user = new CommentManager($com);
        $result_com = $manage_user->GetCommentsToBeApproved($com);

        require('view/DashboardView3.php');
    }
}

function validincription()
{
    $data = array(
        'pseudo' => $_POST['username'],
        'pass' => $_POST['mdp'],
        'email' => $_POST['mail']
    );
    $user = new User($data);
    $manage_user = new UserManager($user);
    if ($manage_user->AddUser($user) == 1) {
        $_SESSION['message'] = "Le pseudo choisi est déjà utilisé, veuillez vous incrire en utilisant un autre pseudo";
        header('Location: index.php?action=inscription');
    } elseif ($manage_user->AddUser($user) == 2) {
        $_SESSION['message'] = "Le mail choisi est déjà utilisé, veuillez vous incrire en utilisant un autre mail";
        header('Location: index.php?action=inscription');
    } else {
        $_SESSION['message'] = "Votre inscription a été prise en compte, vous pouvez maintenant vous connecter";
        require('view/ConnectionUserView.php');
    }
}

function connectionuser()
{
    $data = array(
        'pseudo' => $_POST['username'],
        'pass' => $_POST['mdp']
    );
    $user = new User($data);
    $manage_user = new UserManager($user);
    if ($manage_user->ConnectionUser($user) == TRUE) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['message'] = "vous êtes bien connecté";
        header('Location: index.php');
    } else {
        $_SESSION['message'] = "Error MDP ou pseudo";
        header('Location: index.php?action=connection');
    }
}

function deconnection()
{
    $_SESSION['message'] = "Merci pour votre visite";
    header('Location: index.php');
    session_destroy();
}

function incription()
{
    require('view/IncriptionView.php');
}

function connection()
{
    require('view/ConnectionUserView.php');
}
