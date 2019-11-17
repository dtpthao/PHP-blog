<?php require_once("config.php"); ?>
<?php require_once(DB_PATH . "admin_functions.php"); ?>

<!-- Header -->
<?php require_once(ROOT_PATH . "/includes/header.php"); ?>
<!-- end Header -->

<section>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->

    <article>
        <h2>Posts</h2>
        <?php $posts = getAllPosts(); ?>

        <table border='1'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Topic</th>
                    <th>Views</th>
                    <th>Author</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post) { ?>
                <tr>
                    <th>
                        <?php echo $post['id']; ?>
                    </th>
                    <th>
                        <?php echo $post['title'] ?>
                    </th>
                    <th>
                        <?php echo getTopicById($post["tid"])["topic"]; ?>
                    </th>
                    <th>
                        <?php echo $post['views']; ?>
                    </th>
                    <th>
                        <?php echo getUserById($post["uid"])["username"]; ?>
                    </th>
                    <th>
                        <?php echo $post['created_at']; ?>
                    </th>
                    <th>
                        <?php echo $post['updated_at']; ?>
                    </th>
                    <th>
                        <a href="<?php echo 'view_post.php?pid=' . $post['id']?>">View</a>
                    </th>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </article>
</section>

<!-- Footer -->
<?php require_once(ROOT_PATH . "/includes/footer.php"); ?>
<!-- end Footer -->