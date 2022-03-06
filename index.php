<?php include_once 'config/init.php'; ?>

<?php

$user = new User;
$message = new Message;
if (isset($_GET['friendId'])) { // redirect to chat page when a user is selected
    $friendId = $_GET['friendId'];
    
    $template = new Template('templates/chat.php');
    $template->friend = $user->getUser($friendId);
    $template->messages = $message->getUserMessages($_SESSION['uniqueId'], $friendId);
    $template->friendId = $friendId;

}elseif (isset($_SESSION['uniqueId']) || isset($_GET['users'])) { // redirect to friendlist page when user has succesfully logged in 
    $template = new Template('templates/friendlist.php');
    $template->message = displayMessage();
    $template->friends = $user->getFriendList($_SESSION['uniqueId']);
    $template->user = $user->getUser($_SESSION['uniqueId']);

} elseif (isset($_SESSION['errorPage'])) { // if there's an error while registering display error on register page
    if ($_SESSION['errorPage'] == "register.php") {
        $template = new Template('templates/signup.php');
        $template->message = displayMessage();
    }
    
} 
else { //redirect to login page if user hasn't login
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