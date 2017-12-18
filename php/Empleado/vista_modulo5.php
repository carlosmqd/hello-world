<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE); // Decidir que errores mostrar en pantalla
  include_once("modulos/Enrutador.php");
  include_once("modulos/Controlador.php");
    session_start();
	
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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.minc.css">
    <link rel="icon" href="../../media/imagenes/B.png" type="image/png">
	<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/carruse.css">
	<link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/carrusel2.css">
    <link rel="stylesheet" href="css/bootstrap/css/buttons.bootstrap.min.css">
    <link rel="icon" href="../../media/imagenes/B.png" type="image/png">
    <title>Contenido </title>
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
				
                <li><a href="vista_examen.php"> Exámenes </a></li>
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
  <body>
    <div id="container">
      <div class="col-md-12 galeria">
        <div id="carousel-1" class="carousel slide" data-ride="carousel" data-interval="false" >
           <div class="caraousel-tooltip-item active" data-index="0" style='display:none;'>
        <a href="#" class="tooltip-carousel" style="top:350px;left: 300px;padding:5px 10px;background:#f00;color:#fff;display:none" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Informacion extra 1.2" >
          <span class="fa fa-check fa-2x"></span>
        </a>
        
      </div>
	    <div class="caraousel-tooltip-item " data-index="1" style='display:none;'>
        <a href="#" class="tooltip-carousel" style="top:300px;left: 300px;padding:5px 10px;background:#f00;color:#fff;display:none" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Informacion extra  1.1">
          <span class="fa fa-check fa-2x"></span>
        </a>
       
      </div>
	    <div class="caraousel-tooltip-item " data-index="2" style='display:none;'>
        <a href="#" class="tooltip-carousel" style="top:300px;left: 300px;padding:5px 10px;background:#f00;color:#fff;display:none" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Informacion extra  1.1">
          <span class="fa fa-check fa-2x"></span>
        </a>
        
      </div>
	   
	    <div class="caraousel-tooltip-item " data-index="3">
        <a href="https://inside-ws.bosch.com/FIRSTspiritWeb/wcms/wcms_rgam/media/rbna/28_locations/42_location_mx_toluca/02_toluca_plant_organization/14_rbme_tef_tlp/tlp_tef_topics_1/20150302_ITSM_AAE2TL_ITEmergencyPlan.pdf" class="tooltip-carousel" style="top:350px;left: 105px;padding:5px 10px;background:#00f;color:#fff;display:inline-block" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Revisar Página" target="_blank">
          <span class="fa fa-link fa"></span>
        </a>
        
      </div>
	   
	    
          <ol class="carousel-indicators">
            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-1" data-slide-to="1"></li>
            <li data-target="#carousel-1" data-slide-to="2"></li>
            <li data-target="#carousel-1" data-slide-to="3"></li>
            <li data-target="#carousel-1" data-slide-to="4"></li>
		    <li data-target="#carousel-1" data-slide-to="5"></li>
            <li data-target="#carousel-1" data-slide-to="6"></li>
            <li data-target="#carousel-1" data-slide-to="7"></li>
            <li data-target="#carousel-1" data-slide-to="8"></li>
			<li data-target="#carousel-1" data-slide-to="9"></li>
           
          </ol>
           
          <div class="carousel-inner" role="listbox">
            <div class="item active" id="1">
              <img src="../../media/presentacion/modulo5/Slide1.jpg" class="img-responsive">
              <div class="carousel-caption hidden-xs hidden-sm">
                <h3 data-animation="animated bounceInLeft">
             MÓDULO 5
            </h3>
            <h3 data-animation="animated bounceInRight">
              Plan de Emergencia
            </h3>
              </div>
            </div>
            <div class="item" id="2">
              <img src="../../media/presentacion/modulo5/Slide2.jpg" class="img-responsive">
              <div class="carousel-caption hidden-xs hidden-sm">
                
              </div>
            </div>
            <div class="item" id="3">
              <img src="../../media/presentacion/modulo5/Slide3.jpg" class="img-responsive">
              <div class="carousel-caption hidden-xs hidden-sm">
                
              </div>
            </div>
            <div class="item" id="4">
              <img src="../../media/presentacion/modulo5/Slide4.jpg" class="img-responsive">
              <div class="carousel-caption hidden-xs hidden-sm">
               
              </div>
            </div>
            <div class="item" id="5">
              <img src="../../media/presentacion/modulo5/Slide5.jpg" class="img-responsive">
              <div class="carousel-caption hidden-xs hidden-sm">
                
              </div>
			  </div>
			   <div class="item" id="6">
              <img src="../../media/presentacion/modulo5/Slide6.jpg" class="img-responsive">
              <div class="carousel-caption hidden-xs hidden-sm">
                
              </div>
			  </div>
			  <div class="item" id="7">
              <img src="../../media/presentacion/modulo5/Slide7.jpg" class="img-responsive">
              <div class="carousel-caption hidden-xs hidden-sm">
                
              </div>
			  </div>
          </div>

          <!--Control-->
		
          <a  Id="left" Style="Display:none;" href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span id="ant" class="sr-only">Anterior</span>
		</a>  
          <a Id="right"  Style="Display:;" href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
            <span  class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
          </a>
        </div>
      </div>
      <div>
	  <br></br>
	  </div>
	  <footer>
               <center><p>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  </p></center>
                <center><p>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  </p></center>
			 	
	 <center><p><a href="./modulos.php" class="btn btn-primary btn-lg">&laquo; Regresar </a></p></center>
	 <br></br>
	  <center><div id="textDiv"></div> </center>
	
			
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
	<script src="css/carrusel2.js"></script>
	
	<script> 
	var delayMillis = 10000; //10 second
    var mytext ="Por favor espera a que las flechas de dirección se activen";
	var mytext2="";
	var div = document.getElementById("textDiv");  
      
    var text = div.textContent;  

  $('#carousel-1').on('slid.bs.carousel', function (ev) {
   var id = ev.relatedTarget.id;
   $('#carousel-1').off('keydown.bs.carousel');
  switch (id) {
    case "1":
     
	 left.style.display = "none"; 
     
      break;
    case "2":
      
	  div.textContent = mytext;
	    left.style.display = "none"; 
		 right.style.display = "none"; 
    setTimeout(function(){ right.style.display = "";left.style.display = ""; div.textContent = mytext2; },delayMillis);
      break;
	  
	  case "3":
	  $(function() {
    $('.tooltip-carousel').popover();

	 div.textContent = mytext;
	    left.style.display = "none"; 
		 right.style.display = "none"; 
    setTimeout(function(){ right.style.display = "";left.style.display = ""; div.textContent = mytext2; },delayMillis);
	
    $('#carousel-1').on('slide.bs.carousel', function() {
      $('.tooltip-carousel').popover('hide');
      $(this).find('.caraousel-tooltip-item.active').fadeOut(function() {
        $(this).removeClass('active');
      });
    });

    $('#carousel-1').on('slid.bs.carousel', function() {
      var index = $(this).find('.carousel-inner > .item.active').index();
      $(this).find('.caraousel-tooltip-item').eq(index).fadeIn(function() {
        $(this).addClass('active');
      });
    });

    $('.tooltip-carousel').mouseenter(function() {
      $(this).popover('show');
    }).mouseleave(function() {
      $(this).popover('hide');
    });
  });
	        
	      
	  break;
	  
	  case "4":
	  div.textContent = mytext;
	    left.style.display = "none"; 
		 right.style.display = "none"; 
    setTimeout(function(){ right.style.display = "";left.style.display = ""; div.textContent = mytext2; },delayMillis);
		  
   break;
  case "5":
      
	    div.textContent = mytext;
	    left.style.display = "none"; 
		 right.style.display = "none"; 
    setTimeout(function(){ right.style.display = "";left.style.display = ""; div.textContent = mytext2; },delayMillis);
      break;
	  case "6":
     div.textContent = mytext;
	    left.style.display = "none"; 
		 right.style.display = "none"; 
    setTimeout(function(){ right.style.display = "";left.style.display = ""; div.textContent = mytext2; },delayMillis);
      break;
	
	  case "7":
      // do something the id is 3
      alert("Felicidades terminaste de leer el material del modulo !!!"); 
	  
	  window.location='vistas/validar_curso.php?modulo=5';
	  
	  break;
    default:
      //the id is none of the above
	   
	   
  }
})  
  </script>
 
  </body>
</html>
