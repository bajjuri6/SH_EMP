<?php

defined('LIBRARY') || define('LIBRARY', dirname(__FILE__).'/libs');
define('URL', 'http://'.$_SERVER['SERVER_NAME'].'/');
define('HR_MANAGER', 1);
define('PROJECT_MANAGER', 2);
define('HR', 'hr@saddahaq.com');
if($_SERVER['SERVER_NAME'] == 'employe.saddahaq.com'){
defined('LIVE') || define('LIVE', 'employess.saddahaq.com');
}else{
defined('LIVE') || define('LIVE', 'et.saddahaq.com');
}
