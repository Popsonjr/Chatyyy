<?php include_once 'config/init.php'; ?>

<?php
$user = new User;
$template = new Template('templates/login.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = $user->login($email, $password);
    if ($result) {
        $_SESSION['uniqueId'] = $result->uniqueId;
        redirect('index.php', 'Login Successful', 'success');
    } else {
        redirect('index.php', 'Email or Password is incorrect', 'error');
    }
}


echo $template;
