<?php
    // include('include/config.php');
    date_default_timezone_set('Asia/Kolkata');
    session_start(); //to ensure you are using same session
    session_destroy(); //destroy the session
    echo "<script>window.location='http://localhost/Pets/'</script>";
    exit();
?>