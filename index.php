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

$maintenance = 0;
if ($maintenance == 0) {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        } elseif ($_GET['action'] == 'listAllPosts') {
            allPost();
        } elseif ($_GET['action'] == 'mention') {
            mention();
        } elseif ($_GET['action'] == 'comment') {
            comment();
        } elseif ($_GET['action'] == 'modifcomment') {
            modifcomment();
        } elseif ($_GET['action'] == 'modifpost') {
            modifpost();
        } elseif ($_GET['action'] == 'validupdatepost') {
            validupdatepost();
        } elseif ($_GET['action'] == 'connection') {
            connection();
        } elseif ($_GET['action'] == 'connectionuser') {
            connectionuser();
        } elseif ($_GET['action'] == 'contact') {
            contact();
        } elseif ($_GET['action'] == 'updatecomment') {
            updatecomm();
        } elseif ($_GET['action'] == 'CV') {
            CV();
        } elseif ($_GET['action'] == 'inscription') {
            incription();
        } elseif ($_GET['action'] == 'deconnection') {
            deconnection();
        } elseif ($_GET['action'] == 'dashboard') {
            dashboard();
        } elseif ($_GET['action'] == 'dashboardcom') {
            dashboard2();
        } elseif ($_GET['action'] == 'dashboardcomtovalidated') {
            dashboard3();
        } elseif ($_GET['action'] == 'addnewpost') {
            addnewpost();
        } elseif ($_GET['action'] == 'supprpost') {
            supprpost();
        } elseif ($_GET['action'] == 'supprpostlistpost') {
            supprpostlistpost();
        } elseif ($_GET['action'] == 'validpost') {
            validpost();
        } elseif ($_GET['action'] == 'validcomment') {
            validcomment();
        } elseif ($_GET['action'] == 'supprcom') {
            supprcom();
        } elseif ($_GET['action'] == 'validinscription') {
            validincription();
        } elseif ($_GET['action'] == 'testfunction') {
            testfunction();
        } elseif ($_GET['action'] == 'bio') {
            bio();
        } elseif ($_GET['action'] == 'testmail') {
            testmail();
        }
    } else {
        accueil();
    }
} else {
    include 'bloc/maintenance.php';
}
?>