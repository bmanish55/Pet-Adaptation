<?php
//session
session_start();

//dbms connection
define('SITEURL','http://localhost/Pet-Adaptation-Vet-Community-main/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','845905');
define('DB_NAME','pet_adoption');
    $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) ;
    $db_select= mysqli_select_db($conn,'pet_adoption');

    ?>