<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE); // Decidir que errores mostrar en pantalla
  include_once("modulos/Enrutador.php");
  include_once("modulos/Controlador.php");
    session_start();
	 $nombre = $_SESSION['nombreu'] ;
  $apellido = $_SESSION['apellidou'] ;
  $_SESSION["r"]=0;
  $User = $_SESSION['User'] ;
  $iduser = $_SESSION['iduser'];
   $idexamen = $_SESSION['idexamen'];
   $area= $_SESSION['areau'];
   //$area="hola";
   //echo $area;
   //echo "llega: ";
  // echo $_SESSION['areau'];
   $cal = intval ($_SESSION['b']) ;
 if($User == null){
 header("Location: /capacitacion_en _linea/index.php");
 }
 $conex = mysqli_connect("127.0.0.1", "root", "","capacitacion_en_linea");
 $consulta="select * from calificacion where no_empleado= '$iduser' and idestatus = 1";
$res2=mysqli_query($conex,$consulta) or die("Error: ".mysqli_error($conex));
if (mysqli_num_rows($res2)>0)
{
$_SESSION['cert']=1;
  
} else {
	$_SESSION['cert']=0;
}
 
  if($_SESSION['cert']== 1){ 
   header("Location: vista_examen.php");
 }else {
  if($cal >= 80){
	 $estatus =1; 
	  
  }else{
	  $estatus =2; 
  }
 
  $sql = "INSERT INTO `calificacion` (`idcalificacion`, `calificacion`, `idexamen`, `no_empleado`, `idestatus`,`fecha`, `idarea`) 
  VALUES (NULL, '$cal', '$idexamen', '$iduser', '$estatus',now(),$area);";

    
   
    $resultado = mysqli_query($conex,$sql);
    if(!$resultado) {
      die('Invalid query: ' . mysqli_error());
    }else{
     
    }
 }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap/css/buttons.bootstrap.min.css">
    <link rel="icon" href="../../media/imagenes/B.png" type="image/png">
    <title>Capacitacion en linea </title>
  </head>
  <body>
    <div class="containter">
      <header>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href=""></a><img rel="icon" class="navbar-brand" src="../../media/imagenes/icon.png" alt="">
              <a href="index.php" class="navbar-brand">INICIO</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-1">
              <ul class="nav navbar-nav">
                <?php if($_SESSION['ref']==5){?>
                <li><a href="inicio_examen.php">Realizar Examen</a></li>
				
                <li><a href="vista_examen.php">  Examenes</a></li>
				<?php  } if($_SESSION['cert']== 1){ ?>
                <li><a href="vista_certificado.php">Certificados 
				</a></li>
				<?php }?>
			    <li><a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-user">&nbsp</span><?php echo $nombre; echo " "; echo $apellido; ?></a></li>
                <li><a href="../cerrarSesion.php">Cerrar Sesión</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
    </div>
    <div class="jumbotron">
        <center><h1>Tu calificacion fue : <?php echo $_SESSION["b"]?>/100</h1></center>
		<?php if( $_SESSION["b"] < 80 ){?>
		 <br></br>
		<center><h2>Deberás de realizar nuevamente tu evaluación</h2></center>
		<center><h2> para poder acreditar el curso</h2></center>
		<center><p><a href="inicio_examen.php" class="btn btn-primary btn-lg">Intentar de nuevo  </a></p></center>
        <?php }else { ?>
		
           <center><h1>Importante!</h1></center>
			<center><h2>Imprime tu certificado para validar el curso</h2></center>
			<center><p><a href="vista_certificado.php" class="btn btn-primary btn-lg">Ver certificados &raquo;</a></p></center>
		    <?php } ?>
	   <br></br>
		
		<center><p><a href="vista_examen.php" class="btn btn-primary btn-lg">Ver exámenes &raquo;</a></p></center>
    </div>
    
   
		<script src="css/bootstrap/js/jquery-1.12.3.js"></script>
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <script src="css/bootstrap/js/jquery.dataTables.min.js"></script>
    <script src="css/bootstrap/js/dataTables.bootstrap.js"></script>
    <!--botones DataTables-->
    <script src="css/bootstrap/js/dataTables.buttons.min.js"></script>
    <script src="css/bootstrap/js/buttons.bootstrap.min.js"></script>
  </body>
</html>
