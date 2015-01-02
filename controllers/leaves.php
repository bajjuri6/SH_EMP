<?php

class Leaves extends Controller {

    function __construct() {
        parent::__construct();
        // saessions area
//        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ../index');
            exit();
        }
        
    }
  
    public function index(){
        $this->view->user_details = $this->global->getUserDetails($_SESSION['loggedIn']);
        $this->view->getTakenLeaves = $this->global->getTakenLeaves($_SESSION['loggedIn']);
        $this->view->get_hldys = $this->global->get_hldys();
        $this->view->render('leaves/index');
    }
    
    public function apply(){
        
        echo $this->model->leaves_apply();
        
    }
    
    public function hr_approve(){
         echo $this->model->approve();
    }
    public function hr_reject(){
        $this->model->reject();
    }
    
    public function manger_status(){
     echo $this->model->manger_status();   
    }
    
    
    
}