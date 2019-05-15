<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 01/04/2019
 * Time: 12:57
 */
session_start();
require_once ('controleurs/controller.php');
require_once ('controleurs/ControleursUsers.php');
require_once ('controleurs/ControleursPost.php');
require_once ('models/DatabaseConnection.php');

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
        } elseif ($_GET['action'] == 'mention') {
            mention();
        } elseif ($_GET['action'] == 'comment') {
            comment();
        } elseif ($_GET['action'] == 'connection') {
            connection();
        } elseif ($_GET['action'] == 'connectionadmin') {
            connectionadmin();
        } elseif ($_GET['action'] == 'connectionuser') {
            connectionuser();
        } elseif ($_GET['action'] == 'contact') {
            contact();
        } elseif ($_GET['action'] == 'modifcomment') {
            updatecomm();
        } elseif ($_GET['action'] == 'CV') {
            CV();
        } elseif ($_GET['action'] == 'inscription') {
            incription();
        } elseif ($_GET['action'] == 'deconnection') {
            deconnection();
        } elseif ($_GET['action'] == 'test') {
            test();
        } elseif ($_GET['action'] == 'validinscription') {
            validincription();
        }elseif ($_GET['action'] == 'testmail') {
            testmail();
        }
    } else {
        listPosts();
    }
} else {
    include_once('bloc/maintenance.php');
}
include_once('bloc/footer.php');

?>