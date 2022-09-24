<!DOCTYPE html>
<html lang="en">
<?php
include "./connetion.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./CSS.css">
    <link rel="stylesheet" href="./post-styel.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>

<body>
    <?php
    include "./header.php";
    $post_id = $_GET['id'];
    $Tbquery = "SELECT * FROM post
LEFT JOIN category ON post.catry = category.category_id
LEFT JOIN data ON post.author = data.id
WHERE post.post_id = $post_id";
    $Result = mysqli_query($conn, $Tbquery);
    ?>
    <div class="container">
        <?php if (mysqli_num_rows($Result) > 0) {
            while ($row = mysqli_fetch_assoc($Result)) {
        ?>
                <!-- for uplodin files we have aaded this -------- enctype="multipart/form-data -->
                <form action="./Save-UPDATE-POST.php?id=<?php echo $post_id ?>" method="POST" enctype="multipart/form-data">

                    <label for="Title">Title</label>
                    <input type="text" id="Title" name="U_Title" value="<?php echo $row['title']; ?>">
                    <label for="Author">Author</label>
                    <input type="text" id="Author" name="U_Author" value="<?php echo $row['author']; ?>">
                    <label for="Description">Description</label>
                    <input type="text" id="Description" name="U_Description" value="<?php echo $row['descriptions']; ?>">
                    <label for="Category">Category</label>
                    <?php
                    // Showing Option----------------
                    $C_query = "SELECT c_name , category_id FROM category";
                    $result1 = mysqli_query($conn, $C_query);
                    if (mysqli_num_rows($result1) > 0) {
                    ?>
                        <select name="U_Category" id="Category">
                            <?php

                            while ($rows1 = mysqli_fetch_assoc($result1)) {
                                echo  $rows1['category_id'];
                                // pre selected category which is prteviously selected
                                if ($rows1['category_id'] == $row['catry']) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                            ?>
                            <?php
                                echo  '<option ' . $selected . ' value="' . $rows1['category_id'] . '">' . $rows1['c_name'] . '</option>';
                            }

                            ?>
                        </select>
                        <label for="img-post">Post Image</label>
                        <input type="file" name="new-img" value="<?php echo $row['post_img'] ?>">
                        <img src="../uplodeIMG/<?php echo $row['post_img'] ?>" alt="" height="100px" style="margin: 10px;">
                        <input type="hidden" name="old_IMG" value="<?php echo $row['post_img'] ?>">
                    <?php } 
                    
                    ?>
                    <button type="submit" class="btn" name="Update-post"> Add Post</button>
                </form>
        <?php
            }
        } else {
            echo "Result Not Found";
        }
        ?>
    </div>
</body>

</html>