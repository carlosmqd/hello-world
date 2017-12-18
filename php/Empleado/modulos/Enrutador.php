<?php

  class Enrutador{

    public function cargarVista($vista){
      switch ($vista) {
        case 'crear':
          include_once('vistas/' .$vista. '.php');
        break;
        case 'ver':
          include_once('vistas/' .$vista. '.php');
        break;
        case 'editar':
          include_once('vistas/' .$vista. '.php');
        break;
        case 'eliminar':
          include_once('vistas/' .$vista. '.php');
        break;
        default:
          include_once('vistas/error.html');
        break;
      }

    } // FIN FUNCION cargarVista

    public function validarGET($variable){
      if(empty($variable)){
        #include_once("vistas/inicio.php");
        return false;
      }else{
        return true;
      }
    }

  }

?>
