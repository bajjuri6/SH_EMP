<?php

  class Payslips extends Controller {

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
                if($this->view->user_details[0]['user_level'] == 2 || $this->view->user_details[0]['user_level'] == 0){
                header('location: ../error');
                return;
            }
                $this->view->render('payslips/index');
            }
            public function payslip_upload(){
                $this->model->payslip_upload();
            }
}