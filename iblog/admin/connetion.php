<?php

// adress 
$localhoat ="http://localhost/iblog/admin/";

define('DB_server','localhost');
define('DB_username','root');
define('DB_password','');
define('DB_name','IBLOG');
// Making conntectio
$conn = mysqli_connect(DB_server,DB_username,DB_password,DB_name);
// Checking connectred or not
if($conn==false){
    die('Error : Not Connected');
}
?>