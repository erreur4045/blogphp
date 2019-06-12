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
        ini_set('display_errors', 'stdout');
        try {
            $db = new PDO('mysql:host=localhost;dbname=testblog;charset=utf8', 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            return $db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}

/*class DatabaseConnection
{
    static public function dbConnect()
    {
        ini_set('display_errors', 'stdout');
        try {
            $db = new PDO('mysql:host=maximethjn373.mysql.db;dbname=maximethjn373;charset=utf8', 'maximethjn373',
                'Maximethi88',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            return $db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}*/