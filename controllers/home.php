<?php

class Home extends Controller {

    function __construct() {
        parent::__construct();
        // saessions area
        //Session::init();
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
        $this->view->get_hldys = $this->global->get_hldys();
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
    echo json_encode($this->model->bank_statement_model());
}
public function get_statements(){
    echo json_encode($this->model->get_statements());
}    
public function profile_pic(){
    echo $this->model->profile_pic($_SESSION['loggedIn']);
}

public function set_user_lvl(){
    echo $this->model->set_user_lvl();
}
public function change_pwd(){
    echo $this->model->change_pwd();
}
public function get_bdys(){
    echo json_encode($this->model->get_bdys());
}
public function edit_emp(){
    echo $this->model->edit_emp();
}
public function updtae_close() {
    echo  $this->model->updtae_close();
}
public function leaves_alert_close() {
    echo  $this->model->leaves_alert_close();
}
public function bdy_alert_close() {
    echo  $this->model->bdy_alert_close();
}
public function selctd_hldys(){
        echo  $this->model->selctd_hldys();
    }
public function get_directory_list(){
        echo  json_encode($this->model->get_directory_list());
}
public function cancel_payslip(){
    echo $this->model->cancel_payslip_model();
}
public function revert(){
    echo $this->model->revert_back();
}
public function export(){
    echo $this->model->export_xl();
}

public function file_dwnld(){
    echo $this->model->file_download();
}

public function srch(){
    echo json_encode($this->model->search());
}
public function get_levs_srch(){
    echo json_encode($this->model->levs_by_srch());
}
public function get_hldy_usr(){
  echo json_encode($this->model->user_hlday());  
}
}
