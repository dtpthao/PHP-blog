<?php

$username = "";
$email    = "";
$errors = array();

if (isset($_POST['login_btn'])) {
    $username = esc($_POST['username']);
    $password = esc($_POST['password']);

    if (empty($username)) {
        array_push($errors, 'Username required');
    }
    if (empty($password)) {
        array_push($errors, 'Password required');
    }
    if (empty($errors)) {
        // $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password = '$password' LIMIT 1";

        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['user'] = mysqli_fetch_assoc($result);
            header('location: index.php');
        } else {
            array_push($errors, 'Wrong credentials');
        }
    }
}

if (isset($_POST['register_btn'])){
    $username = esc($_POST['username']);
    $email    = esc($_POST['email']);
    $password1 = esc($_POST['password1']);
    $password2 = esc($_POST['password2']);

    if (empty($username)) {
        array_push($errors, 'Username required');
        // $errors['username'] = "Username required";
    } else {
        $query = "SELECT id FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($result);
        if ($result) {
            array_push($errors, "This username has been used");
            // $errors['username'] = "This username has been used";
            // header('location: register.php');
        }
    }

    if (empty($email)) {
        array_push($errors, 'Email required');
        // $errors['email'] = "Email required";
    } else {
        $query = "SELECT id FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($result);
        if ($result) {
            array_push($errors, "This email has been used");
            // $errors['email'] = "This email has been used";
            // header('location: register.php');
        }
    }

    if (empty($password1)) {
        array_push($errors, "Password required");
        // $errors['passwd1'] = "Password required";
    } elseif ($password1 != $password2) {
        array_push($errors, "Passwords do not match");
        // $errors['passwd2'] = "Passwords do not match";
    } 
    if (empty($errors)) {
        $password = md5($password1);
        $query = "INSERT INTO users (username, email, password)
                  VALUES ('$username', '$email', '$password');";
        
        $result = mysqli_query($conn, $query);

        //get id of created user
        $uid = mysqli_insert_id($conn);
        
        if ($uid) {
            $_SESSION['msg'] = "Registration succesful.";
            header('location: login.php');
        } else {
            array_push($errors, "A bug somewhere!");
        }
    }
}

    // escape value from form
    function esc(String $value)
    {
        // bring the global db connect object into function
        global $conn;

        $val = trim($value); // remove empty space sorrounding string
        $val = mysqli_real_escape_string($conn, $value);

        return $val;
    }