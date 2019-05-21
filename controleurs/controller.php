<?php
require_once ('models/PostManager.php');
require_once ('models/Comment.php');
require_once ('models/Post.php');
require_once ('models/CommentManager.php');
function testfunction()
{
    //pour la classe post
/*    $donnees_a_envoyer_a_la_classe = [
        'number' => 22,
        'title' => 'Vyk12',
        'content' => 'ceciestducontenue',
        'author' => $_SESSION['username']
    ];*/

//pour la classe comment
/*    $donnees_a_envoyer_a_la_classe = [
        'id' => 1,
        'postid' => 2,
        'autor' => 'maxime',
        'text' => 'je suis le commentaire',
        'comment_date' => '2019-04-01 07:00:00'
    ];
    $nbid = $_GET['id'];
    $data = array('number' => $nbid);
    $post = new Post($data);
    $post_manager = new PostManager($post);
    $com = new Comment($donnees_a_envoyer_a_la_classe);
    $manager = new CommentManager($com);
    $post->getNumber();*/

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

    //test pour post
/*    $postaajouter = new Post($donnees_a_envoyer_a_la_classe);
    $manager = new PostManager();
    $manager->selectPostByAuthorSession($postaajouter);
    echo '<pre>';
    var_dump($manager->selectPostByAuthorSession($postaajouter));
    echo 'cest good';*/
    /* $manager->addPost($postaajouter);*/
}

function accueil()
{
    require('view/AccueilView.php');
}

function mention()
{
    require('view/MentionsView.php');
}

function CV()
{
    require('view/CvView.php');
}

function contact()
{
    require('view/ContactView.php');
}
