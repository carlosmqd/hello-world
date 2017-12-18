<?php
  include('conexion.php');
?>

<?php

if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_POST['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_POST['accesscheck'];
  
}

if (isset($_POST['usuario'])) {
  $tipo=$_POST['tipoDeUsuario'];
  $User=$_POST['usuario'];
  $_SESSION['User'] = $_POST['usuario'];
  $con = mysqli_connect("127.0.0.1","root","", "capacitacion_en_linea");
    if (!$con) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
   // echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
    //echo "Información del host: " . mysqli_get_host_info($con) . PHP_EOL;
   // mysqli_close($con);
   

//////////////////////DESCENCRIPTANO LA CONTRASENIA DE ENTRADA A LA B.D :)//////////////////////////////////////////////////////////////////////////
  $password=$_POST['password'];
 // $key='pruebita';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
  //$password = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $password, MCRYPT_MODE_CBC, md5(md5($key))));
//////////////////TERMINADO DE DESCENCRIPTAR LA CONTRASENIA EN LA B.D/////////////////////////////////////////////////////////////////////

  $miselect= " SELECT * FROM usuarios WHERE usuario='$User' and password= '$password' and idtipousuario= $tipo";
  $resultado = mysqli_query($con,$miselect)or die(mysqli_error());
  $verifica=0;
  while($row=mysqli_fetch_array($resultado)) {
      $verifica=1;
	  $_SESSION['iduser'] = $row[no_empleado];
	  $_SESSION['nombreu'] = $row['nombre'];
	  $_SESSION['apellidou'] = $row['apellido'];
	  $_SESSION['areau'] = $row['idarea'];
  }
  if($verifica==0){ //Si no son correctos los datos
     $_SESSION['intento'] = 1;
  }else{
	 
    $_SESSION['usuario'] = $User;
    $_SESSION['tipo'] = $tipo;
    $_SESSION['intento'] = 0;
    switch($tipo) {
      case '1': #Ingreso de un empleado
        header('Location: Empleado/index.php');
      break;
      case '2': 
		#Ingreso de Administrador
        header('Location: CRUDAdmin/index.php');
      break;
	  case '3': 
		#Ingreso de Administrador
        header('Location: General/vistas/Registro.php');
      break;
    }
  }
  $LoginRS = mysqli_query( $con,$miselect) or die(mysqli_error());
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
  $_SESSION['MM_UserGroup'] = $loginStrGroup;
    if (isset($_SESSION['PrevUrl']) && false) {
      header('Location: ../index.php');
    }
    echo"<script type=\"text/javascript\">alert('Sesión iniciada correctamente'); window.location='CRUDAdmin/index.php';</script>";
    //header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    echo"<script type=\"text/javascript\">alert('Usuario no válido'); window.location='../index.php';</script>";
  }
}
?>
