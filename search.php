<?php include_once 'config/init.php'; ?>
<?php
$user = new User;
$output = '';
if (isset($_POST['searchTerm'])) {
    $searchTerm = $_POST['searchTerm'];
    if ($searchTerm === '') {
        $friends = $user->getFriendList($_SESSION['uniqueId']);
        include 'userList.php';
    } else {
        $friends = $user->searchUsers($_SESSION['uniqueId'], $searchTerm);
        if ($friends == false) {
            $output .= '<li class="list-group-item d-flex justify-content-between align-items-center">No user found relating to your search!</li>';
        } elseif ($friends > 0) {
            include 'userList.php';
        }
    }
    echo $output;
}
