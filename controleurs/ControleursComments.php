<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 09/05/2019
 * Time: 16:03
 */

require_once ('models/User.php');


function comment()
{
    $idpost = array(
        'postid' => $_GET['idpost'],
        'autor' => $_SESSION['username'],
        'text' => $_POST['comments']
    );

    $com = new Comment($idpost);
    $com_manager = new CommentManager($com);
    $com_manager->AddComment($com);
    $_SESSION['message'] = 'votre commentaire a ete ajoute';
    header('Location: index.php?id=' . $com->getPostid() . '&action=post');
}

function modifcomment()
{
    /* on recupere l'ancien commentaire pour l'affichier*/
    $data = array(
        'id' => $_GET['id'],
        'postid' => $_GET['idpost'],
        'autor' => $_SESSION['username']
    );
    $old_com = new Comment($data);
    $com_manager = new CommentManager($old_com);
    $result = $com_manager->GetComment($old_com);
    $dd = $result->fetch();
    $comment = $dd['text'];
    /*on creer un nouvelle obj pour envoyer la vue*/
    $data_for_view = array(
        'text' => $comment
    );
    $old_com_for_view = new Comment($data_for_view);
    require('view/UpdatecommentView.php');
}

function updatecomm()
{
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
        $str = 'Location: index.php?action=post&id='.$com->getPostid();
        echo $str;
        header($str);
        $_SESSION['message'] = "Votre commentaire a ete supprimer";
    }
}