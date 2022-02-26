<?php include_once 'config/init.php'; ?>
<?php
$user = new User;
$output = '';
if (isset($_POST['searchTerm'])) {
    $searchTerm = $_POST['searchTerm'];
    $friends = $user->searchUsers($_SESSION['uniqueId'], $searchTerm);
    if ($friends == false) {
        $output .= '<li class="list-group-item d-flex justify-content-between align-items-center">No user found relating to your search!</li>';
    } elseif ($friends > 0) {
        foreach ($friends as $friend) {
            if ($friend->status == 'Online') {
                $color = 'bg-success';
            } else {
                $color = 'bg-light';
            }
            $output .= '<li class="list-group-item d-flex justify-content-between align-items-center">'.$friend->username.'<span class="badge '.$color.' rounded-pill">'.$friend->status.'</span></li>';

        } 
    }
    
    echo $output;
}