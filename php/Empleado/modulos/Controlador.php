<?php

  include_once("clases/Administrador.php");

  class Controlador{

    private $administrador;

    public function __construct(){
      $this->administrador = new Administrador();
    }

    public function index(){
      $resultado = $this->administrador->verDatos();
      return $resultado;
    }

    public function crear($nombre, $apellidoP, $apellidoM, $fechaNac, $mail, $telCel, $huellaDigital, $pass, $tipoUs){
      $resultado = $this->administrador->alta($nombre, $apellidoP, $apellidoM, $fechaNac, $mail, $telCel, $huellaDigital, $pass, $tipoUs);
      return $resultado;
    }

    public function eliminar($id){
      $this->administrador->eliminar($id);
    }

    public function ver($id){
      $datos = $this->administrador->mostrarDatos($id);
      return $datos;
    }

    public function editar($id, $nombre, $apellidoP, $apellidoM, $correo, $tipoUsuario, $telCel, $fechaNac){
      $this->administrador->modificar($id, $nombre, $apellidoP, $apellidoM, $correo, $tipoUsuario, $telCel, $fechaNac);
    }

  }

?>
