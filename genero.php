<?php
$title = "Pixcrits - ";
include "head.php";
include "sidebar.php";

$idGenero = $_GET['idGenero'];
mysqli_next_result($con);
$query2 = "SELECT Genero FROM genero WHERE idGenero=" . $idGenero;
$result2 = $con->query($query2);
?>
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
            <?php
            while ($row = mysqli_fetch_assoc($result2)) { ?>
                <h3>Las mejores peliculas de <?php echo $row['Genero'];?></h3>
            <?php } ?>
            <br>
            <div class="row">
                <?php
                mysqli_next_result($con);
                $query2 = "SELECT P.`idPelicula`, P.`nombrePelicula`, P.`imagenPelicula` FROM `pelicula` AS P JOIN `pelicula-genero` AS PG ON PG.`idPelicula` = P.`idPelicula` WHERE PG.idGenero = ".$idGenero;
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