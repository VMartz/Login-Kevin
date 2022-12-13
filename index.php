<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<title>Login</title>
<head>
   <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
     <link href="css/estilos.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
    
<body>
    <div class="login">
	<h1>TESI</h1>
    <form method="post">
    	<input  type="text" name="Usuario" placeholder="Usuario" required="required"  />
        <input  type="password" name="Password" placeholder="Password" required="required" />
        <button type="submit" name="@" class="btn btn-primary btn-block btn-large">Ingresar</button>
    </form>
 
   <?php
  if (isset($_POST['@'])) {

    include_once("conexion/BD.php");

    $usu = $_POST['Usuario'];
    $pass = $_POST['Password'];

    $usus = "select Usuario,Password from usuarios where Usuario='$usu' AND Password='$pass'";
    $resultado = mysqli_query($con, $usus);
    $filas = mysqli_num_rows($resultado);


if ($filas > 0) {



      $_SESSION['Usuario'] = $usu;

      echo "<script>swal({
  title: 'Bienvenido!!! $_SESSION[Usuario]',


  icon: 'success',

}).then(function() {
                window.location = 'contenido';
            });
</script>";
    }  else {
      echo "<script>swal({
  title: 'Error!!!',
  icon: 'error',
}).then(function() {
                window.location = 'index';
            });
</script>";
    }
    mysqli_close($con);
  }
  ?>      
        
        
        
</div>
</body>    
    
    
</html>