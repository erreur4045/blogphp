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
            'postid' => htmlspecialchars(stripcslashes(trim($_GET['idpost']))),
            'autor' => $_SESSION['username'],
            'text' => htmlspecialchars(stripcslashes(trim($_POST['comments'])))
        );

        $data = array(
            'number' => htmlspecialchars(stripcslashes(trim($_GET['idpost'])))
        );
        $getdatapost = new Post($data);
        $getdatapostmanager = new PostManager($getdatapost);
        $datapost = $getdatapostmanager->selectAuthorByNumberPost($getdatapost);
        $com = new Comment($idpost);
        $com_manager = new CommentManager($com);
        if ($datapost[0]->getAuthor() == $_SESSION{'username'}) {
            $com_manager->addCommentLessVerrif($com);
            $_SESSION['message'] = 'Votre commentaire a été ajouté.';
            header('Location: index.php?id=' . $com->getPostid() . '&action=post');
        } else {
            $com_manager->addCommentWithVerrif($com);
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
    $data = array(
        'number' => htmlspecialchars(stripcslashes(trim($_GET['idpost'])))
    );
    $post = new Post($data);
    $com_manager = new PostManager($post);
    $author = $com_manager->selectAuthorByNumberPost($post);
    $authorpost = $author[0]->getAuthor();
    if (isset($_SESSION['username']) && $authorpost == $_SESSION['username']) {
        /* on recupere l'ancien commentaire pour l'affichier*/
        $data = array(
            'id' => htmlspecialchars(stripcslashes(trim($_GET['id']))),
            'postid' => htmlspecialchars(stripcslashes(trim($_GET['idpost']))),
            'autor' => $_SESSION['username']
        );
        $old_com = new Comment($data);
        $com_manager = new CommentManager($old_com);
        $result = $com_manager->GetComment($old_com);
        $data_for_view = array(
            'text' => $result->getText()
        );
        $old_com_for_view = new Comment($data_for_view);
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
    $data = array(
        'number' => htmlspecialchars(stripcslashes(trim($_GET['idpost'])))
    );
    $post = new Post($data);
    $com_manager = new PostManager($post);
    $author = $com_manager->selectAuthorByNumberPost($post);
    $authorpost = $author[0]->getAuthor();
    if (isset($_SESSION['username']) && $authorpost == $_SESSION['username']) {
        $new_com_to_add = htmlspecialchars(stripcslashes(trim($_POST['comments'])));
        $data_to_add = array(
            'postid' => htmlspecialchars(stripcslashes(trim($_GET['idpost']))),
            'id' => htmlspecialchars(stripcslashes(trim($_GET['id']))),
            'autor' => $_SESSION['username'],
            'text' => $new_com_to_add
        );

        $new_com = new Comment($data_to_add);
        $com_manager = new CommentManager($new_com);
        $com_manager->updateComment($new_com);
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
    try {
        if (isset($_SESSION['username'])) {
            $datauser = array(
                'pseudo' => $_SESSION['username']
            );
            $user = new User($datauser);
            $usermanager = new UserManager();
            $usermanager->GradeUser($user);
            $datacom = array(
                'id' => htmlspecialchars($_GET['id']),
                'postid' => htmlspecialchars($_GET['idpost'])

            );
            $com = new Comment($datacom);
            $managecom = new CommentManager($com);
            $authorcom = $managecom->getAuthorByIdCom($com);
            if (($_SESSION['username'] == $authorcom->getAutor())) {
                $managecom->supprCom($com);

                $_SESSION['message'] = "Votre commentaire a été supprimé";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                include 'views/Co_error.php';
            }
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
    try {
        if (isset($_SESSION['username'])) {
            $datacom = array(
                'id' => htmlspecialchars(stripcslashes(trim($_GET['id']))),
                'postid' => htmlspecialchars(stripcslashes(trim($_GET['idpost'])))
            );
            $datapost = array(
                'number' => htmlspecialchars(stripcslashes(trim($_GET['idpost'])))
            );
            $com = new Comment($datacom);
            $post = new Post($datapost);
            $managecom = new CommentManager($com);
            $managepost = new PostManager($post);
            $datapost = $managepost->selectAuthorByNumberPost($post);
            if ($datapost[0]->getAuthor() == $_SESSION['username']) {
                $managecom->validCom($com);
                $_SESSION['message'] = "Le commentaire a été validé";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                include 'views/Co_error.php';
            }
        } else {
            $_SESSION['message'] = "Vous devez être connecté pour ajouter un commentaire.";
            header('Location: index.php?action=connection');
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}