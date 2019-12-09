<?php
    require_once '../config.php';
    if(isset($_SESSION['userMemeber']) && isset($_SESSION['password']) && isset($_SESSION['job_type']))
    {
        if($_SESSION['job_type'] == 1){
             
         }else{
             header("location: login.php?message=don't have permession");
             exit();
         }
    }else {
            header("location: login.php");
            exit();
    }
