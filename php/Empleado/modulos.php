<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE); // Decidir que errores mostrar en pantalla
    session_start();
	
  $User = $_SESSION['User'] ;
  $nombre = $_SESSION['nombreu'] ;
  $apellido = $_SESSION['apellidou'] ;
   $iduser= $_SESSION['iduser'] ;
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
			  <?php if($_SESSION['ref']>=5){?>
                <li><a href="inicio_examen.php">Realizar Examen</a></li>
				
                <li><a href="vista_examen.php">  Exámenes </a></li>
				<?php  } if($_SESSION['cert']== 1){ ?>
                <li><a href="vista_certificado.php">Certificados 
				<?php }?>
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
	<div class="col-lg-10"><input type="botton" name="enviar" value="&laquo; Regresar" class="btnRegistrar col-lg-2 form-control btn btn-primary" onclick = "location='./index.php'" style='width:110px; height:40px'></div>
    
    <div class="jumbotron">
        <center><h2>CD-04602 IT en Manufactura</h2></center>
		<?php if($_SESSION['ref']>=5){?>
			    <center><p class="lead">Felicidades has completado todos los módulos!</p></center>
                 <center><p><a href="inicio_examen.php" class="btn btn-info btn-lg">Realizar Examen &raquo;</a></p></center>
				<?php }?>
		<!-- modulo 1 -->		
        <center><p class="lead">MÓDULO  1 </p></center>
        <center><p class="lead">CD-04602 IT en Manufactura</p></center>
		 
		<?php if($_SESSION['ref']>=1){?>
        <center><p><IMG SRC="../../media/imagenes/ok.png" width="50" height="50"><a>&nbsp </a><a href="vista_contenido.php" class="btn btn-success btn-lg">Revisar Módulo &raquo;</a></p></center>
		  <?php }else {?>
		  <center><p><a href="vista_contenido.php" class="btn btn-success btn-lg">Iniciar Módulo &raquo;</a></p></center>
		
		  <!-- modulo 2 -->	
		  <?php  } ?>
		<center><p class="lead">MÓDULO 2</p></center>
        <center><p class="lead">Amenazas y riesgos existentes en líneas de producción</p></center>
		
		    <?php if($_SESSION['ref'] <= 0){ ?>
				 <center><p><a class="btn btn-info btn-lg">módulo  no desbloqueado &raquo;</a></p></center>
		    <?php }if($_SESSION['ref'] == 1){?>
                <center><p><a href="vista_modulo2.php" class="btn btn-success btn-lg">Iniciar Módulo &raquo;</a></p></center>
            <?php } if($_SESSION['ref'] >=2){ ?>
				<center><p><IMG SRC="../../media/imagenes/ok.png" width="50" height="50"><a>&nbsp </a><a href="vista_modulo2.php" class="btn btn-success btn-lg">Revisar Módulo &raquo;</a></p></center>
		
			<?php } ?>
       <!-- modulo 3 -->	
		<center><p class="lead">MÓDULO 3</p></center>
		<center><p class="lead">Dentro del area de producción</p></center>
         <?php if($_SESSION['ref'] <= 1){ ?>
				 <center><p><a class="btn btn-info btn-lg">módulo  no desbloqueado &raquo;</a></p></center>
		    <?php }if($_SESSION['ref'] == 2){?>
                <center><p><a href="vista_modulo3.php" class="btn btn-success btn-lg">Iniciar Módulo &raquo;</a></p></center>
            <?php } if($_SESSION['ref'] >=3){ ?>
				<center><p><IMG SRC="../../media/imagenes/ok.png" width="50" height="50"><a>&nbsp </a><a href="vista_modulo3.php" class="btn btn-success btn-lg">Revisar Módulo &raquo;</a></p></center>
		
			<?php } ?>
			
			<!-- modulo 4 -->	
			
		<center><p class="lead">MÓDULO 4</p></center>
		<center><p class="lead">Zonas de Manufactura</p></center>
        <?php if($_SESSION['ref'] <= 2){ ?>
				 <center><p><a class="btn btn-info btn-lg">módulo  no desbloqueado &raquo;</a></p></center>
		    <?php }if($_SESSION['ref'] == 3){?>
                <center><p><a href="vista_modulo4.php" class="btn btn-success btn-lg">Iniciar Módulo &raquo;</a></p></center>
            <?php } if($_SESSION['ref'] >=4){ ?>
				<center><p><IMG SRC="../../media/imagenes/ok.png" width="50" height="50"><a>&nbsp </a><a href="vista_modulo4.php" class="btn btn-success btn-lg">Revisar Módulo &raquo;</a></p></center>
		
			<?php } ?>
			<!-- modulo 5 -->	
		<center><p class="lead">MÓDULO 5</p></center>
		<center><p class="lead">Plan de Emergencia </p></center>
        
		<?php if($_SESSION['ref'] <= 3){ ?>
				 <center><p><a class="btn btn-info btn-lg">módulo  no desbloqueado &raquo;</a></p></center>
		    <?php }if($_SESSION['ref'] == 4){?>
                <center><p><a href="vista_modulo5.php" class="btn btn-success btn-lg">Iniciar Módulo &raquo;</a></p></center>
            <?php } if($_SESSION['ref'] >=5){ ?>
				<center><p><IMG SRC="../../media/imagenes/ok.png" width="50" height="50"><a>&nbsp </a><a href="vista_modulo5.php" class="btn btn-success btn-lg">Revisar Módulo &raquo;</a></p></center>
		
			<?php } ?>
			
			
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
