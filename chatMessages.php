<?php include_once 'config/init.php'; ?>

<?php
$message = new Message;
$output = '';
if (isset($_SESSION['uniqueId'])) {
    $friendId = $_POST['friendId'];

    $results = $message->getUserMessages($_SESSION['uniqueId'], $friendId);
    foreach ($results as $result) {
        if ($result->senderId == $_SESSION['uniqueId']) {
            $output .= '<div class="bg-dark text-white p-3 my-2 d-flex ms-auto" id="send">' . $result->message . '</div>';
        } else {
            $output .= '<div class="text-dark p-3 my-2" id="receive">' . $result->message . '</div>';
        }
    }
    echo $output;
}
