
<?php

include('../config/constants.php');
    session_destroy();

    //redirect time
    header("location:".SITEURL.'admin/login.php');

?>

