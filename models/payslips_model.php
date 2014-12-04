<?php

class Payslips_model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function payslip_upload() {



        $allowedExts = array("pdf", "png", "jpg", "jpeg");
        $temp = explode(".", $_FILES["file"]["name"]);

        $extension = end($temp);
        // $username = Session::get('loggedIn');
        $useremail = $_POST['useremail'];
        

        
        $folder = "/var/www/emp_mvc/uploads/$useremail/";
        

        if ((($_FILES["file"]["type"] == "application/pdf")||($_FILES["file"]["type"] == "application/x-pdf") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"] < 40000000) && in_array($extension, $allowedExts)) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            } else {
                echo $name = $_FILES["file"]["name"] ."<br>";
                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                echo "Size: " . ($_FILES["file"]["size"] / 40000) . " kB<br>";
                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
                if(!file_exists($folder)){
                    mkdir($folder, 0777);
                                 }
                if (file_exists($folder . $_FILES["file"]["name"])) {
                    echo $_FILES["file"]["name"] . " already exists. ";
                } else {
                    $move  = move_uploaded_file($_FILES["file"]["tmp_name"], $folder . $_FILES["file"]["name"]);
                    echo $folder . $_FILES["file"]["name"];
                    
                    //$sth2 = $this->db->prepare("UPDATE user SET slip = :name WHERE email = :useremail");
                    $sth2 = $this->db->prepare("INSERT INTO slips(email, slip) VALUES (:useremail, :name)");
        
        $sth2->execute(array(':name' => $_FILES["file"]["name"],
                             ':useremail' => $_POST['useremail']));
                }
            }
        } else {
            echo "Invalid file";
            
        }
        
        // $sth2 = $this->db->prepare("INSERT INTO user(slip) VALUES(:name)");
        
        
        
        
        
    }

}
