<?php include_once 'config/init.php'; ?>
<?php

$user = new User;
$output = '';

if (isset($_SESSION['uniqueId'])) {
    $friends = $user->getFriendList($_SESSION['uniqueId']);
    if ($friends > 0) {
        foreach ($friends as $friend) {
            if ($friend->status == 'Online') {
                $color = 'bg-success';
            } else {
                $color = 'bg-light';
            }
            $output .= '<li class="list-group-item d-flex justify-content-between align-items-center">'.$friend->username.'<span class="badge '.$color.' rounded-pill">'.$friend->status.'</span></li>';

        } 
    } else {
        $output = "No user found relating to your search!";
    }
    echo $output;
}
 