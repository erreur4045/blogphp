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
/**
 * Vérifie la connexion, puis ajoute le commentaire en vérifiant si l'auteur de l'article est le même
 * si cela est le cas le com est ajouté sinon il doit passer en verif par l'auteur.
 *
 * @return void
 *
 * @since 1.0.1
 */
function comment()
{
    if (isset($_SESSION['username'])) {
        $idpost = array(
            'postid' => $_GET['idpost'],
            'autor' => $_SESSION['username'],
            'text' => $_POST['comments']
        );

        $data = array(
            'number' => $_GET['idpost']
        );
        $getdatapost = new Post($data);
        $getdatapostmanager = new PostManager($getdatapost);
        $datapost = $getdatapostmanager->selectAuthorByNumberPost($getdatapost);
        $com = new Comment($idpost);
        $com_manager = new CommentManager($com);
        if ($datapost[0]->getAuthor() == $_SESSION{'username'}) {
            $com_manager->AddCommentLessVerrif($com);
            $_SESSION['message'] = 'Votre commentaire a été ajouté.';
            header('Location: index.php?id=' . $com->getPostid() . '&action=post');
        } else {
            $com_manager->AddCommentWithVerrif($com);
            $_SESSION['message'] = 'Votre commentaire est en attente de validation par l\'auteur.';
            header('Location: index.php?id=' . $com->getPostid() . '&action=post');
        }
    }
    include 'views/Co_error.php';

}
/**
 * Vérifie la connexion, on recupere l'ancien com pour view et on appel la vue
 *
 * @return void
 *
 * @since 1.0.1
 */
function modifcomment()
{
    if (isset($_SESSION['username'])) {
        /* on recupere l'ancien commentaire pour l'affichier*/
        $data = array(
            'id' => $_GET['id'],
            'postid' => $_GET['idpost'],
            'autor' => $_SESSION['username']
        );
        $old_com = new Comment($data);
        $com_manager = new CommentManager($old_com);
        $result = $com_manager->GetComment($old_com);
        include 'views/UpdatecommentView.php';
    } else {
        include 'views/Co_error.php';
    }
}
/**
 * Vérifie la connexion, on crée obj Comment, en faisant une securisation de la donnée puis on update
 *
 * @return void
 *
 * @since 1.0.1
 */
function updatecomm()
{
    if (isset($_SESSION['username'])) {
        $new_com_to_add = htmlspecialchars(stripcslashes(trim($_POST['comments'])));
        $data_to_add = array(
            'postid' => $_GET['idpost'],
            'id' => $_GET['id'],
            'autor' => $_SESSION['username'],
            'text' => $new_com_to_add
        );

        $new_com = new Comment($data_to_add);
        $com_manager = new CommentManager($new_com);
        $com_manager->UpdateComment($new_com);
        header('Location: index.php?id=' . $new_com->getPostid() . '&action=post');
    } else {
        include 'views/Co_error.php';
    }
}
/**
 * Vérifie la connexion, on crée obj Comment, on recup $_GET puis on supp
 *
 * @return void
 *
 * @since 1.0.1
 */
function supprcom()
{
    //TODO : faire verrif sur username pour suppression com
    try {
        if (isset($_SESSION['username'])) {
            $data = array(
                'id' => $_GET['id'],
                'postid' => $_GET['idpost']
            );

            $com = new Comment($data);
            $managepost = new CommentManager($com);
            $managepost->supprCom($com);
            $str = 'Location: index.php?action=dashboardcom';
            $_SESSION['message'] = "Votre commentaire a été supprimé";
            header($str);
        } else {
            include 'views/Co_error.php';
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

}
/**
 * Vérifie la connexion, on crée obj Comment, on recup $_GET puis on supp
 *
 * @return void
 *
 * @since 1.0.1
 */
function validcomment()
{
    //TODO : verrfi username pour la validation
    try {
        if (isset($_SESSION['username'])) {
            $data = array(
                'id' => $_GET['id'],
                'postid' => $_GET['idpost']
            );

            $com = new Comment($data);

            $managepost = new CommentManager($com);
            $managepost->validCom($com);
            $str = 'Location: index.php?action=dashboardcomtovalidated';
            header($str);
            $_SESSION['message'] = "Le commentaire a été validé";
        } else {
            $_SESSION['message'] = "Vous devez être connecté pour ajouter un commentaire.";
            header('Location: index.php?action=connection');
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}