<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE); // Decidir que errores mostrar en pantalla
  include_once("modulos/Enrutador.php");
  include_once("modulos/Controlador.php");
  session_start();
  session_start();
	
  $User = $_SESSION['User'] ;
  $nombre = $_SESSION['nombreu'] ;
  $apellido = $_SESSION['apellidou'] ;
 //$User="carlos";
 $User = $_SESSION['User'] ;
 if($User == null){
 header("Location: /capacitacion_en _linea/index.php");
 }
if($_SESSION['cert'] != 1){ 
 
 header("Location: /capacitacion_en _linea/php/Empleado/index.php");
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
    <title>Certificados</title>
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
				<?php }?>
                <li><a href="vista_examen.php">  Exámenes </a></li>
                <li><a href="vista_certificado.php">Certificados 
				</a></li>
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
	<div class="col-lg-10"><input type="botton" name="enviar" value="&laquo; Regresar" class="btnRegistrar col-lg-2 form-control btn btn-primary" onclick = "location='./index.php'" style='width:110px; height:30px'></div>
    
    <section>
      <?php
        $enrutador = new Enrutador();
        if($enrutador->validarGET($_GET['cargar'])){
            $enrutador->cargarVista($_GET['cargar']);
        }else {
              echo "<br><center><h1>Certificados</h1></center><br>";
              echo "<div class=table-responsive>";
                echo "<table id=tablaDatos class=table table-bordered table-hover cellspacing=0 width=100%>";
                  echo "<thead>";
                    echo "<tr>";
                      echo "<th>Examen</th>";
                      echo "<th>Estatus</th>";
					  echo "<th>Certificado</th>";
                    echo "</tr>";
                  echo "</thead>";
                  echo "<tbody>";
                  echo "</tbody>";
                echo "</table>";
            echo "</div>";
        }?>
    </section>
    <script src="css/bootstrap/js/jquery-1.12.3.js"></script>
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <script src="css/bootstrap/js/jquery.dataTables.min.js"></script>
    <script src="css/bootstrap/js/dataTables.bootstrap.js"></script>
    <!--botones DataTables-->
    <script src="css/bootstrap/js/dataTables.buttons.min.js"></script>
    <script src="css/bootstrap/js/buttons.bootstrap.min.js"></script>
    <script>
      $(document).on("ready", function(){
        listar();
      });
      var listar = function(){
        var table = $("#tablaDatos").DataTable({
          "ajax":{
            "method": "POST",
            "url" : "vistas/listar_certificado.php"
          },
          "columns":[
            {"data": "examen"},
			{"data": "estatus"},
			{"data": "link"}
		
          ],
		"oLanguage": {
            "sProcessing":     "Procesando...",
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
		    "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
		    "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
		    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Filtrar:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Por favor espere - cargando...",
		    "oPaginate": {
		        "sFirst":    "Primero",
		        "sLast":     "Último",
		        "sNext":     "Siguiente",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
        }
        });
      }
    </script>
  </body>
</html>
