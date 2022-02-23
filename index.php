<?php include_once 'config/init.php'; ?>

<?php

$user = new User;

if (isset($_SESSION['uniqueId'])) {
    $template = new Template('templates/friendlist.php');
    $template->message = displayMessage();
    $template->friends = $user->getFriendList($_SESSION['uniqueId']);
    $template->user = $user->getUser($_SESSION['uniqueId']);
} else {
    $template = new Template('templates/login.php');
}




// $template->test = $user->getFriendList(3456);
// if ($user->login()) {
//     $template->b = $user->login();
// } else {
//     $template->b = "not working";
// }
// $template->user = $user->login('test@gmail.com', 'test');

// $template = new Template('templates/login.php');

echo $template;

?>