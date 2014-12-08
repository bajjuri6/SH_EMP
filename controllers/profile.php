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
    $this->view->user_details = $this->global->getUserDetails($_SESSION['loggedIn']);
    if($this->view->user_details[0]['user_level'] == 2 || 0){
        header('location: ../error');
            return;
    }
    $this->view->render('profile/index');
}

        
}