<?php require_once("../config.php"); ?>
<?php require_once(ADMIN_PATH . "includes/admin_access.php"); ?>
<?php require_once(DB_PATH . "admin_functions.php"); ?>
<!-- Header -->
<?php require_once(ROOT_PATH . "/includes/header.php"); ?>
<!-- end Header -->

<section>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->

    <article>
        <?php $post = getPostById($_GET['pid']); ?>
        <?php $topics = getAllTopics(); ?>
        <h2><?php echo $post["title"]; ?></h2>

        <form action="edit_post.php" method="post">
            <div style="width:80%; margin:0px auto;">
                <table>
                    <tr>
                        <td>Title</td>
                        <td><input type="text" name="title" value="<?php echo $post['title'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Views</td>
                        <td><?php echo $post['views'] ?></td>
                    </tr>
                    <tr>
                        <td>Topic</td>
                        <td><select name="topic">
                                <option value="<?php echo $post['tid'] ?>" selected disabled>
                                    <?php echo getTopicById($post['tid'])['topic'] ?></option>
                                <?php foreach ($topics as $topic) { ?>
                                <option value="<?php echo $topic['id'] ?>"><?php echo $topic['topic'] ?></option>
                                <?php } ?>
                            </select></td>
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
                        <td><textarea name="content" cols="30" rows="10"><?php echo $post['content'] ?></textarea></td>
                    </tr>
                </table>
                <button type="submit" name="edit_post_btn">Save</button>
            </div>
        </form>
    </article>
</section>

<!-- Footer -->
<?php require_once(ROOT_PATH . "/includes/footer.php"); ?>
<!-- end Footer -->