<?php

class Profile extends Controller {

    function __construct() {
        parent::__construct();
        
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ../index');
            exit();
        }
     // echo "profile page";   
    }
    
public function index(){
    $this->view->render('profile/index');
}

        
}