<?php include_once 'config/init.php' ?>

<?php

$user = new Message;
$output = '';

if (isset($_SESSION['uniqueId'])) {
    $friendId = $_POST['friendId'];
    $friend = $user->getUserCurrentStatus($friendId);
    if ($friend->status == 'Online') {
        $output .= '<span class="badge bg-success rounded-pill">' . $friend->status . '</span>';
    } else {
        $output .= '<span class="badge bg-light rounded-pill">' . $friend->status . '</span>';
    }
    echo $output;
}
