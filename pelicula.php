<?php
$title = "Dashboard - ";
include "head.php";
include "sidebar.php";

$idPelicula = $_GET['idPelicula'];

mysqli_next_result($con);
$query2 = "SELECT P.`idPelicula`, P.`nombrePelicula`, P.`Sinopsis`, DATE_FORMAT(P.`fechaEstreno`, '%M %d %Y') AS fechaEstreno, P.`director`, FORMAT(AVG(C.`Calificación`),1) AS califUsuarios, P.`califCriticos`, P.`imagenPelicula`, GROUP_CONCAT(G.`genero` SEPARATOR ', ') AS genero FROM `pelicula` AS P JOIN `pelicula-genero` AS GP ON GP.`idPelicula` = P.`idPelicula` JOIN `genero` AS G ON GP.`idGenero` = G.`idGenero` JOIN `criticausuario` AS C ON C.`idPelicula` = P.`idPelicula` WHERE P.`idPelicula` =" . $idPelicula;
$result2 = $con->query($query2);

$query3 = "SELECT C.`comentarioCritica`, C.`fechaCritica`, C.`Calificación`, U.`name`, U.`profile_pic` AS foto FROM `criticausuario` AS C JOIN `user` AS U ON C.`idUsuario` = U.`id` WHERE `idPelicula` = " . $idPelicula;
$resultcrit = $con->query($query3);

?>
<div class="right_col" role="main">
    <!-- page content -->
    <div class="">
        <div class="page-title">
            <!-- content -->
            <br><br>
            <div class="row">
                <div class="col-md-3">
                    <div class="center">
                        <?php
                        while ($row = mysqli_fetch_assoc($result2)) {
                            echo '<img class="thumb-image" style="width: 100%; display: block;" src="data:image/jpeg;base64,' . base64_encode($row['imagenPelicula']) . '"/>';
                            ?>
                    </div>

                </div>
                <div class="col-md-9 col-xs-12 col-sm-12 cont">
                    <?php include "lib/alerts.php";
                        profile(); //llamada a la funcion de alertas
                        ?>
                    <div class="x_panel">
                        <div class="x_title">
                            <h1><?php echo $row['nombrePelicula']  ?></h1>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <h4 class="control-label col-md-3 col-sm-3 col-xs-12 title" for="first-name">Sinopsis</h4>
                                <br>
                                <hr>
                                <div class="sinopsis-info">
                                    <p>
                                        <?php echo $row['Sinopsis'] ?>
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <h3 class="control-label col-md-3 col-sm-3 col-xs-12">Calificación</h3>
                                <br>
                                <hr>
                                <div class="Critic-review text-center">
                                    <h1>
                                        <i class="fas fa-star"></i> <?php echo $row['califUsuarios'] ?> / 5
                                    </h1>
                                </div>
                                <div class="Critic-review text-center">
                                    <h1>
                                        <i class="fas fa-thumbs-up"></i> <?php echo $row['califCriticos'] ?> / 10
                                    </h1>
                                </div>
                            </div>
                            <div class="col-md-12 Movie-Info">
                                <hr>
                                <h4 class="title"> Información: </h4>
                                <br>
                                <table class="Movie-Data">
                                    <tr>
                                        <td>
                                            <h5"> Dirigida por: </h5>
                                        </td>
                                        <td>
                                            <h5 class="Data"> <?php echo $row['director'] ?> </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Fecha de estreno:</h5>
                                        </td>
                                        <td>
                                            <h5 class="Data"> <?php echo $row['fechaEstreno'] ?> </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5> Géneros: </h5>
                                        </td>
                                        <td>
                                            <h5 class="Data"> <?php echo $row['genero'] ?> </h5>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br><br><br>
                        </div>

                    <?php } ?>

                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 row opiniones ">
                    <h1 class="text-center">Opiniones de nuestros usuarios</h1>
                    <hr>
                    <hr>
                    <?php
                    
                    while ($row = mysqli_fetch_assoc($resultcrit)) {
                        ?>
                        <div class="col-md-6 col-sm-6 col-xs-6 critica">
                            <table>
                                <th class="text-center crit-info">
                                    <?php echo $row['name'] ?>
                                    <img src="images/profiles/<?php echo $row['foto']; ?>" alt="<?php echo $row['name']; ?>" class="img-circle profile_img">

                                </th>
                                <tr>
                                    <td class="crit-text">
                                        <?php echo $row['comentarioCritica'] ?>
                                    </td>
                                    <td class="crit-cal">
                                    
                                        <h2><?php echo $row['Calificación'] ?> / 5 <i class="fas fa-star"></i></h2>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php } ?>

                    <?php  if ($row = mysqli_fetch_assoc($resultcrit) == NULL) 
                    { 
                    echo "<h3 class='text-center'>Esas son todas las críticas, si no lo haz hecho, deja la tuya!</h3>";
                    }

                    ?>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 row opiniones ">
                    <h1 class="text-center">Di lo que piensas sobre la película!</h1><br>
                    <div class="col-md-2 col-xs-2 col-sm-2" > </div>
                    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
                        <form class="form-horizontal form-label-left input_mask" action="action/post_review.php" method="post" id="add" name="add">
                            <div id="result"></div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Calificación: <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select class="form-control" name="calificacion">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tu opinión: <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="critica" class="date-picker form-control col-md-7 col-xs-12" required></textarea>
                                    <?php echo "<input type='hidden' name='idPelicula' value='".$idPelicula."'>" ?>
                                    <?php echo "<input type='hidden' name='idPelicula' value='".$idPelicula."'>" ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button id="save_data" type="submit" class="btn btn-info">Publicar crítica</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /page content -->
<?php 
    include "footer.php"
?>

   
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