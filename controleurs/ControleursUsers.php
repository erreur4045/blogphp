<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 09/05/2019
 * Time: 16:03
 */

require_once ('models/User.php');

function validincription()
{
    $Objincription = new User();
    if ($Objincription->AddUser($_POST['username'], $_POST['mdp'], $_POST['mail']) == 1) {
        $_SESSION['message'] = "Le pseudo choisi est déjà utilisé, veuillez vous incrire en utilisant un autre pseudo";
        header('Location: index.php?action=inscription');
    } elseif ($Objincription->AddUser($_POST['username'], $_POST['mdp'], $_POST['mail']) == 2) {
        $_SESSION['message'] = "Le mail choisi est déjà utilisé, veuillez vous incrire en utilisant un autre mail";
        header('Location: index.php?action=inscription');
    } else {
        $_SESSION['message'] = "Votre inscription a été prise en compte, vous pouvez maintenant vous connecter";
        require('view/ConnectionUserView.php');
    }
}

function connectionuser()
{
    $user = new User();
    if ($user->ConnectionUser($_POST['username'], $_POST['mdp'])) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['message'] = "vous êtes bien connecté";
        header('Location: index.php?action=test');
    } else {
        $_SESSION['message'] = "Error MDP/pseudo";
        header('Location: index.php?action=connection');
    }
}

function deconnection()
{
    $_SESSION['message'] = "Merci pour votre visite";
    header('Location: index.php');
    session_destroy();
}