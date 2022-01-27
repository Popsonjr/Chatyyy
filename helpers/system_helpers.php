<?php 
// Redirect functionality

function redirect($page = FALSE, $message = NULL, $messageType = NULL) {
    if (is_string($page) == true) {
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }

    //check for a message attached
    if ($message != NULL) {
        $_SESSION['message'] = $message;
    }

    //check the message type
    if ($messageType != NULL) {
        $_SESSION['messageType'] = $messageType;
    }

    header('Location: ' . $location);
    exit();
}

function displayMessage(){
    if (!empty($_SESSION['message'])) {
        $message = $_SESSION['message'];

        if (!empty($_SESSION['messageType'])) {
            $messageType = $_SESSION['messageType'];

            if ($messageType == 'error') {
                echo "<div class='alert alert-danger'>". $message . "</div>"; 
            } else {
                echo "<div class='alert alert-success'>". $message . "</div>";
            }

        }
        
        unset($_SESSION['message']);
        unset($_SESSION['messageType']);
            
    } else {
        echo '';
    }
}