<?php

require_once("public_functions.php");

$errors = array();
$posts = array();

if (isset($_POST["create_post_btn"])) {
    createPost($_POST);
}

if (isset($_POST["edit_post_btn"])) {
    editPost($_POST); //not writen yet
}

if (isset($_GET["delete-pid"])) {
    deletePost($_GET["delete-pid"]);
}

function createPost($post)
{
    global $conn, $_SESSION;
    $uid = esc($_SESSION['user']['id']);
    $tid = esc($post['tid']);
    $title = esc($post['title']);
    $content = esc($post['content']);

    if (empty($title)) {
        array_push($errors, "Post title is required");
    }
    if (empty($content)) {
        array_push($errors, "Post body is required");
    }
    if (empty($tid)) {
        array_push($errors, "Post topic is required");
    }
    
    if (empty($errors)) {
        $query = "INSERT INTO posts (`uid`, `tid`, `title`, `content`) 
                  VALUES ('$uid', '$tid', '$title', '$content')";
        $result = mysqli_query($conn, $query);
        //get id of created post
        $pid = mysqli_insert_id($conn);
        
        if ($pid) {
            header('location: posts.php');
        } else {
            array_push($errors, "A bug somewhere!");
        }
    } else {
        array_push($errors, 'Something went wrong.');
    }
}

function deletePost($pid) {
    global $conn;

    $query = "DELETE FROM posts WHERE id='$pid'";
    if (mysqli_query($conn, $query)) {
        header("location: posts.php");
    }
}

////////////////////////////////////////////////////////////

function getAllUsers()
{
    global $conn;
    $users = array();

    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (!empty($users)) {
        return $users;
    } else {
        echo "BUG!";
        return null;
    }
}



