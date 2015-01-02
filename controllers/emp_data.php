<?php 

  class Emp_data extends Controller {

      function __construct() {
          parent::__construct();
//          Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            header('location: ../index');
            exit();
        }
//        if($_SESSION['loggedIn'] !== HR){
//            header('location: ../error');
//            return;
//        }
        }
        public function index(){
            $this->view->user_details = $this->global->getUserDetails($_SESSION['loggedIn']);
            $this->view->all_user_details = $this->global->getAllUserDetails();
            $this->view->get_hldys = $this->global->get_hldys();
            if($this->view->user_details[0]['user_level'] == 2 || $this->view->user_details[0]['user_level'] == 0){
            header('location: ../error');
            return;
    }
            $this->view->render('emp_data/index');
        }
        public function mail(){
            $mail = mail("radhasatish143@gmail.com","My subject","hi this is my first mail");
            if($mail == true){
                echo "sucess";
            }  else {
               echo "not send";    
            }
        }
                
}