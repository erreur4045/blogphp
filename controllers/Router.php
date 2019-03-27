<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 19/03/2019
 * Time: 14:46
 */

class Router
{
    private $_ctrl;
    private $_view;

    public function routeReq()
{
    try{
        //chargement auto des class
        spl_autoload_register(function($class){
            require_once('models/'.$class.'.php');
        });
        $url = '';
        //controler inclus en fonction action
        if(isset($_GET['url']))
        {
            $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

            $controller = ucfirst(strtolower($url[0]));
            $controllerClass = "Controller".$controller;
            $controllerFile = "controllers/".$controllerClass.".php";

            if(file_exists($controllerFile)){
                require_once($controllerFile);
                echo '---------------------------------------------------------------------------------';
                var_dump($controllerFile);
                echo '---------------------------------------------------------------------------------';
                $this->_ctrl = new $controllerClass($url);
                var_dump($controllerFile);
            }
            else
                throw new Exception('Page introuvable');
        }
        else
        {
            require_once ('controllers/ControllerAccueil.php');
            $this->_ctrl = new ControllerAccueil($url);
        }
    }
    //gestion des erreurs
    catch ( Exception $e)
    {
        $errorMsg = $e->getMessage();
        require_once ('views/viewError.php');
    }
}
}