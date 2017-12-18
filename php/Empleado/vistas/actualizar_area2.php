<?php
session_start();
  $iduser= $_SESSION['iduser'];
  $area = $_POST['area'];
   
   if(empty($_POST['area'])){
	  echo"<script type=\"text/javascript\">alert('debes seleccionar un area');  window.history.back(-2);</script>";
}



    $sql = "UPDATE `usuarios` SET `idarea` = '$area' WHERE `usuarios`.`no_empleado` = '$iduser'";

    $conex = mysqli_connect("127.0.0.1", "root", "","capacitacion_en_linea");
   
    $resultado = mysqli_query($conex,$sql);
    if(!$resultado) {
      die('Invalid query: ' . mysqli_error());
    }else{
      echo"<script type=\"text/javascript\">alert('Usuario Actualizado correctamente'); window.location='./actualizar_area.php';</script>";
    }
	
?>
