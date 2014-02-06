<?php

ini_set('memory_limit','1024M');
define('APP_NAME','office');
define('IN_ADMIN',1);
require '../M_startup.php';

 $adminArea=1;
require 'M/Office.php';

define('ROOT_ADMIN_URL',SITE_URL);
session_start();
$_SESSION['test']=1;

Mreg::get('setup')->setUpEnv();
$frontend = new M_Office();
header('Content-type:text/html; charset=utf-8');
echo $frontend->display();