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
        $comments = $db->prepare('SELECT id, autor, text, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentt WHERE post_id = :idpost ORDER BY comment_date_fr DESC');
        $comments->execute(array(
            ':idpost' => $comment->getPostid()
        ));

        return $comments;
    }
    public function AddComment(Comment $comment)
    {
        try {
            $db = DatabaseConnection::dbConnect();
            $addcom = $db->prepare('INSERT INTO commentt (post_id,autor,text,comment_date) VALUES (:idpost, :autor, :comment, NOW()) ');
            $addcom->execute(array(
                ':idpost' => $comment->getId(),
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
            $update->execute(array(':newcom' => $newcom, ':idpost' => $postid, ':id' => $id));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}