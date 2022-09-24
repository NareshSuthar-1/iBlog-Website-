<?php
include "./connetion.php";
$post_id = $_GET['id'];
// FOR IMGAE VALIDATIPON PHP CODE------(FILE UPLODING CODES)---
if (empty($_FILES['new-img']['name'])) {
    // if user does not selected new img then it uploded same (old image)
    $file_name = $_POST['old_IMG'];
} else {
    $error = array();
    $file_name = $_FILES['new-img']['name'];
    $file_size = $_FILES['new-img']['size'];
    $file_temp = $_FILES['new-img']['tmp_name'];
    $file_type = $_FILES['new-img']['type'];
    // $file_ext = end(explode(".", $file_name));
    $file_ext = strtolower(end(explode(".",$file_name)));
    $extenions = array("jpeg", "png", "jpg");

    if (is_array($extenions) === false) {
        $error[] = "This Extension File is Not allowed";
    }
    if ($file_size > 2097152) {
        $error[] = "File Size Must 2-MB or Lower";
    }
    if (empty($error) == true) {
        move_uploaded_file($file_temp, "uplodeIMG/". $file_name);
    } else {
        print_r($error);
        die();
    }
}
// update POST PHP CODE  START  --------------------------------------------------------------------

$Updated_title = $_POST['U_Title'];
$Updated_author = $_POST['U_Author'];
$Updated_Description = $_POST['U_Description'];
$Updated_Category = $_POST['U_Category'];
$Updated_img_pos = $file_name;
 $U_Query = "UPDATE post SET title='{$Updated_title}',descriptions='{$Updated_Description}',catry='{$Updated_Category}',author='{$Updated_author}',post_img='{$Updated_img_pos}' WHERE post_id='{$post_id}'";
$result = mysqli_query($conn,$U_Query);


if($result){
    header("location: http://localhost/iblog/blog-website/Websit-post.php");
}
else{
    echo "Query Failed ." ;
}