<?php include_once 'config/init.php'; ?>

<?php

$user = new User;
$message = new Message;
if (isset($_SESSION['uniqueId'])) {
    $template = new Template('templates/friendlist.php');
    $template->message = displayMessage();
    $template->friends = $user->getFriendList($_SESSION['uniqueId']);
    $template->user = $user->getUser($_SESSION['uniqueId']);
} elseif (isset($_SESSION['errorPage'])) {
    if ($_SESSION['errorPage'] == "register.php") {
        $template = new Template('templates/signup.php');
        $template->message = displayMessage();
    }
    
} elseif (isset($_GET['friendId'])) {
    $friendId = $_GET['friendId'];
    $template = new Template('templates/chat.php');
    $template->messages = $message->getUserMessages($_SESSION['uniqueId'], $friendId);

}
else {
    $template = new Template('templates/login.php');
    $template->message = displayMessage();
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