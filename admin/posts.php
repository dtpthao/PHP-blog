<?php require_once("../config.php"); ?>
<?php require_once(ADMIN_PATH . "admin_access.php"); ?>
<?php require_once(DB_PATH . "admin_functions.php"); ?>
<!-- Header -->
<?php require_once(ADMIN_PATH . "header.php"); ?>
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
                    <th colspan="2">Change</th>
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
                        <a href="<?php echo 'edit_post.php?pid=' . $post['id']?>">Edit</a>
                        <a href="<?php echo 'posts.php?delete-pid=' . $post['id']?>">Delete</a>
                    </th>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="create_post.php">Create new post</a>
    </article>
</section>

<!-- Footer -->
<?php require_once(ROOT_PATH . "/includes/footer.php"); ?>
<!-- end Footer -->