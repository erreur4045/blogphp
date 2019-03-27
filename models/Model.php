<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 19/03/2019
 * Time: 15:04
 */

abstract class Model
{
    private static $_bdd;

    private static function setBdd()
    {
        self::$_bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd()
    {
        if (self::$_bdd == null) {
            self::setBdd();
        }
        return self::$_bdd;
    }

    protected function getAll($table, $obj)
    {
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM ' . $table . ' ORDER BY id desc');
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
}