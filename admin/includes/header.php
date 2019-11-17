<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="../static/public_style.css">
    <meta charset="UTF-8">
</head>

<body>

    <header>
        <?php if (isset($_SESSION['user'])) { ?>
        <h2>Hello <?php echo $_SESSION['user']['username']; ?></h2>
        <?php } else {?>
        <h2>Header</h2>
        <?php } ?>
    </header>