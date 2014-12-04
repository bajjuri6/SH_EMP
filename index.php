<?php

if(!isset($_SESSION)){
    session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
defined('UPLOADS') || define('UPLOADS', dirname(__FILE__).'/uploads');
date_default_timezone_set('Asia/Calcutta');
require 'libs/bootstrap.php';
require 'libs/controller.php';
require 'libs/model.php';
require 'libs/view.php';

//libary 
require 'libs/Database.php';
require 'libs/Session.php';

//config
require 'config/paths.php';
//require 'config/database.php';
$bootstrap = new Bootstrap();
?>