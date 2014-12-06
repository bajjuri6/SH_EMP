<?php

  class Download extends Controller {

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
        $this->view->get_slips = $this->global->getPaySlips($_SESSION['loggedIn']);
        $this->view->render('download/index');
    }
    
    public function down_slips($file_name){
        $folder_name =  Session::get('loggedIn');
        $file_path=APP_PATH."/uploads/$folder_name/" .$file_name;
        echo "$file_path";
        $this->model->down_slips($file_path, $file_name, "image/png");
        $this->view->render('download/index');
    }
    
    public function down_staments($file_name){
        $folder_name =  Session::get('loggedIn');
        $file_path= APP_PATH."/uploads/$folder_name/Bank_statments/" .$file_name;
        echo "$file_path";
        $this->model->down_slips($file_path, $file_name, "image/png");
        $this->view->render('download/index');
    }
    
    public function down_docs($file_name){
        $filename = explode("&", $file_name);
        $folder_name =  Session::get('loggedIn');
        $file_path=APP_PATH."/uploads/".$filename[0]."/docs/".$filename[1];
        echo "$file_path";
        $this->model->down_docs($file_path, $filename[1], "image/png");
        $this->view->render('download/index');
    }
    
    
}