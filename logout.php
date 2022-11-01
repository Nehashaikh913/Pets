<?php
    // include('include/config.php');
    session_start(); //to ensure you are using same session
    date_default_timezone_set('Asia/Kolkata');
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_phone']);
    unset($_SESSION['userid']);
    session_destroy(); //destroy the session
    echo "<script>window.location='http://localhost/Pets/'</script>";
    exit();
?>