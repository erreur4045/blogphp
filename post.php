<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 01/04/2019
 * Time: 15:30
 */
require('models/model.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('view/PostViewco.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}

