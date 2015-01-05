<?php

class Global_model extends Model {

    function __construct() {
        parent::__construct();
        
    }

    public function getUserDetails($em) {
        $sth = $this->db->prepare("SELECT * FROM new_emp WHERE emp_email = :email");
        $sth->execute(array(
            ':email' => $em));
           $row = $sth->rowCount();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC) ;   
        return $res;   
    }
    
    public function getAllUserDetails() {
        $sth10 = $this->db->prepare("SELECT * FROM new_emp");
        $sth10->execute();
           $row = $sth10->rowCount();
        $res = $sth10->fetchAll(PDO::FETCH_ASSOC) ;   
        return $res;   
    }
    
    public function getPaySlips($em){
        $sth = $this->db->prepare("SELECT * FROM slips WHERE email = :email ORDER BY id DESC");
        $sth->execute(array(':email' => $em));
           $row = $sth->rowCount();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;   
    }
    
     public function getTakenLeaves($em){
        $sth7 = $this->db->prepare("SELECT * FROM leaves WHERE email = :email ORDER BY apply_date DESC");
        $sth7->execute(array(':email' => $em));
        $result = $sth7->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function get_hldys(){
        $itm = $this->db->prepare("SELECT * FROM  new_emp");
        $itm->execute();
        $tm = $itm->fetchAll(PDO::FETCH_ASSOC);
        $full_data = [];
        var_dump(sizeof($tm));
        foreach ($tm as $row){
        $email = $row['emp_email'];
        $item2 = $this->db->prepare("SELECT _email_, _statement_, _time_, _status_ FROM _user_statements_ WHERE _email_ = :email and _status_ = 1");
        $item2->execute(array(':email'=>$email));
        $data = $item2->fetchAll(PDO::FETCH_ASSOC);
//        var_dump($data);
        if(empty($data[0])){
            array_push($full_data, $row);
        }else{
         $d = array_merge($row, $data[0]);
         array_push($full_data, $d);
        }
      
        }
//        var_dump($full_data);
        //var_dump($full_data[0]);

        
        
            $get_hldys = $this->db->prepare("SELECT * FROM holidays_list");
            $get_hldys->execute();
            $deatils = $get_hldys->fetchAll(PDO::FETCH_ASSOC);
            return $deatils;
        }
}

