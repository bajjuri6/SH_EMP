<?php

class Home extends Controller {

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
// render area
    public function index() {
        
        $this->view->user_details = $this->global->getUserDetails($_SESSION['loggedIn']);
        $this->view->getLeavesDeatils =  $this->model->getLeavesDeatils($_SESSION['loggedIn']);
        $this->view->getLeavesDeatilsByHr =  $this->model->getLeavesDeatilsByHr($_SESSION['loggedIn']);
        $this->view->all_user_details = $this->global->getAllUserDetails();
        $this->view->render('home/index');
    }
    
    
public function logout(){
    Session::destroy();
    header('location: ../index');
    exit();
}
public function register(){
    
    echo $this->model->register();

}


public function pdf(){
    echo $this->model->mpdf($_SESSION['loggedIn']);
}

public function due_deatils(){
    echo json_encode($this->model->paid_deatils($_SESSION['loggedIn']));
}

public function postupdate(){
    echo $this->model->updates();
    
}
public function getupdates(){
         echo json_encode($this->model->get_new_update());
     }  
 
public function empdocs(){
         echo $this->model->empdocs();
     }
public function bank_statement(){
    echo json_encode($this->model->bank_statement());
}
public function get_statements(){
    echo json_encode($this->model->get_statements());
}    
public function profile_pic(){
    echo $this->model->profile_pic($_SESSION['loggedIn']);
}
}
