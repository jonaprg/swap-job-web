<?php

// require_once 'src/controller/errors.php';

class App{

    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        
        error_log("APP::__construct-> cargando url: " . $url);
        
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if(empty($url[0])){
            $controllerRoute = 'src/controller/login.php';
            require_once $controllerRoute;
            $controller = new Login();
            $controller->loadModel('login');
            $controller->render();
            return false;
        }
        $controllerRoute = 'src/controller/' . $url[0] . '.php';

        error_log("APP::__construct-> This is the controller route: " . $controllerRoute);

        if(file_exists($controllerRoute)){
            require_once $controllerRoute;

            $controller = new $url[0];
            $controller->loadModel($url[0]);

            if(isset($url[1])){
                if(method_exists($controller, $url[1])){
                    if(isset($url[2])){
                        $nParam = count($url) - 2;
                        $params = [];

                        for($i = 0; $i<$nParam; $i++){
                            array_push($params, $url[i+2]);
                        }

                        $controller->{$url[1]}(params);
                    }else{
                        $controller->{$url[1]}();
                    }
                }else{
                    $controller =  new Errors();
                }
            }else{
                $controller->render();
            }
        }else{
            $controller =  new Errors();
        }
    }

}