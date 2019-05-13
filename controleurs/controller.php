<?php

require_once('models/model.php');
require_once('models/Post.php');
require_once('models/Comment.php');
require_once('models/User.php');

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