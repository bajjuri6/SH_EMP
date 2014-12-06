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
    
   
}

