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
require_once 'models/PostManager.php';
require_once 'models/UserManager.php';
require_once 'models/Comment.php';
require_once 'models/Post.php';

/**
 * Permet de faire une function test
 *
 * @return void
 *
 * @since 1.0.1
 */
function testfunction()
{
    //pour la classe post
/*
    echo 'coucou';
    ini_set("SMTP", "smtp.maximethierry.xyz");
    echo 'coucou';
    $to      = 'maximethi@hotmail.fr';
    $subject = 'le sujet';
    $message = 'Bonjour !';
    $headers = 'From: contact@maximethierry.xyz' . "\r\n" .
        'Reply-To: maximethi@hotmail.fr' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    var_dump(mail($to, $subject, $message, $headers));*/
    $data = array(
        'pseudo' => 'maxime',
    );
    $user = new User($data);
    $manage_user = new UserManager($user);
    var_dump($manage_user->GradeUser($user));

}
function contacter()
{
    if ( isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['mail']) && isset($_POST['subject']) && isset($_POST['content']) )
    ini_set("SMTP", "smtp.maximethierry.xyz");
        $to      = 'maximethi@hotmail.fr';
        $subject = $_POST['subject'];
        $message = ucfirst($_POST['fistname']). ' '.ucfirst($_POST['lastname']) .' a envoye le message suivant : '."\r\n"  .$_POST['content'];
        $headers = 'From: ' . $_POST['mail'] . "\r\n" .
            'Reply-To: contact@maximethierry.xyz' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
    $_SESSION['message'] = "Votre message a été envoyer, merci pour votre message";
    header('Location: index.php');
}
/**
 * Permet de faire une function test
 *
 * @return void
 *
 * @since 1.0.1
 */
function testmail()
{
    var_dump($_SESSION['grade']);
    die();
    include 'view/testview.php';
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
