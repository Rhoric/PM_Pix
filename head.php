<?php
    session_start();
    include "config/config.php";
    if (!isset($_SESSION['user_id'])&& $_SESSION['user_id']==null) {
        header("location: indexN.php");
    }
?>
<?php 
    $id=$_SESSION['user_id'];
    $query=mysqli_query($con,"SELECT * from user where id=$id");
    while ($row=mysqli_fetch_array($query)) {
        $username = $row['username'];
        $name = $row['name'];
        $email = $row['email'];
        $profile_pic = $row['profile_pic'];
        $created_at = $row['created_at'];
  
    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pix Crits</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0fa5aadbc3.js" crossorigin="anonymous"></script>
        <!-- jQuery custom content scroller -->
        <link href="css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

        <!-- bootstrap-daterangepicker -->
        <link href="css/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="css/custom.min.css" rel="stylesheet">

        <!-- MICSS button[type="file"] -->
        <link rel="stylesheet" href="css/micss.css">

        <!-- Custom Css File -->
        <link rel="stylesheet" href="css/custom.css">


                <!-- jQuery -->
                <script src="js/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="css/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="js/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="css/nprogress/nprogress.js"></script> 
        

        <!-- Custom Theme Scripts -->
        <script src="js/custom.min.js"></script>



            <!-- DateJS -->
        <!-- <script src="js/DateJS/build/date.js"></script> -->
        <!-- bootstrap-daterangepicker -->
        <script src="js/moment/min/moment.min.js"></script>
        <script src="css/bootstrap-daterangepicker/daterangepicker.js"></script>

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                          <a href="index.php" class="site_title"><i class="fa fa-ticket"></i> <span>Pix Crits</span></a>
                        </div>
                        <div class="clearfix"></div>

                            <!-- menu profile quick info -->
                                <div class="profile clearfix">
                                    <a href="usuario.php">
                                        <div class="profile_pic">
                                            <img src="images/profiles/<?php echo $profile_pic;?>" alt="<?php echo $name;?>" class="img-circle profile_img">
                                            
                                        </div>
                                        <div class="profile_info">
                                            <span>Bienvenido,</span>
                                            <h2><?php echo $name;?></h2>
                                        </div>
                                    </a>
                                </div>
                            <!-- /menu profile quick info -->

                        <br />