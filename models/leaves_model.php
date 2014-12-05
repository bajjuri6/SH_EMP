<?php
class Leaves_model extends Model {
    function __construct() {
        parent::__construct();
    }
    public function leaves_apply() {
        if(empty($_POST['from'] || $_POST['to'])){
            $err = -1;
            return $err;
        }
        $frmdt = strtotime($_POST['from']);
        $frmdt = date("Y-m-d", $frmdt);
        $todt = strtotime($_POST['to']);
        $todt = date("Y-m-d", $todt);
        $sth5 = $this->db->prepare("INSERT INTO leaves(subject, fromdate, todate, description, email, apply_date, emp_name, emp_id) VALUES (:sub, :from, :to, :dec, :email, :date, :emp_name, :emp_id)");
        $insert = $sth5->execute(array(':sub' => str_replace("'", "\sq", $_POST['sub']),
            ':from' => strtotime($frmdt),
            ':to' => strtotime($todt),
            ':dec' => str_replace("'", "\sq", $_POST['dec']),
            ':date' => time(),
            ':email' => Session::get('loggedIn'),
            ':emp_id' => $_POST['emp_id'],
            ':emp_name' => $_POST['emp_name']));
        if ($insert == true) {
            $status = "Leave applied successfully";
        } else {
            $status = "Somthing wrong while applying a Leave";
        }
        mail("radhasatish143@gmail.com","leave mail", "new leave", "mukkojusatish@gmail.com");
        return $status;
    }
    public function approve() {
        if ($_POST['hr_status'] == "Approved") {
            $sth7 = $this->db->prepare("UPDATE leaves SET status = 1 WHERE id = :id");
            $update = $sth7->execute(array(':id' => $_POST['id']));
            $status = "You are approved a leave";
            // print_r($sth7->errorInfo()) ;
            // return $status;
        } else {
            if ($_POST['hr_status'] == "Rejected") {
                $sth7 = $this->db->prepare("UPDATE leaves SET status = 0 WHERE id = :id");
                $update = $sth7->execute(array(':id' => $_POST['id']));
                $status = "You are rejected a leave";
                // return $status;
            }
        }
        return $status;
    }
    public function manger_status() {
        if($_POST['mngr_status'] == 1 || $_POST['mngr_status'] == 0){
        $aprve_time = $this->db->prepare("UPDATE leaves SET manager_aprve_tme = :manager_aprve_tme WHERE id = :id");
        $insert = $aprve_time->execute(array(':manager_aprve_tme' => time(), ':id' => $_POST['id']));
        $sth9 = $this->db->prepare("UPDATE leaves SET manager_status = :manager_status WHERE id = :id");
        $manager_status = $sth9->execute(array(':id' => $_POST['id'],
            ':manager_status' => $_POST['mngr_status']));
         $mngr_status = $_POST['mngr_status'];
        if ($manager_status == true) {
            if ($mngr_status == 1) {
                $status = "Your approval confirm and it's forwarded to HR team";
                //return $status;
            }
            If ($mngr_status == 0) {
                $status = "Your are Rejected the leave";
                //return $status;
            }
            return $status;
        }
    }
    else{
        $status = "Something wrong while applying the leave";
        return $status;
    }
    }

}
