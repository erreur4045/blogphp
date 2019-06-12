<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 09/05/2019
 * Time: 16:03
 */

function listPosts()
{
    $managepost = new PostManager();
    $posts = $managepost->selectLastPosts();
    require('views/LastPostView.php');
}

function allPost()
{
    $managepost = new PostManager();
    $posts = $managepost->selectAllPosts();
    require('views/AllPostView.php');
}

function supprPost()
{
    if (isset($_SESSION['username'])) {
        $data = array(
            'number' => $_GET['id'],
            'author' => $_GET['author']
        );
        $post = new Post($data);
        $managepost = new PostManager($post);
        $managepost->suppr($post);
        $_SESSION['message'] = "Votre article a été supprimer";
        header('Location: index.php?action=dashboard');
    }
    else {
        require 'views/Co_error.php';
    }
}

function supprpostlistpost()
{
    if (isset($_SESSION['username'])) {
        $data = array(
            'number' => $_GET['id'],
            'author' => $_GET['author']
        );
        $post = new Post($data);
        $managepost = new PostManager($post);
        $managepost->suppr($post);
        $_SESSION['message'] = "Votre article a été supprimer";
        header('Location: index.php?action=listPosts');
    }
    else {
        require 'views/Co_error.php';
    }
}

function addnewpost()
{
    if (isset($_SESSION['username'])) {
        if ($_SESSION['grade'] == 2 OR $_SESSION['grade'] == 1) {
            require('views/AddnewpostView.php');
        }
    } else {
        require 'views/Co_error.php';
    }
}

function validpost()
{
    $title = htmlspecialchars(stripcslashes(trim($_POST['title'])));
    $content = htmlspecialchars(stripcslashes(trim($_POST['content'])));
    $author = htmlspecialchars(stripcslashes(trim($_SESSION['username'])));
    if (isset($_SESSION['username'])) {
        $donnees = array(
            'title' => $title,
            'content' => $content,
            'author' => $author
        );
        $post = new Post($donnees);
        $donnees_user = array(
            'pseudo' => $_SESSION['username']
        );
        $user = new User($donnees_user);
        $manager_user = new UserManager($user);
        $grade = $manager_user->GradeUser($user);
        if ($grade->getGrade() == 2 OR $grade->getGrade() == 1) {
            $manager = new PostManager($post);
            $manager->addPost($post);
            $_SESSION['message'] = "Votre article a ete ajoute";
            header('Location: index.php?action=listPosts');
        }
    } else {
        require 'views/Co_error.php';
    }
}

function validupdatepost()
{
    $title = htmlspecialchars(stripcslashes(trim($_POST['title'])));
    $content = htmlspecialchars(stripcslashes(trim($_POST['content'])));
    $author = htmlspecialchars(stripcslashes(trim($_SESSION['username'])));
    $id = htmlspecialchars(stripcslashes(trim($_GET['id'])));
    if (isset($_SESSION['username'])) {
        $donnees = array(
            'content' => $content,
            'title' => $title,
            'number' => $id,
            'author' => $author
        );
        $post = new Post($donnees);
        $manager = new PostManager($post);
        $manager->updatePost($post);
        $_SESSION['message'] = "Votre article a ete modifier";
        $str = 'Location: index.php?id='.$_GET['id'].'&action=post';
        header($str);
    }
    else
    {
        $_SESSION['message'] = "Vous devez etre connecter pour ajouter un article";
         header('Location: index.php?action=connection');
    }
}

function modifpost()
{
    if (isset($_SESSION['username'])) {
        $donnees = array(
            'number' => $_GET['id'],
        );
        $post = new Post($donnees);
        echo $post->getNumber();
        $manager = new PostManager($post);
        $data_view = $manager->selectPostById($post);

    }
    else
    {
        require 'views/Co_error.php';
    }
    require('views/UpdatepostView.php');
}

function post()
{
    /*preparation du tableau pour contruction de OBJ post et creation OBJ*/
    $donnees = array('number' => $_GET['id']);
    $post_for_data = new Post($donnees);

    /*creation post_manager avec OBJ post*/
    $post_manager = new PostManager($post_for_data);

    /*Creation OBJ post pour recuperer toutes les donees du post lier a l'ID du post envoyer*/
    $post = new Post($post_manager->selectPostById($post_for_data));

    /*Preparation des donnees pour creation de OBJ Comment*/
    $data_for_com = array('postid' => $_GET['id']);
    $comment_for_data = new Comment($data_for_com);
    /*Creation de OBJ manager*/
    $com_manager = new CommentManager($comment_for_data);
    /* Passage des commentaire a la vue */
    $comments = $com_manager->GetComments($comment_for_data);
    require ('views/PostViewco.php');

}