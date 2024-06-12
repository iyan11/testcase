<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start();
ob_start();


spl_autoload_register(function($class){
    // Load or Require the class File
    if(is_file("classes/_$class.class.php")){
        require_once("classes/_$class.class.php");
    }else{
        die("classes/_$class.class.php file does not exists.");
    }
});
$db = new db();
new router($db);
