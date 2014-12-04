<?php

class View {

    function __construct() {
            //echo "in view controller";
    }
public function render($file_name){
    require 'views/' . $file_name. '.php';
    
   // require '$path';
    // $render = new 
}
}