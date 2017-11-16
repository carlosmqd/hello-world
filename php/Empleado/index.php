<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE); // Decidir que errores mostrar en pantalla
  include_once("modulos/Enrutador.php");
  include_once("modulos/Controlador.php");
    session_start();
	
  $User = $_SESSION['User'] ;
  $nombre = $_SESSION['nombreu'] ;
  $apellido = $_SESSION['apellidou'] ;
   $iduser = $_SESSION['iduser'] ;
   //echo "hola";
    $areau =$_SESSION['areau'];
   //echo   $_SESSION['areau'];
  //echo  $_SESSION['ref'];
 if($User == null){
 header("Location: /capacitacion_en _linea/index.php");
 }
 $con= mysqli_connect("127.0.0.1","root","", "capacitacion_en_linea");
 $sql="SELECT COUNT(estatus)as modulo FROM `modulos` WHERE no_empleado= '$iduser' AND idexamen = 3";
$res = mysqli_query( $con,$sql) or die("Error: ".mysqli_error($con));
$row = mysqli_fetch_array($res);
	$_SESSION['ref']=$row['modulo'];
	//echo $_SESSION['ref'];
 
 $consulta="select * from calificacion where no_empleado= '$iduser' and idestatus = 1";
$res2=mysqli_query($con,$consulta) or die("Error: ".mysqli_error($con));
if (mysqli_num_rows($res2)>0)
{
$_SESSION['cert']=1;
  
} else {
	$_SESSION['cert']=0;
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
              
            </div>
            <div class="collapse navbar-collapse" id="navbar-1">
              <ul class="nav navbar-nav">
			  <?php if($_SESSION['ref']>=5){?>
                <li><a href="inicio_examen.php">Realizar Examen</a></li>
				
                <li><a href="vista_examen.php"> Exámenes </a></li>
				<?php } if($_SESSION['cert']== 1){ ?>
                <li><a href="vista_certificado.php">Certificados 
				<?php } ?>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				</a></li>
			    <li><a><span class="glyphicon glyphicon-user">&nbsp</span><?php echo $nombre; echo " "; echo $apellido; ?></a></li>
                <li><a href="../cerrarSesion.php">Cerrar Sesión</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
    </div>
    <div class="jumbotron">
        <center><h1>Capacitación en línea</h1></center>
        <center><p class="lead">TIP/TEF12</p></center>
        <center><p><a href="modulos.php" class="btn btn-primary btn-lg">Revisar Cursos &raquo;</a></p></center>
		<center><p color="red"><h2 >Importante!</h2></p></center>
		<center><p class="lead">Si cambiaste de área actualízala aquí </p></center>
        <center><p><a href="vistas/actualizar_area.php" class="btn btn-danger btn-lg">Actualizar área &raquo;</a></p></center>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <center><h2>Realizar Examen</h2></center>
           <p align="justify">
                Al finalizar el curso se debe aplicar una evaluación de 10 preguntas y obtener una calificacion mayor o igual a 80 puntos.
				
            </p>
            <p>
			<?php if($_SESSION['ref']>=5){?>
                <a class="btn btn-default" href="inicio_examen.php">Ir a realizar examen &raquo;</a>
            <?php }else{ ?>
				<a class="btn btn-default" >Termina los cursos para desbloquear &raquo;</a>
			<?php }?>
			</p>
        </div>
        <div class="col-md-4">
           <center><h2> Exámenes </h2></center>
            <p style=”text-align: justify;”> 
                Tu puedes revisar tus cursos tomados y revisar tus resultados obtenidos en los examenes.
            </p>
            <p>
			<?php if($_SESSION['ref']>=5){?>
                 <a class="btn btn-default" href="vista_examen.php">Ir a exámenes  &raquo;</a>
            <?php }else{ ?>
				<a class="btn btn-default" >Termina los cursos para desbloquear &raquo;</a>
			<?php }?>
               
            </p>
        </div>
        <div class="col-md-4">
            <center><h2>Certificados </h2></center>
            <p>
              Para obtener tu certificado debes de tener una calificacion mayor o igual a 80 puntos.
            </p>
            <p>
			<?php  if($_SESSION['cert']== 1){ ?>
                <a class="btn btn-default" href="vista_certificado.php">Ir a certificados &raquo;</a>
            <?php }else{ ?>
				<a class="btn btn-default" >Aprueba un examen para desbloquear &raquo;</a>
			<?php }?>
                
            </p>
        </div>
		
    </div>
	 <div class="container body-content">
            <asp:ContentPlaceHolder ID="MainContent" runat="server">
            </asp:ContentPlaceHolder>
            <hr />
            <footer>
               <center><p>&copy;  2017 - TIP/TEF7 Application</p></center>
            </footer>
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
