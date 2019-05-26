<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 18/05/2019
 * Time: 23:09
 */

class CommentManager
{
    public function GetComments(Comment $comment)
    {
        $db = DatabaseConnection::dbConnect();
        $comments = $db->prepare('SELECT id, autor, approved, text, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentt WHERE post_id = :idpost ORDER BY comment_date_fr DESC');
        $comments->execute(array(
            ':idpost' => $comment->getPostid()
        ));

        return $comments;
    }

    public function GetCommentsByUser(Comment $comment)
    {
        $request = 'SELECT id, autor, text, post_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentt WHERE autor =' . '\'' . $comment->getAutor() . '\' ORDER BY comment_date_fr DESC' ;
        $req = DatabaseConnection::dbConnect()->query($request);
        /*$db = DatabaseConnection::dbConnect();
        $comments = $db->prepare('SELECT id, autor, text, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentt WHERE author = :author ORDER BY comment_date_fr DESC');
        $comments->execute(array(
            ':author' => $comment->getAutor()
        ));*/
        return $req;
    }

    public function GetCommentsToBeApproved(Comment $comment)
    {
        $request = 'SELECT * FROM commentt, post WHERE author =' . '\'' . $comment->getAutor() . '\' AND approved = 0 AND autor != ' . '\''. $comment->getAutor() . '\'' ;
        $req = DatabaseConnection::dbConnect()->query($request);
        return $req;
    }

    public function AddComment(Comment $comment)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $addcom = $db->prepare('INSERT INTO commentt (post_id,autor,text,comment_date,approved) VALUES (:idpost, :autor, :comment, NOW(),0) ');
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
            $update = $db->prepare('UPDATE `commentt` SET `text` = :newcom, `comment_date` = NOW()  WHERE `commentt`.`id` = :id AND `commentt`.`post_id` = :idpost ');
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
        $thecomment = $db->prepare('SELECT text FROM commentt WHERE post_id = :idpost AND id= :id AND autor = :author');
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
        $recup = $db->prepare('DELETE FROM commentt WHERE id = :id AND post_id = :postid');
        $recup->execute(array(
            ':id'=>$com->getId(),
            ':postid'=>$com->getPostid()
        ));
    }
    public function validCom(Comment $com)
    {
        $db = DatabaseConnection::dbConnect();
        $recup = $db->prepare('UPDATE `commentt` SET `approved` = 1 WHERE id = :id AND post_id = :postid');
        $recup->execute(array(
            ':id'=>$com->getId(),
            ':postid'=>$com->getPostid()
        ));
    }
}