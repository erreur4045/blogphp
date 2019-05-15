<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 15/05/2019
 * Time: 16:45
 */

class DatabaseConnection
{
    static public function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=testblog;charset=utf8', 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            return $db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}