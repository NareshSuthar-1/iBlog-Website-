<?php
include "./connetion.php";
// FOR IMGAE VALIDATIPON PHP CODE------(FILE UPLODING CODES)---
if (isset($_FILES['img-post'])) {
    $error = array();
    $file_name = $_FILES['img-post']['name'];
    $file_size = $_FILES['img-post']['size'];
    $file_temp = $_FILES['img-post']['tmp_name'];
    $file_type = $_FILES['img-post']['type'];
    $file_ext = end(explode(".",$file_name));
    // $file_ext = strtolower(end(explode(".",$file_name)));
    $extenions = array("jpeg","png","jpg");

    if (is_array($extenions) === false) {
        $error[]="This Extension File is Not allowed";
    }
    if ($file_size>2097152) {
        $error[]="File Size Must 2-MB or Lower";
    }
    if (empty($error)==true) {
        move_uploaded_file($file_temp,"uplodeIMG/".$file_name);
        
    }
    else{
        print_r($error);
        die();
    }

}
// session to save id of user which ulpoded post
session_start();

    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $Category = $_POST['Category'];
    $img_post = "hh";
    // $author = $_POST['Author'];
    $author = $_SESSION["user_id"];

    $post_date = date("d M,Y");
// session
// $author_in_session = $_SESSION['autor']
// $author = $author_in_session
// neww  -- getting user-id from session
// $author = $_SESSION['Author'];


 $Query = "INSERT INTO post(title, descriptions, catry, post_date, author, post_img) VALUES ('{$Title}','{$Description}','{$Category}','{$post_date}','{$author}','{$file_name}');";
 $Query .= "UPDATE category SET post= post +1 WHERE category_id = '{$Category}'";
// WHEN USING MULTIPLE QUERY IN ONE PAGE OR CODE WE do nt Use-----  Mysqli_query()
//  then we USE  ----  in multi_query add ";" to first query at the end 
// 0---(then it will run both query else it will run 2nd query due to overwrit)
// $result = mysqli_multi_query($conn,$Query) or die("failed");
if( mysqli_multi_query($conn,$Query)){
    header("location: $localhoat/Websit-post.php");
}else{
    
    header("location: $localhoat/addPost-form.php");

}
?>