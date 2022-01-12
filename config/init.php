<?php

//config file
require_once 'config.php';

//Autoloader
function __autoload($className) {
    require_once 'lib/' .$className. '.php';
}