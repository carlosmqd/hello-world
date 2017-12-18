<?php
  class Conexion{

    private $dirIP;
    private $user;
    private $pass;
    private $baseDatos;
	private $conex;

    public function __construct(){
        
    }

    public function consultaSimple($sqlQuery){
		$this->dirIP = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->baseDatos = "capacitacion_en_linea";

        $conex = mysqli_connect($this->dirIP, $this->user, $this->pass,$this->baseDatos);
      $result = mysqli_query( $conex,$sqlQuery) or die(mysqli_error());
      
    }

    public function consultaRetorno($sqlQuery){
		$this->dirIP = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->baseDatos = "capacitacion_en_linea";

        $conex = mysqli_connect($this->dirIP, $this->user, $this->pass,$this->baseDatos);
      $consulta = mysqli_query($conex,$sqlQuery)or die(mysqli_error());
      return $consulta;
    }
  }

?>
