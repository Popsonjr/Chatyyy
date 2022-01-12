<?php include_once 'config/init.php'; ?>

<?php

$user = new User;

if (isset($_POST['submit'])) {
    //Data Array
    $data = array();
    $data['username'] = $_POST['username'];
    $data['email'] = $_POST['email'];
    $data['password'] = $_POST['password'];
    $imagePath = $_POST['image'];
    $data['image'] = 'php/images/'. $imagePath;

    $data['uniqueId'] = rand(1012, 1000000001);
    $data['status'] = 'offline';

    if ($user->register($data)) {
        echo "registered successfully";
    } else {
        echo "error";
    }
}

$template = new Template('templates/signup.php');

echo $template;