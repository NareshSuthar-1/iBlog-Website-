<?php
include "./connetion.php";
$post_id = $_GET['id'];
$categryID= $_GET['caty'];

$sql = "DELETE FROM post WHERE post_id  = '{$post_id}';";
$sql .= "UPDATE category SET post=post-1 WHERE category_id = {$categryID}";
if(mysqli_multi_query($conn,$sql)){
    header("location: $localhoat/Websit-post.php");
}
else {
    echo "POST not Delted .";
}
