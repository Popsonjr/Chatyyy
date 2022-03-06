<?php include_once 'config/init.php'; ?>
<?php

$user = new User;
$output = '';

if (isset($_SESSION['uniqueId'])) {
    $friends = $user->getFriendList($_SESSION['uniqueId']);
    if ($friends > 0) {
        include 'userList.php';
    } else {
        $output = "No available users!";
    }
    echo $output;
}
