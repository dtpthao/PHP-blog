<?php require_once("config.php"); ?>
<?php require_once(ROOT_PATH . "/includes/login_filter.php"); ?>

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
        <h1>Register</h1>
        <form action="register.php" method="post">
            <div style="width: 60%; margin: 0px auto;">
                <?php foreach ($errors as $error) { ?>
                <p style="color:red"><?php echo $error ?></p>
                <?php } ?>

                <input type='text' name='username' value='<?php echo $username;?>' placeholder='Username'></br>
                <!-- <h5 style="color:red"><?php echo $errors['username']?> </h5> -->

                <input type='email' name='email' value='<?php echo $email; ?>' placeholder='Email'></br>
                <!-- <h5 style="color:red"><?php echo $errors['email']?></h5> -->

                <input type='password' name='password1' placeholder='Password1'></br>
                <!-- <h5 style="color:red"><?php echo $errors['passwd1']?></h5> -->

                <input type='password' name='password2' placeholder='Password2'></br>
                <!-- <h5 style="color:red"><?php echo $errors['passwd2']?></h5> -->

                <button type='submit' name='register_btn'>Register</button>
                <a href="login.php">Sign in</a>
            </div>
        </form>
    </article>
</section>

<!-- Footer -->
<?php require_once(ROOT_PATH . "/includes/footer.php") ?>
<!-- end Footer -->