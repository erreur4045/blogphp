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
require_once 'models/User.php';
require_once 'models/UserManager.php';
require_once 'models/Post.php';
require_once 'models/PostManager.php';
/**
 * Verif connection, verrif si username est admin
 * Puis appel vue
 *
 * @return void
 *
 * @since 1.0.1
 */
function adminusertobevalided()
{
    if (!isset($_SESSION['username'])) {
        include 'views/Co_error.php';
    }
    $data = array('pseudo' => $_SESSION['username'],);
    $user = new User($data);
    $manage_user = new UserManager($user);
    $grade = $manage_user->GradeUser($user);
    if ($grade->getGrade() == 1) {
        $list_user = $manage_user->GetUsersNotAccepted();
        include 'views/AdminUser.php';
    } else {
        include 'views/Co_error.php';
    }


}

/**
 * Verif connection, verrif si username est admin
 * appel ChangeGradeUser pour passage de l'utilisateur au grade 2
 * pour pouvoir ajouter des articles
 * Puis redirection
 *
 * @return void
 *
 * @since 1.0.1
 */
function accceptuser()
{
    if (isset($_SESSION['username'])) {
        $data = array('pseudo' => $_SESSION['username'],);
        $user = new User($data);
        $manage_user = new UserManager($user);
        $grade = $manage_user->GradeUser($user);
        if ($grade->getGrade() == 1) {
            $data = array(
                'id' => $_GET['id'],
                'grade' => '2'
            );
            $user = new User($data);
            $manage_user = new UserManager($user);
            $manage_user->ChangeGradeUser($user);
            $_SESSION['message'] = "L'utilisateur est accepté.";
            header('Location: index.php?action=adminusertobevalided');
        }
    } else {
        include 'views/Co_error.php';
    }
}

/**
 * Verif connection, verrif si username est admin
 * appel SuppUser pour suppresion user
 * Puis redirection
 *
 * @return void
 *
 * @since 1.0.1
 */
function suppuser()
{
    if (isset($_SESSION['username'])) {
        if ($_SESSION['grade'] == 1) {
            $data = array(
                'id' => $_GET['id'],
            );
            $user = new User($data);
            $manage_user = new UserManager($user);
            $data_user = $manage_user->GetDataByIdUser($user);
            $manage_user->SuppUser($data_user);
            $_SESSION['message'] = "L'utilisateur a été supprimé.";
            header('Location: index.php?action=adminusertobevalided');
        }
    } else {
        include 'views/Co_error.php';
    }
}

/**
 * Verif connection, verrif si username est admin
 * appel SuppUser pour recuperer la list des utilisateur non admin
 * Puis appel vue
 *
 * @return void
 *
 * @since 1.0.1
 */
function adminuserlist()
{

    if (isset($_SESSION['username']) && $_SESSION['grade'] == 1) {
        $manage_user = new UserManager();
        $data_user = $manage_user->GetAllUser();
        include 'views/AdminUserList.php';
    } else {
        include 'views/Co_error.php';
    }
}

/**
 * Verif connection, création obj User
 * appel GetAllPostsByUser pour recuperer la list des articles
 * Puis appel vue
 *
 * @return void
 *
 * @since 1.0.1
 */
function dashboard()
{
    if (!isset($_SESSION['username'])) {
        include 'views/Co_error.php';
    } else {
        $data = array(
            'pseudo' => $_SESSION['username'],
        );
        $user = new User($data);
        $manage_user = new UserManager($user);
        $result_post = $manage_user->GetAllPostsByUser($user);
        include 'views/DashboardView.php';
    }
}
/**
 * Verif connection, création obj User
 * appel GetCommentsByUser pour recuperer la list des commentaires
 * Puis appel vue
 *
 * @return void
 *
 * @since 1.0.1
 */
function dashboard2()
{
    if (!isset($_SESSION['username'])) {
        include 'views/Co_error.php';
    } else {
        $data = array(
            'autor' => $_SESSION['username'],
        );
        $com = new Comment($data);
        $manage_user = new CommentManager($com);
        $result_com = $manage_user->GetCommentsByUser($com);
        include 'views/DashboardView2.php';
    }
}
/**
 * Verif connection, création obj User
 * appel GetCommentsByUser pour recuperer la list des commentaires
 * appel GetCommentsToBeApproved pour recuperer la list des commentaires à valider
 * Puis appel vue
 *
 * @return void
 *
 * @since 1.0.1
 */
