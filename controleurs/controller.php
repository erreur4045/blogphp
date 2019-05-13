<?php

require_once('models/model.php');
require_once('models/Post.php');
require_once('models/Comment.php');
require_once('models/User.php');


/*function listPosts()
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
}*/
/*function validincription()
{
    var_dump($_POST['username'], $_POST['mdp'], $_POST['mail']);
    $Objincription = new User();
    if ($Objincription->AddUser($_POST['username'], $_POST['mdp'], $_POST['mail']) == 1) {
        $_SESSION['message'] = "Le pseudo choisi est déjà utilisé, veuillez vous incrire en utilisant un autre pseudo";
        header('Location: index.php?action=validinscription');
        die;
        //require('view/Error_incription_pseudo.php');
    } elseif ($Objincription->AddUser($_POST['username'], $_POST['mdp'], $_POST['mail']) == 2) {
        $_SESSION['message'] = "Le mail choisi est déjà utilisé, veuillez vous incrire en utilisant un autre mail";
        header('Location: index.php?action=validinscription');
        die;
        //require('view/Error_inscription_mail.php');
    } else {
        echo "je passe par la 1 <br>";
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
    //require('view/Deconnection.php');
    session_destroy();
}*/

function comment()
{

    $idpost = $_GET['idpost'];
    addcom($idpost, $_SESSION['username'], $_POST['comments']);
    header('Location: index.php?id=' . $idpost . '&action=post');
}
function mention()
{
    require('view/MentionsView.php');
}

function connection()
{
    require('view/ConnectionUserView.php');
}

function connectionadmin()
{
    require('view/ConnectionUserView.php');
}

function CV()
{
    require('view/CvView.php');
}

function contact()
{
    require('view/ContactView.php');
}

function incription()
{
    require('view/IncriptionView.php');
}

function updatecomm()
{

    var_dump($_GET['id'], $_GET['idposts']);
    require('view/UpdatecommentView.php');
}


function testmail(){

// Le message
$message = "Line 1\r\nLine 2\r\nLine 3";

// Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Envoi du mail
var_dump(mail('maximethi@hotmail.fr', 'Mon Sujet', $message));
echo "ok";
}

function test()
{
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $result = isadmin($username);
        /*        echo "<pre>";
                var_dump($result);*/
        if ($result['is_admin'] == 1) {
            require('view/pageadmin.php');
        } elseif ($result['is_admin'] == null) {
            header('Location: index.php');
        }
    } else {
        require('view/Co_error.php');
    }
}