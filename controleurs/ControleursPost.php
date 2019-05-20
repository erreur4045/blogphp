<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 09/05/2019
 * Time: 16:03
 */

require_once ('models/PostManager.php');
require_once ('models/Comment.php');

function listPosts()
{
    $managepost = new PostManager();
    $posts = $managepost->selectLastPosts();
    require('view/LastPostView.php');
}

function post()
{
    $postt = new PostManager();
    $commentss = new Comment();

    if (!empty($_SESSION)){
        if ($_SESSION['username']) {
            $post = $postt->selectPostById($_GET['id']);
            $comments = $commentss->GetComments($_GET['id']);
            require('view/PostViewco.php');
        }
    }
    else {
        $post = $postt->selectPostById($_GET['id']);
        $comments = $commentss->GetComments($_GET['id']);
        require('view/PostViewnotco.php');
    }
}

function allPost()
{
    $managepost = new PostManager();
    $posts = $managepost->selectAllPosts();
    require('view/AllPostView.php');
}

function addnewpost()
{
    require('view/AddnewpostView.php');
}

function validpost()
{
    if (isset($_SESSION['username'])) {
        $donnees = array(
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'author' => $_SESSION['username'],
        );
        $post = new Post($donnees);
        $manager = new PostManager($post);
        $manager->addPost($post);
        $_SESSION['message'] = "Votre article a ete ajoute";
        header('Location: index.php?action=listPosts');
    }
    else
    {
        $_SESSION['message'] = "Vous devez etre connecter pour ajouter un article";
        header('Location: index.php?action=connectionadmin');
    }

}