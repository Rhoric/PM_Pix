<?php
session_start();

include "config/config.php";

if (isset($_SESSION['user_id']) && $_SESSION !== null) {
    header("location: success.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registro de usuario</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="css/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
    <!-- Validate register data -->
    <script src="action\Validate.js"></script>

</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <?php
                $invalid = sha1(md5("contrasena y email invalido"));
                if (isset($_GET['invalid']) && $_GET['invalid'] == $invalid) {
                    echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                <strong>Error!</strong> Contraseña o correo Electrónico invalido
                                </div>";
                }
                ?>
                <section class="login_content">
                    <form action="action\add_user.php" method="post" class="form-horizontal form-label-left input_mask" id="Registro" name="Registro">
                    <h1>Registrate!</h1>
                        <div id="result_user"></div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <input id="Nombre" name="name" required type="text" class="form-control" placeholder="Nombre">
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <input id="Apellidos" name="lastname" type="text" class="form-control" placeholder="Apellidos" required>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <input id="email" name="email" type="text" class="form-control has-feedback-left" placeholder="Correo Electronico" required>
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>
                 
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input id="Contra" type="password" id="password" name="password" required placeholder="Contraseña" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input id="Contra2" type="password" id="password" name="password" required placeholder="Confirmar contraseña" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <button id="register_data" type="submit" class="btn btn-info" onclick="return Validar()">Guardar</button>
                                <button id="erase_data" type="reset" class="btn btn-danger">Restaurar</button>
                            </div>
                        </div>
                    </form>


                    <div class="clearfix"></div>
                    <div class="separator">
                        <div class="clearfix"></div>
                        <br />
                    </div>

                </section>
            </div>
        </div>
    </div>
</body>