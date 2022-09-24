<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./CSS.css">
    <link rel="stylesheet" href="./post-styel.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post LIST (TABLE)</title>
</head>
<style>
table{
    counter-reset: count-no;
}
.count::before{
    counter-increment: count-no;
    content: counter(count-no);
}
</style>

<body>
    <?php
    include "./header.php";
    ?>
    <div class="container">

        <div class="page-title-bar">
            <p>ALL POSTS</p>
            <a href="./addPost-form.php" target="_blank">Add New Post</a>

        </div>
        <?php
        include "./connetion.php";
        // we can make more see only need rows by replacing
        // * with--
        // data.id , category.category_id ... so on
        // showing all post to admin user
        if ($_SESSION["user_Role"] == "1") {
            $Tbquery = "SELECT * FROM post
        LEFT JOIN category ON post.catry = category.category_id
        LEFT JOIN data ON post.author = data.id";
            $Result1 = mysqli_query($conn, $Tbquery);
        } elseif ($_SESSION["user_Role"] == "0") {
            $Tbquery = "SELECT * FROM post
            LEFT JOIN category ON post.catry = category.category_id
            LEFT JOIN data ON post.author = data.id
            WHERE post.author = {$_SESSION["user_id"]}";
            $Result1 = mysqli_query($conn, $Tbquery);
        }
        // -- WHERE post.post_id = {$_SESSION["user_id"]}";

        if (mysqli_num_rows($Result1) > 0) {

        ?>
            <table>
                <tr>
                <th>Sr No.</th>
                    <th>Post ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>EDIT</th>
                    <TH>DELETE</TH>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($Result1)) {
                ?>
                    <tr>
<td class="count"></td>
                        <td><?php echo $row['post_id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['c_name']; ?></td>
                        <td><?php echo $row['post_date']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td> <a href="./update-post.php?id=<?php echo $row['post_id'] ?>" target="_blank" class="update">UPDATE</a>
                        </td>
                        <td> <a href="./delet-POST.php?id=<?php echo $row['post_id'] ?>caty=<?php echo $row['catry'] ?>"  class="delete">DELETE</a>
                        </td>

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