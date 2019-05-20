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

function post()
{
    /*preparation du tableau pour contruction de OBJ post et creation OBJ*/
    $donnees = array('number' => $_GET['id']);
    $post_for_data = new Post($donnees);

    /*creation post manager avec OBJ post*/
    $post_manager = new PostManager($post_for_data);

    /*Creation OBJ post pour recuperer toutes les donees du post lier a l'ID du post envoyer*/
    $post = new Post($post_manager->selectPostById($post_for_data));

    /*Preparation des donn2es pour creation de OBJ Comment*/
    $data_for_com = array('postid' => $_GET['id']);
    $comment_for_data = new Comment($data_for_com);
    /*Creation de OBJ manager*/
    $com_manager = new CommentManager($comment_for_data);
    /* Passage des commentaire a la vue */
    $comments = $com_manager->GetComments($comment_for_data);

    require ('view/PostViewco.php');

}