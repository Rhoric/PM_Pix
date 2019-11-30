<?php
session_start();
/*Inicia validacion del lado del servidor*/
if (empty($_POST['name'])) {
	$errors[] = "Nombre vacío";
} else if (empty($_POST['lastname'])) {
	$errors[] = "Apellidos vacío";
} else if (empty($_POST['email'])) {
	$errors[] = "Correo Vacio vacío";
} else if (empty($_POST['password'])) {
	$errors[] = "Contraseña vacío";
} else if (
	!empty($_POST['name']) &&
	!empty($_POST['lastname']) &&
	!empty($_POST['password'])
) {

	include "../config/config.php"; //Contiene funcion que conecta a la base de datos

	// escaping, additionally removing everything that could be (html/javascript-) code
	$name = mysqli_real_escape_string($con, (strip_tags($_POST["name"], ENT_QUOTES)));
	$lastname = mysqli_real_escape_string($con, (strip_tags($_POST["lastname"], ENT_QUOTES)));
	$email = $_POST["email"];
	$password = mysqli_real_escape_string($con, (strip_tags(sha1(md5($_POST["password"])), ENT_QUOTES)));
	$end_name = $name . " " . $lastname;
	$created_at = date("Y-m-d H:i:s");
	$user_id = $_SESSION['user_id'];
	$profile_pic = "default.png";

	$is_admin = 0;
	if (isset($_POST["is_admin"])) {
		$is_admin = 1;
	}

	$sql = "INSERT INTO user ( name, password, email, profile_pic, created_at) VALUES ('$end_name','$password','$email','$profile_pic','$created_at')";
	$query_new_insert = mysqli_query($con, $sql);
	if ($query_new_insert) {
		$query = mysqli_query($con,"SELECT * FROM user WHERE email =\"$email\" OR username=\"$email\" AND password = \"$password\";");
		if ($row = mysqli_fetch_array($query)) {
	
				$_SESSION['user_id'] = $row['id'];
				header("location: ../index.php");
				$subject = 'Bienvenido a PixCrits!';
				$message = 'Hola! Gracias por registrarte a PixCrits, donde nos importa tu confianza!';
				mail($email, $subject, $message);
		}
	} else {
		$errors[] = "Lo siento algo ha salido mal intenta nuevamente." . mysqli_error($con);
	}
} else {
	$errors[] = "Error desconocido.";
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
		<strong>¡Bien hecho!</strong>
		<?php
			foreach ($messages as $message) {
				echo $message;
			}
			?>
	</div>
<?php
}

?>