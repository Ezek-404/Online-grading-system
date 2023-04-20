<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CAPSTONE</title>

    <!-- Custom fonts for this template-->
    <link href="../startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.gstatic.com/s/nunito/v24/XRXV3I6Li01BKofIOuaBXso.woff2"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">    

</head>
<style>
    .href:hover{
        background-color: #151B54;
        transition: all 0.3s;
    }
    .active_side{
        background-color: #151B54;
    }
    .content{
    background-image: url("../picture/p.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: 100% 100% ;
    background-size: 1320px 690px;
    }
    .page{
        background: linear-gradient(100deg, #e0eafc, #cfdef3);
    }
</style>
<?php
    session_start();
        if($_SESSION['role'] == 'teacher'){
        }
        else{
            header("location: ../404.php");
        }
    $user = $_SESSION['username'];
    $user_id = $_SESSION['teacher_id'];
 ?>
<body id="page-top">
    <div id="wrapper">
