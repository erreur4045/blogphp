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