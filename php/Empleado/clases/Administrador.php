<?php

  include_once("Conexion.php");

  class Administrador{

    private $con;

    public function __construct(){
      $this->con = new Conexion();
    }

    public function verDatos(){
      $sql = "SELECT idcalificacion, examen.nombre ,calificacion,estatus.tipo as Estatus FROM calificacion,examen,estatus where calificacion.idestatus = estatus.idestatus";
      $resultado = $this->con->consultaRetorno($sql);
      return $resultado;
    }

    public function alta($nombre, $apellidoP, $apellidoM, $fechaNac, $mail, $telCel, $huellaDigital, $passw, $tipoUs){

      $sql2 = "SELECT * FROM usuarios WHERE correo = '$mail'";
      $resultado = $this->con->consultaRetorno($sql2);
      $num = mysql_num_rows($resultado);
      if($num != 0){
        return false;
      }else{
        //Cifrando  Contraseña
        $key='pruebita';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
        $pass = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $passw, MCRYPT_MODE_CBC, md5(md5($key))));

        $sql = "INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, correo, celular,
                                      huellaDigital, passU, tipoUsuario)
                VALUES ('$nombre', '$apellidoP', '$apellidoM', '$fechaNac', '$mail', '$telCel', '$huellaDigital', '$pass', '$tipoUs')";
          $this->con->consultaSimple($sql);
        return true;
      }
    } // FIN FUNCION alta

    public function eliminar($id){
      $sql = "DELETE FROM usuarios WHERE idUsuario = '$id'";
      $this->con->consultaSimple($sql);
    } // FIN FUNCION eliminar

    public function mostrarDatos($id){
      $sql= "SELECT idUsuario, nombre, apellidoPaterno, apellidoMaterno, correo, fechaNacimiento, celular, tipo
             FROM usuarios, tipousuario
             WHERE usuarios.tipoUsuario = tipousuario.idTipo
             AND idUsuario = '$id'";
      $resultado = $this->con->consultaRetorno($sql);
      $row = mysql_fetch_assoc($resultado);
      return $row;
    } // FIN FUNCION mostrarDatos

    public function modificar($id, $nombre, $apellidoP, $apellidoM, $correo, $tipoUs, $telCel, $fechaNac){
        $sql = "UPDATE usuarios
                SET nombre='$nombre', apellidoPaterno='$apellidoP', apellidoMaterno='$apellidoM', correo='$correo', tipoUsuario='$tipoUs', celular='$telCel', fechaNacimiento='$fechaNac'
                WHERE idUsuario = '$id'";
    } //FIN FUNCION modificar

  }


?>
