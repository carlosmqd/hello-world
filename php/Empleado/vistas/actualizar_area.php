<?php
  session_start();
  $iduser=$_SESSION['iduser'];
   $con= mysqli_connect("127.0.0.1","root","", "capacitacion_en_linea");
   $res = mysqli_query( $con,"SELECT area.nombre FROM area,usuarios WHERE usuarios.idarea = area.idarea and  no_empleado = '$iduser' ") or die("Error: ".mysqli_error($con));
    while($row1 = mysqli_fetch_array($res)){
	$area= $row1['nombre'];
	
	}
$User = $_SESSION['User'] ;
 if($User == null){
 header("Location: /capacitacion_en _linea/index.php");
 }
 
  $nombre = $_SESSION['nombreu'] ;
  $apellido = $_SESSION['apellidou'] ;
  //echo $_SESSION['ref'];
 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../../../media/imagenes/icon.png" type="image/png">
    <title>Registrar</title>
    
  </head>
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
              <a href=""></a><img rel="icon" class="navbar-brand" src="../../../media/imagenes/icon.png" alt="">
              <a href="../index.php" class="navbar-brand">INICIO</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-1">
              <ul class="nav navbar-nav">
                <?php if($_SESSION['ref']>=5){?>
                <li><a href="./../inicio_examen.php">Realizar Examen</a></li>
				
                <li><a href="./../vista_examen.php">  Exámenes </a></li>
				<?php  } if($_SESSION['cert']== 1){ ?>
                <li><a href="./../vista_certificado.php">Certificados 
				<?php }?>
				</a></li>
			    <li><a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-user">&nbsp</span><?php echo $nombre; echo " "; echo $apellido; ?></a></li>
                <li><a href="../../cerrarSesion.php">Cerrar Sesión</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
  <body class="marginL1" >
  <br></br>
  <div ><input type="botton" name="enviar" value="&laquo; Regresar" class="btnRegistrar col-lg-2 form-control btn btn-primary" onclick = "location='../index.php'" style="height:40px;width:100px"></div>
 
	
    <center><h1>Actualizar Área </h1></center>
   
    <hr>
      <form action="actualizar_area2.php" method="post" >
       
       
        <div class="form-group" >
         <label class="col-lg-2 control-label">Área actual: </label>
          <input type="text" name="huellaD" class="col-lg-2 form-control" value="<?php echo $area; ?>" readonly="readonly"  style="height:40px;width:100px">
         <br></br>
		 <br></br>
          <label class="col-lg-2 control-label">Nueva área: </label>
		  <select name="area" class="col-lg-2 form-control"  style="height:40px;width:100px" required> 
			<option value="">---</option>
		   <?php 
   
			$result = mysqli_query( $con,"SELECT * FROM area") or die("Error: ".mysqli_error($con));
		
		   while($row = mysqli_fetch_array($result)){?>

      
				  <option value="<?php echo $row['idarea'];?>"><?php echo$row['nombre'];?></option>
				 
           <?php } ?>
            
			 </select> 
			  <br></br>
			  <br></br>
			 <div class="col-lg-10"><input type="submit" name="enviar" value="Actualizar" class="btnRegistrar col-lg-2 form-control btn btn-primary"  style="height:40px;width:100px"></div>
          </div>
       
		<br></br>
	
      </form>
    </div>
    
    <script src="../css/bootstrap/js/jquery.js"></script>
  </body>
</html>
