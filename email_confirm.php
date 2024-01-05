<?php

require('../admin/include/db_config.php');
require('../admin/include/essentials.php');

if(isset($_GET['email_confirmation']))
{
    $data = filteration($_GET);

    $query = select("SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? LIMIT 1",[$data['email'],$data['token']],'ss');

    if(mysqli_num_rows($query)==1)
    {
        $fetch = mysqli_fetch_array($query);

        if($fetch['is_verified']==1)
        {
            echo"<script>alert('Email already verified!')</script>";
        }
        else
        {
            $update = update("UPDATE `user_cred` SET `is_verified`=? WHERE `id`=?",[1,$fetch['id']],'ii');
            if($update){
                echo"<script>alert('Email verification successful!')</script>";
            }
            else{
                echo"<script>alert('Email verification failed! Server Down!')</script>";
            }
        }
        redirect('index.php');
    }
    else{
        echo"<script>alert('Invalid Link!')</script>";
        redirect('index.php');
    }
}

?>