<?php require_once("config.php"); ?>
<?php require_once(DB_PATH . "login_filter.php"); ?>

<!-- Header -->
<?php require_once(ROOT_PATH . "/includes/header.php"); ?>
<!-- end Header -->


<section>
    <!-- navbar -->
    <nav>
        <ul>
            <?php require_once(ROOT_PATH . "/includes/navbar.php"); ?>
        </ul>
    </nav>
    <!-- end navbar -->

    <article>
        <h5><?php 
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    session_unset($_SESSION['msg']);
                } 
            ?>
        </h5>
        <h1>Login</h1>
        <form action="login.php" method="post">
            <div style="width: 60%; margin: 0px auto;">
                <?php foreach ($errors as $error) { ?>
                <p style="color:red"><?php echo $error ?></p>
                <?php } ?>
                <input type='text' name='username' placeholder='Username'> </br>
                <input type='password' name='password' placeholder='Password'> </br>
                <button type='submit' name='login_btn'>Sign in </button>
                <a href="register.php">Sign up</a>
            </div>
        </form>
    </article>
</section>

<!-- Footer -->
<?php require_once(ROOT_PATH . "/includes/footer.php") ?>
<!-- end Footer -->