<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog-Site</title>
    <link rel="stylesheet" href="./CSS.css">
</head>

<body>
    <?php               session_start();
?>
    <header class="header">
        <div class="top-header">
            <img src="./brand-logo.png" alt="">
            <a href="" class="userlogo"><?php  echo "Hello ". $_SESSION["username"] ?></a>
            <a href="./logout.php" class="top-header-link">Log Out</a>

        </div>
        <div class="nav">
            <a href="./Websit-post.php" class="navlink">Post</a>
            <?php
            // session_start() necessory to start when using session or essing  
            // making post link visible only to normal user  i.e who has id 0
            if ($_SESSION["user_Role"] == "1") { ?>
                <a href="./categray.php" class="navlink">Category</a>
                <a href="./users.php" class="navlink">Users</a>
            <?php
            }
            ?>


            <!-- <a href="./categray.php" class="navlink">Category</a>
            <a href="./index.php" class="navlink">Users</a> -->
        </div>
    </header>
    <!-- <div class="page-title-bar">
            <p>User</p>
            <a href="./add.php" target="_blank">Add User</a>
        </div> -->
</body>

</html>