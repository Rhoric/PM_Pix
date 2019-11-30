<?php 
    $title ="Pixcrits - "; 
    include "head.php";
    include "sidebar.php";

?>
    <div class="right_col" role="main"> <!-- page content -->
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
                            <?php echo '<img class="Centered-image" src="data:image/jpeg;base64,'.base64_encode( $row['imagenPelicula'] ).'"/>'; ?>
                                
                            </div>
                            <span class="TituloPelicula">
                                <h4 class = "text-center"><?php echo $row['nombrePelicula']; ?></h4>
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
                            <?php echo '<img class="Centered-image" src="data:image/jpeg;base64,'.base64_encode( $row['imagenPelicula'] ).'"/>'; ?>
                                
                            </div>
                            <span class="TituloPelicula">
                                <h4 class = "text-center"><?php echo $row['nombrePelicula']; ?></h4>
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
    $(function(){
        $("input[name='file']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "action/upload-profile.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#respuesta").html(datos);
                }
            });
        });
    });
</script>