 <?php
  include("php/conexion.php");
  $_SESSION['ref']=0;
?> 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="media/imagenes/B.png" type="image/png">
    <title>Login</title>
  </head>
  <body>
    <div id="container">
      <div class="col-md-12 galeria">
        <div id="carousel-1" class="carousel slide" data-ride="carousel">

          <ol class="carousel-indicators">
            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-1" data-slide-to="1"></li>
            <li data-target="#carousel-1" data-slide-to="2"></li>
            <li data-target="#carousel-1" data-slide-to="3"></li>
            <li data-target="#carousel-1" data-slide-to="4"></li>
          </ol>

          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="media/imagenes/B.jpg" class="img-responsive">
              <div class="carousel-caption hidden-xs hidden-sm">
                
              </div>
            </div>
            <div class="item">
              <img src="media/imagenes/B.jpg" class="img-responsive">
              <div class="carousel-caption hidden-xs hidden-sm">
                
              </div>
            </div>
            <div class="item">
              <img src="media/imagenes/B.jpg" class="img-responsive">
              <div class="carousel-caption hidden-xs hidden-sm">
                
              </div>
            </div>
            <div class="item">
              <img src="media/imagenes/B.jpg" class="img-responsive">
              <div class="carousel-caption hidden-xs hidden-sm">
              </div>
            </div>
            <div class="item">
              <img src="media/imagenes/B.jpg" class="img-responsive">
              <div class="carousel-caption hidden-xs hidden-sm">
               
              </div>
            </div>

          </div>

          <!--Control-->
          <a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
          </a>
        </div>
      </div>
	  
	  <center><h1>Capacitación en línea</h1></center>
      <div id="caja1">
          <center><h1>Iniciar Sesion</h1></center>
          <form action="php/validaLogin.php" method="post">
            <div class="form-group">
              <div class="input-group input-group-sm" >
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-user"></span>
                  </span>
                  <input class="form-control" name="usuario" type="name" minlength="8" maxlength="10" placeholder="Usuario" maxlength="50" required>
              </div><br>
              <div class="input-group input-group-sm">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-lock"></span>
                </span>
                <input class="form-control" type="password" name="password" placeholder="Contraseña" maxlength="50" required>
              </div> <br>
              <div class="input-group input-group-sm">
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-tasks"></span>
                  </span>
                  <div class="dropdown-toggle">
                    <select class="form-control" id="tipoUsuario" name="tipoDeUsuario">
                        <option value = "1">Empleado</option>
                        <option value = "2">Administrador</option>
                    </select>
                </div>
              </div><br>
              
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5">
                  <input type="submit" name="btnIngresar" value="Ingresar" class="btn btn-default submit-btn" style="margin: 0 130%;"> 
				 
			  </div>
            </div>
          </form>
      </div>
   
      <div id="caja2">
	     <center><h2>Registro nuevo usuario</h12></center>
          <form action="php/General/vistas/Registro.php" method="post">
            <div class="form-group">
        
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5">
			 <br></br>
                  <input type="submit" name="btnIngresar" value="Registrarse" class="btn btn-default submit-btn" style="margin: 0 130%;">
              </div>
            </div>

          </form>
		  <br></br>
		  <br></br>
		  <br></br>
		   <a href="php/General/vistas/recuperar_pass.php">Olvidaste tu contraseña?</a>
                  
      </div>
	  
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
