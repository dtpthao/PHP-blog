<?php require_once("config.php"); ?>
<?php require_once(DB_PATH . "login_filter.php"); ?>

<!-- Header -->
<?php require_once(ROOT_PATH . "/includes/header.php"); ?>
<!-- end Header -->


<section>
    <!-- navbar -->
    <?php require_once(ROOT_PATH . "/includes/navbar.php"); ?>
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