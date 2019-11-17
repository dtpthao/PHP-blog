<?php

$errors = array();

if (isset($_POST["create_post_btn"])) {
    createPost($_POST);
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

function getUserById($uid)
{
    global $conn;
    $user = array();
    
    $query = "SELECT * FROM users WHERE id='$uid'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    return $user;
}

//////////////////////////////////////////////////////////////

function getAllTopics()
{
    global $conn;
    $topics = array();

    $query = "SELECT * FROM topics";
    $result = mysqli_query($conn, $query);
    $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (empty($topics)) {
        return null;
    } else {
        return $topics;
    }
}

function getTopicById($tid)
{
    global $conn;
    $topic = array();
    
    $query = "SELECT * FROM topics WHERE id='$tid'";
    $result = mysqli_query($conn, $query);
    $topic = mysqli_fetch_assoc($result);

    return $topic;
}

//////////////////////////////////////////////////////////////

function getAllPosts()
{
    global $conn;
    $posts = array();

    $query = "SELECT * FROM posts";
    $result = mysqli_query($conn, $query);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (empty($posts)) {
        echo "BUG!";
        return null;
    } else {
        return $posts;
    }
}

function getPostById($pid)
{
    global $conn;
    $post = array();

    $query = "SELECT * FROM posts WHERE id='$pid'";
    $result = mysqli_query($conn, $query);
    $post = mysqli_fetch_assoc($result);

    return $post;
}
