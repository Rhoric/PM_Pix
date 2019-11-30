<?php
session_start();

include "../config/config.php"; //Contiene funcion que conecta a la base de datos

// escaping, additionally removing everything that could be (html/javascript-) code
$critica = $_POST["critica"];
$calificacion = $_POST["calificacion"];
$user_id = $_SESSION['user_id'];
$idPelicula = $_POST['idPelicula'];

$califPelicula=mysqli_query($con, "SELECT califUsuarios FROM `pelicula` WHERE idPelicula='$idPelicula'");

$sql = "INSERT INTO criticausuario ( idUsuario, Calificación, comentarioCritica, idPelicula) VALUES ('$user_id','$calificacion','$critica','$idPelicula')";
$query_new_insert = mysqli_query($con, $sql);

if ($query_new_insert) {
	header("location: ../pelicula.php?idPelicula=".$idPelicula);
} else {
	$errors[] = "Lo siento algo ha salido mal intenta nuevamente.". $idPelicula. $user_id . mysqli_error($con);
}


if (isset($errors)) {

	?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Error!</strong>
		<?php
			foreach ($errors as $error) {
				echo $error;
			}
			?>
	</div>
<?php
}
if (isset($messages)) {

	?>
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Bien hecho!</strong>
		<?php
			foreach ($messages as $message) {
				echo $message;
			}
			?>
	</div>
<?php
}

?>