<?php include_once 'config/init.php'; ?>

<?php

$user = new User;
$template = new Template('templates/signup.php');

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
        $_SESSION['uniqueId'] = $data['uniqueId'];
        redirect('index.php', "Registration successful", "success");

        // echo "registered successfully";
    } else {
        echo "error";
    }
}



echo $template;