<?php

class Database extends PDO{

    function __construct() {
       if($_SERVER['SERVER_NAME'] == 'et.saddahaq.com'){
         $this -> db = new PDO('mysql:host=localhost;dbname=SH_EMP', 'root', 'vivenfarms');
      
       }
       else{
         $this -> db = new PDO('mysql:host=localhost;dbname=SH_EMP_LIVE', 'root', 'vivenfarms');
      
      } 
    }

}
