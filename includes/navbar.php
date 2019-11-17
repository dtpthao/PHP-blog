<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="posts.php">Posts</a></li>
        <?php if (empty($_SESSION['user'])) { ?>
        <li><a href="<?php echo 'login.php' ?>">Login</a></li>
        <?php } else {?>
        <li><a href="<?php echo 'logout.php' ?>">Logout</a></li>
        <?php } ?>
    </ul>
</nav>