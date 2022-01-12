<?php include_once 'config/init.php'; ?>

<?php

$user = new User;

if (isset($_POST['submit'])) {
    //Data Array
    $data = array();
    $data['username'] = $_POST['username'];
    $data['email'] = $_POST['email'];
    $data['password'] = $_POST['password'];
    $data['image'] = $_POST['image'];
    $data[''] = '';
    $data[''] = '';
}