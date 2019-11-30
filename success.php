<?php 
    $title ="Success - "; 

?>
<?php
    session_start();
    include "config/config.php";
    if (!isset($_SESSION['user_id'])&& $_SESSION['user_id']==null) {
        header("location: index.php");
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
   <body>
       <h1>SUCCESS!!</h1>
       <h2>Bienvenido, <?php echo $name;?></h2>
       <hr>
       <br>
       <h3><a href="action/logout.php">Cerrar Sesión</a></h3>
   </body>