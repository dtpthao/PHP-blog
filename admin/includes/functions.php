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
?>