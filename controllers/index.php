<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        
        

        // echo "index(login page)";
//        echo $_SESSION['loggedIn'];
    }

    public function index() {
//        var_dump($_SESSION['loggedIn']);
        if($_SESSION['loggedIn']){
//            Session::init();
            $logged = Session::get('loggedIn');
            header('location: ../home');
            exit();
        }
        $this->view->render('index/index');
    }

    public function login() {

        $temp = $this->model->run($_POST['email'], $_POST['password']);
        if($temp == "Incorect email or password"){
            echo $temp;
        }
        else{
            echo URL."home";
        }
        
    }

    public function signup() {
        $this->model->signup();
    }

}
