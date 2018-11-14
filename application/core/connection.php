<?php 
    require_once('constants.php');
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());
    mysqli_select_db($connection, DB_NAME) or die('Cannot select database '.DB_NAME);
