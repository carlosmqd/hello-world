<?php include ("../../conexion.php"); 
error_reporting(E_ALL ^ E_NOTICE);
session_start();
//echo $_SESSION["User"];
$User = $_SESSION['User'] ;
$alumno = $_SESSION["User"];
 $iduser= $_SESSION['iduser'] ;
$tiempo =10;
$v=$_POST["Idc"];
$cone= mysqli_connect("127.0.0.1","root","", "capacitacion_en_linea");
 $sqle="SELECT COUNT(idestatus)as examenes FROM calificacion WHERE no_empleado= '$iduser' AND idexamen = 3 AND idestatus = 1";
 $rese = mysqli_query( $cone,$sqle) or die("Error: ".mysqli_error($cone));
 $rowe = mysqli_fetch_array($rese);
 $examenes=$rowe['examenes'];
 //echo $examenes;
 if($User == null){
 header("Location: /capacitacion_en _linea/index.php");
 }
 if($_POST["array"] == null){
	
$_SESSION['array']=$_SESSION['array'];
}else{
$_SESSION['array']=$_POST["array"];
}
 $serializado=$_SESSION['array'];
 $sinserializar = unserialize($serializado);
 $cont =$_SESSION["p"];
 
 //for ($i = 0; $i < 10; $i++) {
	 
	// echo "<br>";
// }
 if($examenes >= 1){
 header("Location: /capacitacion_en _linea/php/Empleado/inicio_examen.php");
 }
If($v==0){
	$v="null";
}
if($_POST["examen"] == null){
	
$_SESSION['idexamen']=$_SESSION['idexamen'];
}else{
$_SESSION['idexamen']=$_POST["examen"];
}
$r= $_SESSION["p"]=$_SESSION["p"]+1;
if($r >= 12){
 header("Location: /capacitacion_en _linea/php/Empleado/inicio_examen.php");
 }
 
 
//echo "Respuestas correctas";
//echo $_SESSION["b"];
//echo "<br>";
//echo "Pregunta No.";
//echo $_SESSION["p"];
//echo "<br>";
//echo "respuesta  ";
//echo $_SESSION["respuesta"];
//echo "<br>";
//echo "    valor  ";
$idexamen =$_SESSION['idexamen'];
//echo "examen";
//echo  $idexamen;
//echo"//////////////////////\n ";
//echo $v;
//echo"//////////////////////\n ";
//echo $v[0];
//echo"//////////////////////\n ";
//echo $_SESSION["v"];
$_SESSION["v"]=$v[0];
//echo $_SESSION["v"];
//echo $_SESSION["respuesta"];
if($_SESSION["v"] == $_SESSION["respuesta"]){
	
$_SESSION["b"]=$_SESSION["b"]+10;

}
//traer el numero de preguntas del examen
$query2="SELECT COUNT(*)as total FROM crearexamen WHERE idexamen='$idexamen'";
$reg = mysqli_query($enlace,$query2) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($reg);
$total= $row2['total'];
//traer preguntas con nuevo indice
//echo $total;

//traer preguntas
 $n =  $sinserializar[$cont] ;//rand(1,$total);
$query = "SELECT DISTINCT pregunta.idpregunta,@rownum:=@rownum+1 numero,
idexamen,pregunta,opc1,opc2,opc3, opc4,respuesta FROM pregunta,
crearexamen, (SELECT @rownum:=0) r where pregunta.idpregunta=crearexamen.idpregunta 
and crearexamen.idexamen= '$idexamen' HAVING `numero`='$n' ";
 

 
$videoreg = mysqli_query($enlace,$query) or die(mysqli_error());
$row = mysqli_fetch_assoc($videoreg);
$totalRows_videoreg = mysqli_num_rows($videoreg);

$_SESSION["respuesta"]=$row['respuesta'];
//operacion validar resultados


//echo "parametro 1:  "+$b[1];
//echo "parametro 2:  "+$b[2];
//echo "parametro 3:  "+$b[3];



?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap/css/buttons.bootstrap.min.css">
    <link rel="icon" href="../../../media/imagenes/icon.png" type="image/png">
	<title>Examen</title>
	<script language="JavaScript">
<!--

/* Determinamos el tiempo total en segundos */

var r=parseInt("<?php echo $r;?>");




/* Ejecutamos la funcion updateReloj() al cargar la pagina */

updateReloj();


function updateReloj() {

		if(r == 11){
			
			 window.location.href='../resultado_examen.php';
		}
		
        /* Ejecutamos nuevamente la función al pasar 1000 milisegundos (1 segundo) */
        
    }

/* Funcion que pone un 0 delante de un valor si es necesario */

function LeadingZero(Time) {

    return (Time < 10) ? "0" + Time : + Time;

}

//-->

</script>
</head>
<body>
	<header></header>
	<section>
<body>
<h1>Pregunta no.<?php echo $_SESSION["p"]; ?></h1>
<h2 align="right" id='CuentaAtras'></h2>

<form  method="post">
	<?php do { ?>
      <center><h2><?php echo $row['pregunta']; ?></h2></center>
		<br></br>
      <center><input type="radio" name="Idc[]" value="1" /> <?php echo $row['opc1']; ?></center>
		<br></br>
	  <center><input type="radio" name="Idc[]" value="2" /> <?php echo $row['opc2']; ?></center>
		<br></br>
	  <center><input type="radio" name="Idc[]" value="3" /> <?php echo $row['opc3']; ?></center>
		<br></br>
	  <center><input type="radio" name="Idc[]" value="4" /> <?php echo $row['opc4']; ?></center>
	<?php } while ($row = mysqli_fetch_assoc($videoreg)); ?>
		<br></br>
	  <center><input type="submit" name="enviar" value="Siguiente Pregunta &raquo;" class="btn btn-primary btn-lg"></center>
      </form>
	  <br></br>
	  <center><input type="button" value="Cancelar examen" onClick="window.location = '../inicio_examen.php';" class="btn btn-primary btn-lg"></center>
	   
</body>


<script language="JavaScript">
function maximizar(){
window.moveTo(0,0);
window.resizeTo(screen.width,screen.height);
}
</script>
</html>
