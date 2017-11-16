<?php 


	require_once("../dompdf/dompdf_config.inc.php");
    session_start();
	$idexamen=$_GET['examen'];
	$fecha=$_SESSION['fechacert'];
	$idusuario=$_SESSION['User'];
	$nombre= $_SESSION['nombreu'];
	$apellido=$_SESSION['apellidou']; 
	$i=$_SESSION['iduser'];
	$u= substr ( $idusuario ,-3);
	$con= mysqli_connect("127.0.0.1","root","", "capacitacion_en_linea");
   $res = mysqli_query( $con,"SELECT * FROM examen WHERE examen.nombre = '$idexamen'") or die("Error: ".mysqli_error($con));
    while($row1 = mysqli_fetch_array($res)){
	$c= $row1['idcertificado'];
	$ie=$row1['idexamen'];
	}

		   

$codigoHTML='

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Certificado</title>
<STYLE TYPE="text/css">
body {
background-repeat : no-repeat;
background-position : center;
background-attachment : fixed;
}
</style> 
</head>
<body BGCOLOR="#FFFFFF" TEXT="#000000" LINK="#0000FF" V
LINK="#800080" ALINK="#FF0000" BACKGROUND="../../media/imagenes/certificado.jpg"> 
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>

<center><h1>'.$nombre.'  '.$apellido.'</h1></center>
<br></br>
<center><h3>  '.$idexamen.'</h3></center>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<p align="right">Vigencia hasta: '.$fecha.'</p>
<p align="right">codigo de verificacion: '.$c.''.$i.'-'.$ie.''.$u.'</p>
</body>
</html>
	
     ';
        

   

$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html(utf8_encode($codigoHTML));
$dompdf->set_paper("A4", "landscape");
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte.pdf");
?>

