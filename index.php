<?php include_once 'config/init.php'; ?>

<?php

$user = new User;

$template = new Template('templates/login.php');

$template->test = $user->test();
// if ($user->login()) {
//     $template->b = $user->login();
// } else {
//     $template->b = "not working";
// }
$template->user = $user->login('test@gmail.com', 'test');



echo $template;

?>