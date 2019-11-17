<?php require_once("../config.php"); ?>

<!-- Header -->
<?php require_once(ROOT_PATH . "/includes/header.php"); ?>
<!-- end Header -->

<section>
    <!-- navbar -->
    <nav>
        <ul>
			<?php require_once(ROOT_PATH . "/includes/navbar.php"); ?>
			
            <?php if (empty($_SESSION['user'])) { ?>
            <li><a href="<?php echo 'login.php' ?>">Login</a></li>
            <?php } else {?>
            <li><a href="<?php echo 'logout.php' ?>">Logout</a></li>
            <?php } ?>
        </ul>
    </nav>
    <!-- end navbar -->

    <article>
        <?php if (isset($_SESSION['user'])) { ?>
        <h2>Hello <?php echo $_SESSION['user']['username']; ?></h2>
        <?php } ?>
        <h1>Recent Articles</h1>
    </article>
</section>

<!-- Footer -->
<?php require_once(ROOT_PATH . "/includes/footer.php"); ?>
<!-- end Footer -->