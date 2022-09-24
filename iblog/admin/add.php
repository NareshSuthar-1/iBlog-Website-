<?php
    include "./header.php";
    if ($_SESSION["user_Role"] == "0") { 
        header("location: $localhoat/Websit-post.php");
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<?php
include "./connetion.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add DATA</title>
    <style>
    </style>
    <link rel="stylesheet" href="./post-styel.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            padding: 10px 100px;
        }
    </style>
</head>
<?php
if (isset($_POST['submit'])) {
    $getName = $_POST['name'];
    $getpassword = $_POST['password'];
    $get_U_role = $_POST['User-Role'];
    $addQuery = "INSERT INTO data(name, password, u_role) VALUES ('{$getName}','{$getpassword}','{$get_U_role}')";
    $result = mysqli_query($conn, $addQuery) or die("not added");
}
?>
<body>
    <div class="container">

        <form action="./add.php" method="post">
            <label for="name">User Name</label>
            <input type="text" id="name" name="name">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <label for="User-Role">User Role</label>

            <select name="User-Role" id="User-Role">
                <option value="1">Admin</option>
                <option value="0">Normal User</option>
            </select>
            <button type="submit" class="btn" name="submit" style="margin: 20px;"> Add User</button>
        </form>
    </div>
</body>

</html>