function dashboard3()
{
    if (!isset($_SESSION['username'])) {
        include 'views/Co_error.php';
    } else {
        $data = array(
            'pseudo' => $_SESSION['username'],
        );
        $user = new User($data);
        $manage_user = new UserManager($user);
        $result_post = $manage_user->GetAllPostsByUser($user);
        $data = array(
            'autor' => $_SESSION['username'],
        );
        $com = new Comment($data);
        $manage_user = new CommentManager($com);
        $result_com = $manage_user->GetCommentsToBeApproved($com);

        include 'views/DashboardView3.php';
    }
}

/**
 * Verif $_POST avec verrif secu
 * Verif si pseudo ou mail deja pris sinon erreur
 * Puis redirection
 *
 * @return void
 *
 * @since 1.0.1
 */
function validincription()
{
    //TODO : verif si $_Post empty
    $username = htmlspecialchars(stripcslashes(trim($_POST['username'])));
    $mdp = htmlspecialchars(stripcslashes(trim($_POST['mdp'])));
    $mail = htmlspecialchars(stripcslashes(trim($_POST['mail'])));

    $data = array(
        'pseudo' => $username,
        'pass' => $mdp,
        'email' => $mail
    );
    $user = new User($data);
    $manage_user = new UserManager($user);
    if ($manage_user->AddUser($user) == 1) {
        $_SESSION['message'] = "Le pseudo choisi est déjà utilisé, veuillez vous inscrire en utilisant un autre pseudo.";
        header('Location: index.php?action=inscription');
    } elseif ($manage_user->AddUser($user) == 2) {
        $_SESSION['message'] = "Le mail choisi est déjà utilisé, veuillez vous inscrire en utilisant un autre mail.";
        header('Location: index.php?action=inscription');
    } else {
        $_SESSION['message'] = "Votre inscription a été prise en compte, vous pouvez maintenant vous connecter.";
        header('Location: index.php');
    }
}

/**
 * Verif $_POST avec verrif secu
 * recupe grade pour assigner les valeurs $_SESSION
 * Puis redirection
 *
 * @return void
 *
 * @since 1.0.1
 */
function connectionuser()
{
    //TODO : verrif empty $_POST
    $username = htmlspecialchars(stripcslashes(trim($_POST['username'])));
    $mdp = htmlspecialchars(stripcslashes(trim($_POST['mdp'])));

    if ($username != null && $mdp != null) {
        $data = array(
            'pseudo' => $username,
            'pass' => $mdp
        );
        $user = new User($data);
        $manage_user = new UserManager($user);
        $grade = $manage_user->GradeUser($user);
        if ($manage_user->ConnectionUser($user) == true && $grade->getGrade() == 1) {
            $_SESSION['username'] = $user->getPseudo();
            $_SESSION['admin'] = true;
            $_SESSION['grade'] = $grade->getGrade();
            $_SESSION['message'] = "Vous êtes bien connecté";
            header('Location: index.php');
        } elseif ($manage_user->ConnectionUser($user) == true) {
            $_SESSION['username'] = $user->getPseudo();
            $_SESSION['admin'] = false;
            $_SESSION['grade'] = $grade->getGrade();
            $_SESSION['message'] = "Vous êtes bien connecté\"";
            header('Location: index.php');
        } else {
            $_SESSION['message'] = "Error MDP ou pseudo";
            header('Location: index.php?action=connection');
        }
    } else {
        $_SESSION['message'] = "Il manque le mot de passe ou le pseudo.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

/**
 * Message de confirmation
 * destruction de la session
 * Puis redirection
 *
 * @return void
 *
 * @since 1.0.1
 */
function deconnection()
{
    $_SESSION['message'] = "Merci pour votre visite";
    session_destroy();
    header('Location: index.php');
}

/**
 * Appel de la vue
 *
 * @return void
 *
 * @since 1.0.1
 */
function incription()
{
    include 'views/IncriptionView.php';
}

/**
 * Appel de la vue
 *
 * @return void
 *
 * @since 1.0.1
 */
function connection()
{
    include 'views/ConnectionUserView.php';
}
