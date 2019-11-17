<?php require_once("../config.php"); ?>
<?php require_once(ADMIN_PATH . "admin_access.php"); ?>
<?php require_once(DB_PATH . "/admin_functions.php"); ?>
<!-- Header -->
<?php require_once(ADMIN_PATH . "header.php"); ?>
<!-- end Header -->

<section>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->

    <article>
        <?php $topics = getAllTopics(); ?>
        <h2>New Post</h2>

        <form action="create_post.php" method="post">
            <div style="width:80%; margin:0px auto;">
                <?php foreach ($errors as $error) { ?>
                <p style="color:red"><?php echo $error ?></p>
                <?php } ?>
                <table>
                    <tr>
                        <td>Title</td>
                        <td><input type="text" name="title" placeholder="Title"></td>
                    </tr>
                    <tr>
                        <td>Topic</td>
                        <td><select name="tid">
                                <option value="" selected disabled>Choose topic</option>
                                <?php foreach ($topics as $topic) { ?>
                                <option value="<?php echo $topic['id'] ?>"><?php echo $topic['topic'] ?></option>
                                <?php } ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Content</td>
                        <td><textarea name="content" id="body" cols="30" rows="10"></textarea></td>
                    </tr>
                </table>
                <button type="submit" name="create_post_btn">Save</button>
            </div>
        </form>
    </article>
</section>

<!-- Footer -->
<?php require_once(ROOT_PATH . "/includes/footer.php"); ?>
<!-- end Footer -->