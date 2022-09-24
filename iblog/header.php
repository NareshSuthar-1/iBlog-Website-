<!DOCTYPE html>
<html lang="en">
<?php  
    include "./conntection.php";

if(isset($_GET['cat_id'])){
    $get_cat_id = $_GET['cat_id'];

}
?>
<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>i-Blog</title>
    <!-- <link rel="stylesheet" href="./css/singlePageStyle.css"> -->
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link rel="stylesheet" href="./css/style.css">
    <style>
    .login-btn{
        border: 2px solid royalblue;
        padding: 5px 20px;
        text-decoration: none;
        font-weight: bolder;
        color: royalblue;
        transition: .7s;
        border-radius: 20px;
        text-transform: uppercase
    }
    .login-btn:hover{
        background-color: royalblue;
        color: white;

    }
    </style>
</head>
<header>
    <div class="main-header">
        <div class="logo"><a href="./index.php">i-Blog</a></div>
        <a class="login-btn" href="./admin/index.php">
            Login
        </a>
    </div>
    <?php
                            $active = "";

    $sql = "SELECT * FROM category WHERE post >0";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

    ?>
        <nav>
        <a href="./index.php" class="nav-iteam ">Home</a>
            <?php while ($row = mysqli_fetch_assoc($result)) {
                if(isset($_GET['cat_id'])){
                    if($get_cat_id == $row['category_id']){
                        $active = "active";
                    }
                    else{
                        $active = "";
                    }                
                }
             
                echo '<a href="./category.php?cat_id=' . $row['category_id'] . '" class="nav-iteam '.$active.'">' .  $row['c_name'] . '</a>';
            ?>
            <?php } ?>
        </nav>
    <?php } ?>
</header>

</html>