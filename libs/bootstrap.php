<?php

class Bootstrap {

    function __construct() {
        $url = $_SERVER['REQUEST_URI'];
        $url = trim($url, '/');
        $url = explode('/', $url);


//        print_r($url[0]);

        if (empty($url[0])) {
            require 'controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }

        $file = 'controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            require 'controllers/error.php';
            $error = new Error();
            
            return false;
        }
        $controller = new $url[0];
        // $controller->index();
        
        $controller->loadModel($url[0]);
        $controller->globalModel();
        
        

        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{($url[1])}($url[2]);
            } else {
                echo "errrrrrr";
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{($url[1])}();
                } else {
                    echo "404 page";
                }
            } else {
                $controller->index();
                
            }
        }
    }

}
