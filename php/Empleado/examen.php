<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE); // Decidir que errores mostrar en pantalla
  include_once("modulos/Enrutador.php");
  include_once("modulos/Controlador.php");
    session_start();
  $_SESSION["r"]=0;
  $User = $_SESSION['User'] ;
 if($User == null){
 header("Location: /capacitacion_en _linea/index.php");
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
              <a href=""></a><img class="navbar-brand" src="../../media/imagenes/B.png" alt="">
              <a href="index.php" class="navbar-brand">BOSCH</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-1">
              <ul class="nav navbar-nav">
                <li><a href="vistas/examen.php">Realizar Examen</a></li>
                <li><a href="vista_examen.php"> Calificaciones de Examenes</a></li>
                <li><a href="../estadistica/estadisticasP.php">Certificados 
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				</a></li>
			    <li><a><span class="glyphicon glyphicon-user"></span><?php echo $User ?></a></li>
                <li><a href="../cerrarSesion.php">Cerrar Sesión</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
    </div>
    <div class="jumbotron">
        <center><h1>Capacitacion en linea</h1></center>
        <center><p class="lead">TIP/TEF12</p></center>
        <center><p><a href="http://google.com" class="btn btn-primary btn-lg">Learn more &raquo;</a></p></center>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <center><h2>Realizar Examen</h2></center>
           <p align="justify">
                Al finalizar la revisión de los contenidos se debe aplicar una evaluación de 10 preguntas y obtener una calificacion mayor o igual a 80 puntos.
				
            </p>
            <p>
                <a class="btn btn-default" href="http://google.com">Learn more &raquo;</a>
            </p>
        </div>
        <div class="col-md-4">
           <center><h2>Ver Calificaciones</h2></center>
            <p style=”text-align: justify;”> 
                Tu puedes revisar tus cursos tomados y revisar tus resultados obtenidos.
            </p>
            <p>
                <a class="btn btn-default" href="vista_examen.php">Learn more &raquo;</a>
            </p>
        </div>
        <div class="col-md-4">
            <center><h2>Obtener certificado</h2></center>
            <p>
              Para obtener tu certificado debes de tener una calificacion mayor o igual a 8.
            </p>
            <p>
                <a class="btn btn-default" href="http://google.com">Learn more &raquo;</a>
            </p>
        </div>
    </div>
	 <div class="container body-content">
            <asp:ContentPlaceHolder ID="MainContent" runat="server">
            </asp:ContentPlaceHolder>
            <hr />
            <footer>
               <center><p>&copy;  2017 - TIP/TEF12 Application</p></center>
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
