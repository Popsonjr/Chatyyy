<?php include_once 'config/init.php'; ?>

<?php
$message = new Message();

if (isset($_SESSION['uniqueId'])) {
    $messageData = array();
    $messageData['message'] = $_POST['message'];
    $messageData['senderId'] = $_SESSION['uniqueId'];
    $messageData['receiverId'] = $_POST['friendId'];
    if (!empty($messageData['message'])) {
        $result = $message->addNewMessage($messageData);
    }
}
