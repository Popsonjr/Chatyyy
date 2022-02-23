<?php include 'config/init.php'; ?>
<?php
$user = new User;

if (isset($_GET['logoutId'])) {
    
    $userId = $_GET['logoutId'];
    if($user->logout($userId)){
        session_unset();
        session_destroy();
        redirect('index.php', 'Logout successfull', 'success');
    }
    
    // header('Location: index.php');
} else {
    header('Location: index.php');
}