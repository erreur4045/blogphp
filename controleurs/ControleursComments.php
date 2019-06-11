<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 09/05/2019
 * Time: 16:03
 */

require_once('models/User.php');


function comment()
{
    if (isset($_SESSION['username'])) {
        $idpost = array(
            'postid' => $_GET['idpost'],
            'autor' => $_SESSION['username'],
            'text' => $_POST['comments']
        );

        $data = array(
            'number' => $_GET['idpost']
        );
        $getdatapost = new Post($data);
        $getdatapostmanager = new PostManager($getdatapost);
        $datapost = $getdatapostmanager->selectAuthorByNumberPost($getdatapost);
        $com = new Comment($idpost);
        $com_manager = new CommentManager($com);
        if ($datapost[0]->getAuthor() == $_SESSION{'username'}) {
            $com_manager->AddCommentLessVerrif($com);
            $_SESSION['message'] = 'Votre commentaire à été ajouté';
            header('Location: index.php?id=' . $com->getPostid() . '&action=post');
        } else {
            $com_manager->AddCommentWithVerrif($com);
            $_SESSION['message'] = 'Votre commentaire est en attente de validation par l\'auteur';
            header('Location: index.php?id=' . $com->getPostid() . '&action=post');
        }
    }
    require 'views/Co_error.php';

}

function modifcomment()
{
    if (isset($_SESSION['username'])) {
        /* on recupere l'ancien commentaire pour l'affichier*/
        $data = array(
            'id' => $_GET['id'],
            'postid' => $_GET['idpost'],
            'autor' => $_SESSION['username']
        );
        $old_com = new Comment($data);
        $com_manager = new CommentManager($old_com);
        $result = $com_manager->GetComment($old_com);
        //recperer objet !!!!!
        $dd = $result->fetch();
        $comment = $dd['text'];
        /*on creer un nouvelle obj pour envoyer la vue*/
        $data_for_view = array(
            'text' => $comment
        );
        $old_com_for_view = new Comment($data_for_view);
        require('views/UpdatecommentView.php');
    } else {
        require 'views/Co_error.php';
    }
}

function updatecomm()
{
    if (isset($_SESSION['username'])) {
        $new_com_to_add = $_POST['comments'];
        $data_to_add = array(
            'postid' => $_GET['idpost'],
            'id' => $_GET['id'],
            'autor' => $_SESSION['username'],
            'text' => $new_com_to_add
        );

        $new_com = new Comment($data_to_add);
        $com_manager = new CommentManager($new_com);
        $com_manager->UpdateComment($new_com);
        header('Location: index.php?id=' . $new_com->getPostid() . '&action=post');
    } else {
        require 'views/Co_error.php';
    }
}

function supprcom()
{
    if (isset($_SESSION['username'])) {
        $data = array(
            'id' => $_GET['id'],
            'postid' => $_GET['idpost']
        );

        $com = new Comment($data);
        $managepost = new CommentManager($com);
        $managepost->supprCom($com);
        $str = 'Location: index.php?action=dashboardcom';
        $_SESSION['message'] = "Votre commentaire a été supprimer";
        header($str);
    } else {
        require 'views/Co_error.php';
    }
}

function validcomment()
{
    if (isset($_SESSION['username'])) {
        $data = array(
            'id' => $_GET['id'],
            'postid' => $_GET['idpost']
        );

        $com = new Comment($data);

        $managepost = new CommentManager($com);
        $managepost->validCom($com);
        $str = 'Location: index.php?action=dashboardcomtovalidated';
        header($str);
        $_SESSION['message'] = "Le commentaire a été valider";
    } else {
        $_SESSION['message'] = "Vous devez etre connecter pour ajouter un commentaire";
        header('Location: index.php?action=connection');
    }
}