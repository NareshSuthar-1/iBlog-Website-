<!DOCTYPE html>
<html lang="en">
<?php
include "./connetion.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./CSS.css">
    <link rel="stylesheet" href="./Post-styel.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>

<body>
  <?php
include "./header.php";
  ?>
    <div class="container">
     
        <!-- for uplodin files we have aaded this -------- enctype="multipart/form-data -->
        <form action="./Addpost.php" method="POST" enctype="multipart/form-data">
            <label for="Title">Title</label>
            <input type="text" id="Title" name="Title">
            <label for="Description">Description</label>
            <!-- <input type="text" id="Description" name="Description"> -->
            <textarea name="Description" id="Description" cols="30" rows="3"></textarea>
            
            <label for="Category">Category</label>
            <select name="Category" id="Category">
                <?php
                // Showing Option----------------
                $C_query = "SELECT * FROM category c_name";
                $result = mysqli_query($conn, $C_query);
                if (mysqli_num_rows($result) > 0) {

                    while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                <?php
                        echo  '<option value="' . $rows['category_id'] . '">' . $rows['c_name'] . '</option>';
                    }
                }
                ?>
            </select>
            <label for="img-post">Post Image</label>
            <input type="file" name="img-post">
            <button type="submit" class="btn" name="Save-post"> Add Post</button>
        </form>
    </div>
</body>

</html>