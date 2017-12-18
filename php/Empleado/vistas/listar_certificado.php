<?php
 session_start();
$iduser=$_SESSION['iduser'];
  $sql = "SELECT DISTINCT examen.idexamen,examen.nombre,estatus.tipo as Estatus,fecha FROM calificacion,examen,estatus where calificacion.idestatus = estatus.idestatus and calificacion.idexamen = examen.idexamen AND no_empleado='$iduser' HAVING Estatus = 'aprobado'";
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
		
 $ver = '<a class=\"btn btn-success\" href=certificado.php?examen='.$row['nombre'].'><b>Imprimir Certificado</b></a><br>';
      $tabla.='{
				  "examen":"'.$row['nombre'].'",
				  "estatus":"'.$row['Estatus'].'",
				  "link":"'.$ver.'"
				  
				},';
           $fecha= $row['fecha'];
	}
  $nuevafecha = strtotime ( '+1 year' , strtotime ( $fecha ) ) ;
  $_SESSION['fechacert'] =  date ( 'Y-m-j' , $nuevafecha );
    $tabla = substr($tabla,0, strlen($tabla) - 1);

	  echo '{"data":['.$tabla.']}';
	 
    mysqli_free_result($resultado);
  }
 
?>
