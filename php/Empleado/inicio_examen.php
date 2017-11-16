<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE); // Decidir que errores mostrar en pantalla
  include_once("modulos/Enrutador.php");
  include_once("modulos/Controlador.php");
    session_start();
	  $_SESSION["p"]=0;
  $_SESSION["b"]=0;
  //echo $_SESSION["b"];
  $_SESSION["r"]=0;
 $_SESSION["v"]=0;
  $User = $_SESSION['User'] ;
   $iduser= $_SESSION['iduser'] ;
  $nombre = $_SESSION['nombreu'] ;
  $apellido = $_SESSION['apellidou'] ;
 if($User == null){
 header("Location: /capacitacion_en _linea/index.php");
 }
 
 $con= mysqli_connect("127.0.0.1","root","", "capacitacion_en_linea");
 $sql="SELECT COUNT(idestatus)as examenes FROM calificacion WHERE no_empleado= '$iduser' AND idexamen = 3 AND idestatus = 1";
 $res = mysqli_query( $con,$sql) or die("Error: ".mysqli_error($con));
 $row = mysqli_fetch_array($res);
 $examenes=$row['examenes'];
   
   $query2="SELECT COUNT(*)as total FROM crearexamen WHERE idexamen='3'";
$reg = mysqli_query($con,$query2) or die("Error: ".mysqli_error($con));
$row2 = mysqli_fetch_assoc($reg);
$max= $row2['total'];
$aleatorio = mt_rand(1, $max); //Genereamos aleatorio
$usados[] = $aleatorio; //Guardamos el primero en un array ya que el primero no puede estar repetido

for ($i = 0; $i < 10; $i++) {
    
    $aleatorio = mt_rand(1, $max); //Generamos aleatorio
    while(in_array($aleatorio,$usados)) { //buscamos que no este repetido
        $aleatorio = mt_rand(1, $max);
    }

    $usados[] = $aleatorio;    //No esta repetido, luego guardamos el aleatorio
	
	//echo $usados[$i] ;
	//echo "<br>";
} 
 $serializado = serialize($usados);  
 
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
    <title>Examen </title>
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
			
                <li><a href="vista_examen.php">  Exámenes </a></li>
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
	<form action="vistas/examen.php" method="post" class="form-horizontal" role="form">
    <div class="jumbotron" style = "width: 99%">
	<input name="array" type="hidden" value="<?php echo $serializado ?>">
        <center><h1>Instrucciones</h1></center>
		  <h3> 1) Tendrás que contestar 10 preguntas.  </h3>
		  <h3> 2) Se te presentan las preguntas una a la vez. </h3>
		  <h3> 3) En la parte inferior se encuentran el botón para avanzar a la siguiente pregunta, una vez seleccionado se guardará la respuesta y no se podrá regresar a la pregunta anterior.  </h3>
		  <h3> 4) Tienes varias oportunidades para contestar el examen. Si cierras la ventana del examen ya no podrás continuar con el mismo.  </h3>
          <br></br>
		  <center><h3>  Selecciona el examen a realizar </h3></center>
		   <select name="examen" class="col-lg-2 form-control"> 
		   <?php 
             if($examenes < 1){
			$result = mysqli_query( $con,"SELECT * FROM examen where idexamen=3") or die("Error: ".mysqli_error( $con));
		
		   while($row = mysqli_fetch_array($result)){?>

      
				  <option value="<?php echo $row['idexamen'];?>"><?php echo $row['nombre'];// echo $row['idexamen'];?></option>
				 <?php } 	?>  
		   
		    </select> 
			<br></br>
		     <center><input type="submit" name="enviar" value="Iniciar Examen &raquo;" class="btn btn-primary btn-lg""></center>
          
		   <?php		
			}else {
				?>
				<option value="<?php echo $row['idexamen'];?>"><?php echo "No tienes examenes disponibles"; ?></option>
				</select> 
			 <br></br>
		<center><input type="button" onclick = "location='./index.php'" value="&laquo; Salir " class="btn btn-primary btn-lg""></center>
				
				<?php
			}
		     
		   ?>
            
			 
    </div>
    </form>
   
		<script src="css/bootstrap/js/jquery-1.12.3.js"></script>
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <script src="css/bootstrap/js/jquery.dataTables.min.js"></script>
    <script src="css/bootstrap/js/dataTables.bootstrap.js"></script>
    <!--botones DataTables-->
    <script src="css/bootstrap/js/dataTables.buttons.min.js"></script>
    <script src="css/bootstrap/js/buttons.bootstrap.min.js"></script>
  </body>
</html>
