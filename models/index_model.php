<?php

class Index_model extends Model {

    function __construct() {
        parent::__construct();
        // echo "in index_model";
    }

    public function signup() {
        $sth1 = $this->db->prepare("INSERT INTO user(firstname, lastname, username, email, password) VALUES (:firstname, :lastname, :username, :email, :password)");
        $insert = $sth1->execute(array(
                            ':firstname' => $_POST['firstname'],
                            ':lastname' => $_POST['lastname'],
                            ':username' => $_POST['username'],
                            ':email' => $_POST['email'],
                            ':password' => md5($_POST['password'])));
        
        if($insert == true){
            
        header('location: ../home');
        exit();
        }
        else
        {
            
            echo "somthing went wrong";
            // echo "\nPDO::errorInfo():\n";
            print_r($sth1->errorInfo());
        }
    }

    public function run($em, $pw) {
        $sth = $this->db->prepare("SELECT * FROM new_emp WHERE emp_email = :email AND password = :password");
        $sth->execute(array(
           ':email' => $em,
           ':password' => md5($pw)));
           $row = $sth->rowCount();
           $result = $sth->fetchAll(PDO::FETCH_ASSOC);   
        if ($row > 0) {
            Session::set('loggedIn', $em);
        } else {
           $err = "Incorect email or password";
           return $err;
                   }
        
    }
    

}
