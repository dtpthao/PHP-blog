<?php require_once("../config.php"); ?>
<?php require_once(DB_PATH . "admin_functions.php"); ?>
<?php require_once(ADMIN_PATH . "includes/admin_access.php"); ?>
<!-- Header -->
<?php require_once(ROOT_PATH . "/includes/header.php"); ?>
<!-- end Header -->

<section>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->

    <article>
        <h2>Users</h2>
        <?php $users = getAllUsers(); ?>

        <table border='1'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Password</th>
                    <th>Post</th>
                    <th colspan="2">Change</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                <form action="users.php" method="post">
                    <tr>
                        <th>
                            <?php echo $user['id']; ?>
                        </th>
                        <th>
                            <a href="<?php echo ADMIN_PATH . 'edit_profile.php'?>"><?php echo $user['username'] ?></a>
                        </th>
                        <th>
                            <input type='email' name='email' value="<?php echo $user['email']?>">
                        </th>
                        <th>
                            <select name="role">
                                <option value="<?php echo $user['role']?>"><?php echo $user['role']?></option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </th>
                        <th>
                            <input type="text" name="password" value="<?php echo $user['password']?>">
                        </th>
                        <th>0</th>
                        <th>
                            <button type="submit" name="edit-uid" value="<?php echo $user['id']?>">Edit</button>
                            <button type="submit" name="delete-uid" value="<?php echo $user['id']?>">Delete</button>
                        </th>
                    </tr>
                    <?php } ?>
                </form>
            </tbody>
        </table>

        <h2>Create new user</h2>
        <form action="users.php" method="post">
            <div style="width:80%; margin:0px auto;">
                <input type="text" name="username" placeholder="Username"></br>
                <input type="email" name="email" placeholder="Email"></br>
                <select name="roles">
                    <option value="" selected disabled>Assign role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select></br>
                <input type="password" name="password1" placeholder="Password1"></br>
                <input type="password" name="password2" placeholder="Password2"></br>
                <button type="submit" name="create_user_btn">Create</button>
            </div>
        </form>
    </article>
</section>

<!-- Footer -->
<?php require_once(ROOT_PATH . "/includes/footer.php"); ?>
<!-- end Footer -->