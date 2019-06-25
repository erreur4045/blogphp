<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 01/04/2019
 * Time: 12:57
 * PHP version 7.2
 *
 * @category Exemple
 * @package  BlogphpOCR_OCR_Php_Symfony
 * @author   Maxime <contact@maximethierry.xyz>
 * @license  Phpstorm exemple@exemple.com
 * @link     Exemple
 */
session_start();
require 'controleurs/controller.php';
require 'controleurs/ControleursUsers.php';
require 'controleurs/ControleursPost.php';
require 'controleurs/ControleursComments.php';
require 'models/DatabaseConnection.php';
require 'models/CommentManager.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();//ok
    } elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();//ok
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    } elseif ($_GET['action'] == 'listAllPosts') {
        allPost();//ok
    } elseif ($_GET['action'] == 'contacter') {
        contacter();
    } elseif ($_GET['action'] == 'comment') {
        comment();//ok
    } elseif ($_GET['action'] == 'modifcomment') {
        modifcomment();//ok
    } elseif ($_GET['action'] == 'modifpost') {
        modifpost();//ok
    } elseif ($_GET['action'] == 'validupdatepost') {
        validupdatepost();//ok
    } elseif ($_GET['action'] == 'connection') {
        connection();//ok
    } elseif ($_GET['action'] == 'connectionuser') {
        connectionuser();//ok
    } elseif ($_GET['action'] == 'contact') {
        contact();//ok
    } elseif ($_GET['action'] == 'updatecomment') {
        updatecomm();//ok
    } elseif ($_GET['action'] == 'adminusertobevalided') {
        adminusertobevalided();//ok
    } elseif ($_GET['action'] == 'adminuserlist') {
        adminuserlist();//ok
    } elseif ($_GET['action'] == 'accceptuser') {
        accceptuser();//ok
    } elseif ($_GET['action'] == 'suppuser') {
        suppuser();//ok
    } elseif ($_GET['action'] == 'CV' OR $_GET['action'] == 'cv') {
        CV();//ok
    } elseif ($_GET['action'] == 'inscription') {
        incription();//ok
    } elseif ($_GET['action'] == 'deconnection') {
        deconnection();//ok
    } elseif ($_GET['action'] == 'dashboard') {
        dashboard();//ok
    } elseif ($_GET['action'] == 'dashboardcom') {
        dashboard2();//ok
    } elseif ($_GET['action'] == 'dashboardcomtovalidated') {
        dashboard3();//ok
    } elseif ($_GET['action'] == 'addnewpost') {
        addnewpost();//ok
    } elseif ($_GET['action'] == 'supprpost') {
        supprpost();//ok
    } elseif ($_GET['action'] == 'validpost') {
        validpost();//ok
    } elseif ($_GET['action'] == 'validcomment') {
        validcomment();//ok
    } elseif ($_GET['action'] == 'supprcom') {
        supprcom();//ok
    } elseif ($_GET['action'] == 'validinscription') {
        validincription();//ok
    } elseif ($_GET['action'] == 'bio') {
        bio();//ok
    }else{
        accueil();
    }
} else {
    accueil();
}
?>