<?php
session_start();
//config file
require_once 'config.php';


//helper files
require_once 'helpers/system_helpers.php';

//Autoloader
function __autoload($className) {
    require_once 'lib/' .$className. '.php';
}