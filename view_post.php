<?php require_once("config.php"); ?>
<?php require_once(DB_PATH . "public_functions.php"); ?>

<!-- Header -->
<?php require_once(ROOT_PATH . "/includes/header.php"); ?>
<!-- end Header -->

<section>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->

    <article>
        <?php $post = getPostById($_GET['pid']); ?>
        <h2><?php echo $post["title"]; ?></h2>
            <div style="width:80%; margin:0px auto;">
                <table>
                    <tr>
                        <td>Title</td>
                        <td><?php echo $post['title'] ?></td>
                    </tr>
                    <tr>
                        <td>Views</td>
                        <td><?php echo $post['views'] ?></td>
                    </tr>
                    <tr>
                        <td>Topic</td>
                        <td><?php echo getTopicById($post['tid'])['topic'] ?></td>
                    </tr>
                    <tr>
                        <td>Created</td>
                        <td><?php echo $post['created_at'] ?></td>
                    </tr>
                    <tr>
                        <td>Updated</td>
                        <td><?php echo $post['updated_at'] ?></td>
                    </tr>
                    <tr>
                        <td>Content</td>
                        <td><span><?php echo $post['content'] ?></span></td>
                    </tr>
                </table>
            </div>
    </article>
</section>

<!-- Footer -->
<?php require_once(ROOT_PATH . "/includes/footer.php"); ?>
<!-- end Footer -->