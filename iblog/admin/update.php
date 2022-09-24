<!DOCTYPE html>
<html lang="en">
<?php
include "./connetion.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update DATA</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form {
            background-color: red;
            width: 80%;
            padding: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin: auto;
        }

        form input,
        select {
            margin: 20px 10px;
            padding: 10px;
            width: 50%;
        }

        button {
            background-color: royalblue;
            font-size: 2em;
            padding: 10px;
        }
    </style>
</head>
<?php
$user_id = $_GET['id'];
echo $user_id;
$query = "SELECT * FROM  data WHERE id = '{$user_id}'";
$result = mysqli_query($conn, $query) or die("Query Failed");


// upading user 
if (isset($_POST['update_user'])) {
    $user_id = $_GET['id'];
    $Name = $_POST['u_name'];
    $U_user_role = $_POST['User-Role'];
    $upade_query = "UPDATE data SET name='{$Name}', u_role = '{$U_user_role}' WHERE id = {$user_id}";
    $result1 = mysqli_query($conn, $upade_query) or die("Update Query Failed");
    if ($result1) {
header("location : http://localhost/curdphp/index.php");
    } else {
        header("location : http://localhost/curdphp/index.php");
    }
}

?>

<body>
    <?php
    while ($roww = mysqli_fetch_assoc($result)) {
    ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <!-- <?php // echo "./update.php?id={$row['id']}" 
                    ?> -->
            <input type="text" name="u_name" value="<?php echo $roww['name'] ?>">
            <select name="User-Role" id="User-Role">
                <option value="1">Admin</option>
                <option value="0">Normal User</option>
            </select>
            <button type="submit" name="update_user">UPDATE DATA</button>
        </form>
    <?php
    }
    ?>
</body>

</html>