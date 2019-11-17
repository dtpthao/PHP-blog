<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">

    <style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    /* Style the header */
    header {
        background-color: #666;
        padding: 30px;
        text-align: center;
        font-size: 35px;
        color: white;
    }

    /* Create two columns/boxes that floats next to each other */
    nav {
        float: left;
        width: 20%;
        height: 500px;
        /* only for demonstration, should be removed */
        background: #ccc;
        padding: 20px;
    }

    /* Style the list inside the menu
    nav ul {
        list-style-type: none;
        padding: 0;
    } */

    article {
        float: left;
        padding: 20px;
        width: 80%;
        background-color: #f1f1f1;
        height: 500px;
        /* only for demonstration, should be removed */
    }

    /* Clear floats after the columns */
    section:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Style the footer */
    footer {
        background-color: #777;
        padding: 10px;
        text-align: center;
        color: white;
    }

    /* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
    @media (max-width: 600px) {

        nav,
        article {
            width: 100%;
            height: auto;
        }
    }
    </style>
</head>

<body>

    <header>
        <?php if (isset($_SESSION['user'])) { ?>
        <h2>Hello <?php echo $_SESSION['user']['username']; ?></h2>
        <?php } else {?>
        <h2>Header</h2>
        <?php } ?>
    </header>