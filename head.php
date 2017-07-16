<?php
    session_start();
    include "config/config.php";

    if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
        header("location: index.php");
    }
    $my_user_id=$_SESSION['user_id'];
    $query=mysqli_query($con,"SELECT * from user where id=$my_user_id");
    while ($row=mysqli_fetch_array($query)) {
        $fullname = $row['fullname'];
        $email = $row['email'];
        $profile_pic = $row['image'];
        $created_at = $row['created_at'];

    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BelBox Beta | Compartir Archivos Gratis</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


      <!-- Bootstrap 3.3.6 -->
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    
        <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- micss -->
    <link rel="stylesheet" href="css/micss.css">
    <style>
            .skin-black .main-header .logo {
                background-color: #dd4b39;
                color: #fff;
            }
            .skin-black .main-header .logo:hover {
                background-color: #dd4b39;
                color: #fff;
            }
            .skin-black .main-header .navbar {
                background-color: #dd4b39;
                color: #fff;
            }
            .skin-black .main-header li.user-header{
                background-color: #dd4b39;
                color: #fff;
            }
            .skin-black .main-header .navbar .sidebar-toggle:hover{
                background-color: #dd4b39;
                color: #fff;
            }

            .skin-black .main-header .navbar>.sidebar-toggle {
                color: #fff;
                border-right: 1px solid #dd4b39;
            }



            .skin-black .main-header .navbar .nav>li>a:hover, .skin-black .main-header .navbar .nav>li>a:active, .skin-black .main-header .navbar .nav>li>a:focus, .skin-black .main-header .navbar .nav .open>a, .skin-black .main-header .navbar .nav .open>a:hover, .skin-black .main-header .navbar .nav .open>a:focus, .skin-black .main-header .navbar .nav>.active>a {
                background: #dd4b39;
                color: #fff;
            }

            .skin-black .main-header .navbar .nav>li>a:hover, .skin-black .main-header .navbar .nav>li>a:active, .skin-black .main-header .navbar .nav>li>a:focus, .skin-black .main-header .navbar .nav .open>a, .skin-black .main-header .navbar .nav .open>a:hover, .skin-black .main-header .navbar .nav .open>a:focus, .skin-black .main-header .navbar .nav>.active>a:hover {
                background: #d24837;
                color: #fff;
            }

            .skin-black .main-header .navbar .nav>li>a, .skin-black .main-header .navbar .nav>li>a:active, .skin-black .main-header .navbar .nav>li>a:focus, .skin-black .main-header .navbar .nav .open>a, .skin-black .main-header .navbar .nav .open>a:hover, .skin-black .main-header .navbar .nav .open>a:focus, .skin-black .main-header .navbar .nav>.active>a {
                color: #fff;
            }

            .skin-black .main-header .navbar .navbar-custom-menu .navbar-nav>li>a, .skin-black .main-header .navbar .navbar-right>li>a {
                border-left: 1px solid #dd4b39;
                border-right-width: 0;
            }
                
            .skin-black .main-header>.logo {
                background-color: #d24837;
                color: #fff;
                border-bottom: 0 solid transparent;
                border-right: 1px solid #dd4b39;
            }
            .skin-black .main-header>.logo:hover {
                background-color: #d24837;
            }
    </style>

</head>