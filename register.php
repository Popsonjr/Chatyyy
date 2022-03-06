<?php include_once 'config/init.php'; ?>

<?php

$user = new User;
$template = new Template('templates/signup.php');

if (isset($_POST['submit'])) {
    //Data Array
    $data = array();
    $data['username'] = $_POST['username'];
    $data['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $data['password'] = $_POST['password'];
    $time = time(); //to randomize our id
    $data['uniqueId'] = rand($time, 1000000001);
    $data['status'] = 'Online';

    //Validate Email
    if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        if (!$user->emailCheck($data['email'])) {
            if (isset($_FILES['image'])) {
                $imageName = $_FILES['image']['name'];
                $imageType = $_FILES['image']['type'];
                $tmpName = $_FILES['image']['tmp_name']; //temporary name to move/save file in our folder
                $imageExtension = explode('.', $imageName)[1];
                $extensions = ['png', 'jpeg', 'jpg'];

                if (in_array($imageExtension, $extensions) === true) {
                    $newImageName = $time . $imageName;
                    $data['image'] = "php/images/" . $newImageName;
                    if (move_uploaded_file($tmpName, "php/images/" . $newImageName)) {
                        if ($user->register($data)) {
                            $_SESSION['uniqueId'] = $data['uniqueId'];
                            redirect('index.php', "Registration successful", "success");
                        } else {
                            $_SESSION['errorPage'] = 'register.php';
                            redirect('index.php', 'Registration failed!', 'error');
                        }
                    } else {
                        $_SESSION['errorPage'] = 'register.php';
                        redirect('index.php', 'Image size too large!', 'error');
                    }
                } else {
                    $_SESSION['errorPage'] = 'register.php';
                    redirect('index.php', 'Select a valid file type - jpeg, png, jpg', 'error');
                }
            } else {
                $_SESSION['errorPage'] = 'register.php';
                redirect('index.php', 'Select a profile picture', 'error');
            }
        } else {
            $_SESSION['errorPage'] = 'register.php';
            redirect('index.php', 'Email already exists', 'error');
        }
    } else {
        $_SESSION['errorPage'] = 'register.php';
        redirect('index.php', 'Email is not valid', 'error');
    }
}



echo $template;
