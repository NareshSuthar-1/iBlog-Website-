<?php

include "./connetion.php";

$user_id = $_GET['id'];
$DleteQ = "DELETE FROM data WHERE id = {$user_id}";
$reault = mysqli_query($conn,$DleteQ);
if($reault){
    header("location : http://localhost/iblog/index.php");
} 
else{
    echo "cannot Delete";

    header("location : http://localhost/iblog/index.php");

}

?>