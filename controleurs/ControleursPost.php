<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 09/05/2019
 * Time: 16:03
 */

require_once ('models/Post.php');
require_once ('models/Comment.php');

function listPosts()
{
    $postss = new post();
    $posts = $postss->GetArticles();
    require('view/AccueilView.php');
}

function post()
{
    $postt = new post();
    $commentss = new Comment();

    if (!empty($_SESSION)){
        if ($_SESSION['username']) {
            $post = $postt->GetArticlesById($_GET['id']);
            $comments = $commentss->GetComments($_GET['id']);
            require('view/PostViewco.php');
        }
    }
    else {
        $post = $postt->GetArticlesById($_GET['id']);
        $comments = $commentss->GetComments($_GET['id']);
        require('view/PostViewnotco.php');
    }
}