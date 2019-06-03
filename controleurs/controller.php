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

    echo 'coucou';
    ini_set("SMTP", "smtp.maximethierry.xyz");
    echo 'coucou';
    $to      = 'maximethi@hotmail.fr';
    $subject = 'le sujet';
    $message = 'Bonjour !';
    $headers = 'From: contact@maximethierry.xyz' . "\r\n" .
        'Reply-To: maximethi@hotmail.fr' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    var_dump(mail($to, $subject, $message, $headers));

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
    include 'view/testview.php';
}
/**
 * Permet de faire une function test
 *
 * @return void
 *
 * @since 1.0.1
 */
function bio()
{
    include 'view/BioView.php';
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
    include 'view/AccueilView.php';
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
    include 'view/MentionsView.php';
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
    include 'view/CvView.php';
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
    include 'view/ContactView.php';
}
