<?php
    include "./header.php";
    if ($_SESSION["user_Role"] == "0") { 
        header("location: $localhoat/Websit-post.php");
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./CSS.css">
    <link rel="stylesheet" href="./post-styel.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categray (TABLE)</title>
    <style>
        table{
    counter-reset: count-no;
}
.count::before{
    counter-increment: count-no;
    content: counter(count-no);
}
    </style>
</head>
<body>

    <div class="container">
    <div class="page-title-bar">
            <p>ALL CATEGORY</p>
            <a href="" >Add New Category</a>

        </div>
        <?php
        include "./connetion.php";
        $category_query = "SELECT * FROM category";
        $Result1 = mysqli_query($conn, $category_query);
        if (mysqli_num_rows($Result1) > 0) {
        ?>
            <table>
                <tr>
                    <th>Sr No.</th>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>No of Posts</th>
                    <th>EDIT</th>
                    <TH>DELETE</TH>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($Result1)) {
                ?>
                    <tr>
                    <td class="count"></td>
                        <td><?php echo $row['category_id']; ?></td>
                        <td><?php echo $row['c_name']; ?></td>
                        <td><?php echo $row['post']; ?></td>
                        <td> <a href="" target="_blank" class="update">UPDATE</a> </td>
                        <td> <a href="" class="delete">DELETE</a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        <?php
        }
        ?>
    </div>
</body>

</html>