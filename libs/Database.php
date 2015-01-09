<?php

class Database extends PDO{

    function __construct() {
        if($_SERVER['SERVER_NAME'] == 'et.saddahaq.com'){
                parent::__construct('mysql:host=localhost;dbname=SH_EMP', 'root', 'vivenfarms');
        }else{
                parent::__construct('mysql:host=localhost;dbname=SH_EMP_LIVE', 'root', 'dambo');
        }
        
    }

}
