<?php
 error_reporting(E_ERROR | E_WARNING | E_PARSE); // Decidir que errores mostrar en pantalla
session_start();
$modulo=$_GET['modulo'];
$idusuario = $_SESSION['iduser'] ;

$con= mysqli_connect("127.0.0.1","root","", "capacitacion_en_linea");
 $sql="SELECT COUNT(estatus)as modulo FROM `modulos` WHERE no_empleado= '$idusuario' AND idexamen = 3";
 $res = mysqli_query( $con,$sql) or die("Error: ".mysqli_error($con));
 $row = mysqli_fetch_array($res);
 $_SESSION['ref']=$row['modulo'];
 if($modulo <= $_SESSION['ref']){
	 
	  echo"<script type=\"text/javascript\">alert('Módulo Completado'); window.location='../modulos.php';</script>";
 }else{
$sql = "INSERT INTO modulos (idmodulo, modulo, estatus, idexamen, no_empleado) VALUES (NULL, '$modulo', '1', '3', '$idusuario');";

    $conex = mysqli_connect("127.0.0.1", "root", "","capacitacion_en_linea");
   
    $resultado = mysqli_query($conex,$sql);
    if(!$resultado) {
      die('Invalid query: ' . mysqli_error());
    }if ($modulo== 5){
		
		echo"<script type=\"text/javascript\">alert('Todos los modulos desbloqueados, ahora puedes realizar tu examen'); window.location='../modulos.php';</script>";
    
	}else{
      echo"<script type=\"text/javascript\">alert('Nuevo modulo desbloqueado'); window.location='../modulos.php';</script>";
    }
 }	
?>
