<?php
function getAllUsers(){
    global $conn;
    $users = array();

    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (!empty($users)) return $users;
    else {
        echo "BUG!";
        return NULL;
    }
}

function getUserById($uid) {
    global $conn;
    $user = array();
    
    $query = "SELECT * FROM users WHERE id='$uid'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    return $user;
}

//////////////////////////////////////////////////////////////

function getAllTopics() {
    global $conn;
    $topics = array();

    $query = "SELECT * FROM topics";
    $result = mysqli_query($conn, $query);
    $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (empty($topics)) return NULL;
    else return $topics;
}

function getTopicById($tid) {
    global $conn;
    $topic = array();
    
    $query = "SELECT * FROM topics WHERE id='$tid'";
    $result = mysqli_query($conn, $query);
    $topic = mysqli_fetch_assoc($result);

    return $topic;
}

//////////////////////////////////////////////////////////////

function getAllPosts(){
    global $conn;
    $posts = array();

    $query = "SELECT * FROM posts";
    $result = mysqli_query($conn, $query);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (empty($posts)) {
        echo "BUG!";
        return NULL;
    } else return $posts;
}

function getPostById($pid) {
    global $conn;
    $post = array();

    $query = "SELECT * FROM posts WHERE id='$pid'";
    $result = mysqli_query($conn, $query);
    $post = mysqli_fetch_assoc($result);

    return $post;
}

?>