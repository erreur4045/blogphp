<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 18/05/2019
 * Time: 23:09
 */

class CommentManager
{
    public function VerrifAuthor(Comment $comment)
    {
        $db = DatabaseConnection::dbConnect();
        $author = $db->prepare('SELECT id, autor, approved, text, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM blogphp_commentaire WHERE post_id = :idpost ORDER BY comment_date_fr DESC');
        $author->execute(array(
            ':idpost' => $comment->getPostid()
        ));

        return $author;
    }
    public function GetComments(Comment $comment)
    {
        $all_comments = [];
        $db = DatabaseConnection::dbConnect();
        $comments = $db->prepare('SELECT id, postid, autor, approved, text, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM blogphp_commentaire WHERE postid = :idpost ORDER BY comment_date DESC');
        $comments->execute(array(
            ':idpost' => $comment->getPostid()
        ));

        while ($donnees = $comments->fetch(PDO::FETCH_ASSOC))
        {
            $all_comments[] = new Comment($donnees);
        }

        return $all_comments;
    }

    public function GetCommentsByUser(Comment $comment)
    {
        $all_comments_by_user = [];
        $db = DatabaseConnection::dbConnect();
        $comments = $db->prepare('SELECT id, autor, text, postid, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM blogphp_commentaire WHERE autor = :author ORDER BY comment_date DESC');
        $comments->execute(array(
            ':author' => $comment->getAutor()
        ));
        while ($donnees = $comments->fetch(PDO::FETCH_ASSOC))
        {
            $all_comments_by_user[] = new Comment($donnees);
        }

        return $all_comments_by_user;
    }

    public function GetCommentsToBeApproved(Comment $comment)
    {
        $get_comments_to_approve = [];
        $db = DatabaseConnection::dbConnect();
        $comments = $db->prepare('SELECT * FROM blogphp_commentaire JOIN blogphp_posts ON number = postid WHERE blogphp_commentaire.autor != :author AND approved = 0');
        $comments->execute(array(
            ':author' => $comment->getAutor()
        ));
        while ($donnees = $comments->fetch(PDO::FETCH_ASSOC))
        {
            $get_comments_to_approve[] = new Comment($donnees);
            $get_comments_to_approve[] = new Post($donnees);
        }
        return $get_comments_to_approve;
    }

    public function AddCommentWithVerrif(Comment $comment)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $addcom = $db->prepare('INSERT INTO blogphp_commentaire (postid,autor,text,comment_date,approved) VALUES (:idpost, :autor, :comment, NOW(),0) ');
            $addcom->execute(array(
                ':idpost' => $comment->getPostid(),
                ':autor' => $comment->getAutor(),
                ':comment' => $comment->getText()
            ));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function AddCommentLessVerrif(Comment $comment)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $addcom = $db->prepare('INSERT INTO blogphp_commentaire (postid,autor,text,comment_date,approved) VALUES (:idpost, :autor, :comment, NOW(),1) ');
            $addcom->execute(array(
                ':idpost' => $comment->getPostid(),
                ':autor' => $comment->getAutor(),
                ':comment' => $comment->getText()
            ));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function UpdateComment(Comment $comment)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $update = $db->prepare('UPDATE `blogphp_commentaire` SET `text` = :newcom  WHERE `blogphp_commentaire`.`id` = :id AND `blogphp_commentaire`.`postid` = :idpost ');
            $update->execute(array(
                ':newcom' => $comment->getText(),
                ':idpost' => $comment->getPostid(),
                ':id' => $comment->getId()
            ));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function GetComment(Comment $comment)
    {
        $db = DatabaseConnection::dbConnect();
        $thecomment = $db->prepare('SELECT text FROM blogphp_commentaire WHERE postid = :idpost AND id= :id AND autor = :author');
        $thecomment->execute(array(
            ':idpost' => $comment->getPostid(),
            ':id'     => $comment->getId(),
            'author' => $comment->getAutor()
        ));

        return $thecomment;
    }
    public function supprCom(Comment $com)
    {
        $db = DatabaseConnection::dbConnect();
        $recup = $db->prepare('DELETE FROM blogphp_commentaire WHERE id = :id AND post_id = :postid');
        $recup->execute(array(
            ':id'=>$com->getId(),
            ':postid'=>$com->getPostid()
        ));
    }
    public function validCom(Comment $com)
    {
        $db = DatabaseConnection::dbConnect();
        $recup = $db->prepare('UPDATE `blogphp_commentaire` SET `approved` = 1 WHERE id = :id AND post_id = :postid');
        $recup->execute(array(
            ':id'=>$com->getId(),
            ':postid'=>$com->getPostid()
        ));
    }
}