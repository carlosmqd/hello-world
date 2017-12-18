<?php
  session_start();
$iduser=$_SESSION['iduser'];

 $sql = "SELECT  examen.nombre ,calificacion,estatus.tipo as Estatus ,calificacion.fecha FROM calificacion,examen,estatus where calificacion.idestatus = estatus.idestatus and calificacion.idexamen = examen.idexamen AND YEAR(calificacion.fecha) = YEAR(now()) AND no_empleado='$iduser'";
 $enlace = mysqli_connect("127.0.0.1","root","", "capacitaciOn_en_linea");
    if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
    //mysqli_close($enlace);

  $resultado = mysqli_query($enlace,$sql);

  if(!$resultado){
    die("ERROR");
  }else{
    $tabla = "";
    while($row = mysqli_fetch_array($resultado)){

      $tabla.='{
				  "examen":"'.$row['nombre'].'",
				  "calificacion":"'.$row['calificacion'].' / 100",
				  "estatus":"'.$row['Estatus'].'",
				   "fecha":"'.$row['fecha'].'"
				},';
    }
    
    $tabla = substr($tabla,0, strlen($tabla) - 1);

	  echo '{"data":['.$tabla.']}';
	 
    mysqli_free_result($resultado);
  }
?>

