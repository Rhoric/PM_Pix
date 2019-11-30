<!DOCTYPE html>
<html lang="en">

<?php include "config/config.php"; ?>

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
    <link href="css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet" />

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
                        <a href="#" class="site_title"><i class="fa fa-ticket"></i> <span>Pix Crits</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <br>

                    <!-- Side Bar -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <!-- sidebar menu -->
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <?php
                                mysqli_next_result($con);
                                $query1 = "SELECT `idGenero`, `Genero` FROM `genero` WHERE 1";
                                $result1 = $con->query($query1);
                                while ($row = mysqli_fetch_assoc($result1)) {
                                    ?>
                                    <li class="<?php if (isset($active8)) {
                                                        echo $active8;
                                                    } ?>">
                                        <a href="genero.php?idGenero=<?php echo $row['idGenero']; ?>"><?php echo $row['Genero']; ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div><!-- /sidebar menu -->
                </div>
            </div>

            <div class="top_nav">
                <!-- top navigation -->
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">

                            <li class="">
                                <a href="register.php" class="user-profile" aria-expanded="false">
                                    <i class="fas fa-user"></i> Registrarse
                                </a>
                            </li>
                            <li class="">
                                <a href="login.php" class="user-profile" aria-expanded="false">
                                    <i class="fas fa-sign-in-alt"></i> Ingresar
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="right_col" role="main">
                <!-- page content -->
                <div class="">
                    <div class="page-title">
                        <div class="row top_tiles">

                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">

                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">

                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">

                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">

                            </div>
                        </div>
                        <!-- content -->
                        <br><br>
                        <h3>Los mejores estrenos</h3>
                        <br>
                        <div class="row">
                            <?php
                            mysqli_next_result($con);
                            $query2 = "SELECT `idPelicula`,`nombrePelicula`,`imagenPelicula` FROM `pelicula` WHERE 1 ORDER BY fechaEstreno DESC LIMIT 4";
                            $result2 = $con->query($query2);
                            while ($row = mysqli_fetch_assoc($result2)) {
                                ?>
                                <div class="col-md-3 movie-Card">
                                    <a href="pelicula.php?idPelicula=<?php echo $row['idPelicula']; ?>">
                                        <div class="image view-first">
                                            <?php echo '<img class="Centered-image" src="data:image/jpeg;base64,' . base64_encode($row['imagenPelicula']) . '"/>'; ?>

                                        </div>
                                        <span class="TituloPelicula">
                                            <h4 class="text-center"><?php echo $row['nombrePelicula']; ?></h4>
                                        </span>
                                        <div id="respuesta"></div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>

                        <br>
                        <h3>Las películas mejor aclamadas por los críticos!</h3>
                        <br>

                        <div class="row">
                            <?php
                            mysqli_next_result($con);
                            $query2 = "SELECT `idPelicula`,`nombrePelicula`,`imagenPelicula` FROM `pelicula` WHERE 1 ORDER BY califCriticos DESC LIMIT 4";
                            $result2 = $con->query($query2);
                            while ($row = mysqli_fetch_assoc($result2)) {
                                ?>
                                <div class="col-md-3 movie-Card">
                                    <a href="pelicula.php?idPelicula=<?php echo $row['idPelicula']; ?>">
                                        <div class="image view-first">
                                            <?php echo '<img class="Centered-image" src="data:image/jpeg;base64,' . base64_encode($row['imagenPelicula']) . '"/>'; ?>

                                        </div>
                                        <span class="TituloPelicula">
                                            <h4 class="text-center"><?php echo $row['nombrePelicula']; ?></h4>
                                        </span>
                                        <div id="respuesta"></div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div><!-- /page content -->

            <?php include "footer.php" ?>
            <script>
                $(function() {
                    $("input[name='file']").on("change", function() {
                        var formData = new FormData($("#formulario")[0]);
                        var ruta = "action/upload-profile.php";
                        $.ajax({
                            url: ruta,
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(datos) {
                                $("#respuesta").html(datos);
                            }
                        });
                    });
                });
            </script>