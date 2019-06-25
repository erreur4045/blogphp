<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 01/04/2019
 * Time: 12:57
 * PHP version 7.2
 *
 * @category Controller
 * @package  BlogphpOCR_OCR_Php_Symfony
 * @author   Maxime <contact@maximethierry.xyz>
 * @license  Phpstorm exemple@exemple.com
 * @link     Exemple
 */

require 'models/Comment.php';

function contacter()
{
    if (empty($_POST['firstname']) or empty($_POST['lastname'])  or empty($_POST['mail'])  or empty($_POST['subject'])  or empty($_POST['content'])){
        $_SESSION['message'] = "Il manque des informations pour me contacter, tous les champs doivent être renseignés.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }
    if (filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL) == false){
        $_SESSION['message'] = "Le mail renseigné semble incorrect, vérifiez le SVP.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['mail']) && isset($_POST['subject']) && isset($_POST['content']))
    {
        ini_set("SMTP", "smtp.maximethierry.xyz");
        $to = 'contact@maximethierry.xyz';
        $subject = $_POST['subject'];
        $message = ucfirst($_POST['firstname']) . ' ' . ucfirst($_POST['lastname']) . ' a envoye le message suivant : ' . "\r\n" . $_POST['content'];
        $headers = 'From: ' . $_POST['mail'] . "\r\n" . "Content-type: text/html; charset= utf8\n" .
            'Reply-To: contact@maximethierry.xyz' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
        $_SESSION['message'] = "Votre message a été envoyé, merci pour votre message.";
        header('Location: index.php');
    }
}

/**
 * Permet de faire une function test
 *
 * @return void
 *
 * @since 1.0.1
 */

/**
 * Permet de faire une function test
 *
 * @return void
 *
 * @since 1.0.1
 */
function bio()
{
    include 'views/BioView.php';
}
/**
 * Permet de faire une function test
 *
 * @return void
 *
 * @since 1.0.1
 */
function accueil()
{
    include 'views/AccueilView.php';
}
/**
 * Permet de faire une function test
 *
 * @return void
 *
 * @since 1.0.1
 */
function mention()
{
    include 'views/MentionsView.php';
}
/**
 * Permet de faire une function test
 *
 * @return void
 *
 * @since 1.0.1
 */
function CV()
{
    include 'views/CvView.php';
}
/**
 * Permet de faire une function test
 *
 * @return void
 *
 * @since 1.0.1
 */
function contact()
{
    include 'views/ContactView.php';
}
