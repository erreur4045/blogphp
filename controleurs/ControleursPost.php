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
 * Création obj PostManager puis appel selectLastPosts pour vue
 *
 * @return void
 *
 * @since 1.0.1
 */
function listPosts()
{
    $managepost = new PostManager();
    $posts = $managepost->selectLastPosts();
    include 'views/LastPostView.php';
}

/**
 * Création obj PostManager puis appel selectAllPosts pour vue
 *
 * @return void
 *
 * @since 1.0.1
 */
function allPost()
{
    $managepost = new PostManager();
    $posts = $managepost->selectAllPosts();
    include 'views/AllPostView.php';
}

/**
 * Verif connection, Création obj PostManager
 * puis appel suppr pour vue, et redirection
 *
 * @return void
 *
 * @since 1.0.1
 */
function supprPost()
{
    if (isset($_SESSION['username'])) {
        $data = array(
            'number' => htmlspecialchars(stripcslashes(trim($_GET['id']))),
            'author' => htmlspecialchars(stripcslashes(trim($_GET['author'])))
        );
        $post = new Post($data);
        $managepost = new PostManager($post);
        $datapost = $managepost->selectAuthorByNumberPost($post);
        if ($_SESSION['username'] == $datapost[0]->getAuthor()) {
            $managepost->suppr($post);
            $_SESSION['message'] = "Votre article a été supprimé";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        else {
            include 'views/Co_error.php';
        }
    } else {
        include 'views/Co_error.php';
    }
}

/**
 * Verif connection, appel vue, si pas co redirection sur page erreur
 *
 * @return void
 *
 * @since 1.0.1
 */
function addnewpost()
{
    if (isset($_SESSION['username'])) {
        if ($_SESSION['grade'] == 2 OR $_SESSION['grade'] == 1) {
            include 'views/AddnewpostView.php';
        }
    } else {
        include 'views/Co_error.php';
    }
}

/**
 * Verif contenu avec formatage
 * Verif connection / grade (1 = admin 2 = autheur) appel vue,
 * Si ok, on ajoute
 * Si pas connecté, redirection sur page erreur
 *
 * @return void
 *
 * @since 1.0.1
 */
function validpost()
{
    $title = htmlspecialchars(stripcslashes(trim($_POST['title'])));
    $content = htmlspecialchars(stripcslashes(trim($_POST['content'])));
    $author = htmlspecialchars(stripcslashes(trim($_SESSION['username'])));
    if (isset($_SESSION['username'])) {
        $donnees = array(
            'title' => $title,
            'content' => $content,
            'author' => $author
        );
        $post = new Post($donnees);
        $donnees_user = array(
            'pseudo' => $_SESSION['username']
        );
        $user = new User($donnees_user);
        $manager_user = new UserManager($user);
        $grade = $manager_user->GradeUser($user);
        if ($grade->getGrade() == 2 OR $grade->getGrade() == 1) {
            $manager = new PostManager($post);
            $manager->addPost($post);
            $_SESSION['message'] = "Votre article a été ajouté.";
            header('Location: index.php?action=listPosts');
        }
    } else {
        include 'views/Co_error.php';
    }
}

/**
 * Verif contenu avec formatage
 * Verif connection, puis redirection
 *
 * @return void
 *
 * @since 1.0.1
 */
function validupdatepost()
{
    $title = htmlspecialchars(stripcslashes(trim($_POST['title'])));
    $content = htmlspecialchars((trim($_POST['content'])));
    $author = htmlspecialchars(stripcslashes(trim($_SESSION['username'])));
    $id = htmlspecialchars(stripcslashes(trim($_GET['id'])));
    if (isset($_SESSION['username'])) {
        $donnees = array(
            'content' => $content,
            'title' => $title,
            'number' => $id,
            'author' => $author
        );
        $post = new Post($donnees);
        $manager = new PostManager($post);
        $manager->updatePost($post);
        $_SESSION['message'] = "Votre article a été modifié";
        $str = 'Location: index.php?id=' . $_GET['id'] . '&action=post';
        header($str);
    } else {
        $_SESSION['message'] = "Vous devez être connecté pour ajouter un article.";
        header('Location: index.php?action=connection');
    }
}

/**
 * Verif connection verrif $_GET avec formatage,
 * puis appel vue error ou UpdatepostView
 *
 * @return void
 *
 * @since 1.0.1
 */
function modifpost()
{

    if (isset($_SESSION['username'])) {
        $donnees = array(
            'number' => htmlspecialchars(stripcslashes(trim($_GET['id']))),
        );
        $post = new Post($donnees);
        $manager = new PostManager($post);
        $data_view = $manager->selectPostById($post);

    } else {
        include 'views/Co_error.php';
    }
    include 'views/UpdatepostView.php';
}

/**
 * Verif connection verrif $_GET avec formatage,
 * si id est bon on passe dans le if pour recuperer le post
 * Puis appel vue error ou UpdatepostView
 *
 * @return void
 *
 * @since 1.0.1
 */
function post()
{

    if (isset($_SESSION['username'])) {
        /*preparation du tableau pour contruction de OBJ post et creation OBJ*/
        $donnees = array(
            'number' => htmlspecialchars(stripcslashes(trim($_GET['id'])))
        );
        $post_for_data = new Post($donnees);
        /*creation post_manager avec OBJ post*/
        $post_manager = new PostManager($post_for_data);
        /*Creation OBJ post pour recuperer toutes
        les donees du post lier a l'ID du post envoyer*/
        $post = $post_manager->selectPostById($post_for_data);
        if (is_object($post)) {
            /*Preparation des donnees pour creation de OBJ Comment*/
            $data_for_com = array('postid' => htmlspecialchars(stripcslashes(trim($_GET['id']))));
            $comment_for_data = new Comment($data_for_com);
            /*Creation de OBJ manager*/
            $com_manager = new CommentManager($comment_for_data);
            /* Passage des commentaire a la vue */
            $comments = $com_manager->getComments($comment_for_data);
            include 'views/PostViewco.php';
        } else {
            include 'views/Co_error.php';
        }
    } else {
        include 'views/Co_error.php';
    }
}