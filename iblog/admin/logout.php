<?php
include "./connetion.php";
session_start();
session_unset();
session_destroy();
header("location: $localhoat/index.php");


?>