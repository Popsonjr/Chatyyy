<?php include 'config/init.php'; ?>

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
        echo "error";
    }
}


echo $template;
