<?php require_once("../config.php"); ?>
<?php require_once(ADMIN_PATH . "includes/admin_access.php"); ?>
<!-- Header -->
<?php require_once(ROOT_PATH . "/includes/header.php"); ?>
<!-- end Header -->

<section>
    <!-- navbar -->
        <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->

    <article>
        <?php $user = $_SESSION['user']; ?>
        <h2>Edit profile</h2>

        <form action="dashboard.php" method="post">
            <div style="width:60%; margin:0px auto;">
                <input type="text" name="username" value="<?php echo $user['username'] ?>"></br>
                <input type="email" name="email" value="<?php echo $user['email'] ?>"></br>
                <select name="roles" value="<?php echo $user['admin'];?>">Role
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select></br>
                <input type="password" name="password" placeholder="Current password"></br>
                <input type="password" name="newpass1" placeholder="New password"></br>
                <input type="password" name="newpass2" placeholder="Confirm new password"></br>
                <button type="submit" name="edit_user_btn">Save</button>
                <a href="dashboard.php">Cancel</a>
            </div>
    </article>
</section>

<!-- Footer -->
<?php require_once(ROOT_PATH . "/includes/footer.php"); ?>
<!-- end Footer -->