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

function getAllPosts(){
    global $conn;
    $posts = array();

    $query = "SELECT * FROM posts";
    $result = mysqli_query($conn, $query);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (empty($posts)) {
        echo "BUG!";
        return NULL;
    } else {
        foreach ($posts as $post) {
            $post["user"] = getUserById($post["uid"])["username"];
            $post["topic"] = getTopicById($post["tid"])["topic"];
        }
        return $posts;
    }
}

function getUserById($id) {
    global $conn;
    $user = array();
    
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    return $user;
}

function getTopicById($id) {
    global $conn;
    $topic = array();
    
    $query = "SELECT * FROM topics WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $topic = mysqli_fetch_assoc($result);

    return $topic;
}

?>