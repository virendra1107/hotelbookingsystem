<?php
    require('admin/include/db_config.php');
    require('admin/include/essentials.php');

    date_default_timezone_set("Asia/kolkata");

    session_start();

    if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
        redirect('index.php');
    }

?>