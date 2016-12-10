<?php

class DBManager{
    
    private $BaseDatos;
	private $Servidor;
    private $Instancia;
	private $Usuario;
	private $Clave;
    private $Conexion;
    private $Gestor;
    
    public function __construct(){
        /*
            Gestor
            1 = SqlServer
            2 = MySql
        */
        /*
        $this->Servidor = ".";
        $this->Instancia = "";
		$this->Usuario = "";
		$this->Clave = "";
		$this->BaseDatos = "WFNPD";
        $this->Gestor = 1;
        */
        
        $this->Servidor = "localhost";
        //$this->Servidor = "capmysql.arhena.com.ec";
		$this->Usuario = "root";
		$this->Clave = "";
		$this->BaseDatos = "qualitycheck";
        $this->Gestor = 2;
        // Establecer la zona horaria
        date_default_timezone_set('America/Guayaquil');
	}
    
    public function DBParametros($servidor,$instancia,$db,$usuario,$clave) {
        $this->Servidor = $servidor;
        $this->Instancia = $instancia;
		$this->Usuario = $usuario;
		$this->Clave = $clave;
		$this->BaseDatos = $db;
	}
    
    public function BDGestor(){
        if($this->Gestor==1){
            return 'odbc_fetch_array';
        }else{
            return 'mysqli_fetch_array';
        }
    }
    
    public function BDFields(){
        if($this->Gestor==1){
            return array('odbc_num_fields','odbc_field_name');
        }else{
            return array('mysqli_num_fields','mysqli_fetch_field_direct');
        }
    }
    
    public function DBConectar(){
        if($this->Gestor==1){
            $conn = odbc_connect("Driver={SQL Server};Server=".$this->Servidor."\\".$this->Instancia.";Database=".$this->BaseDatos.";", $this->Usuario, $this->Clave);
            if(!($conn)){
                die("Problemas con la conexión"); 
                $this->Conexion = false;
                return false;
            }else{
                $this->Conexion = $conn;
                return true;
            }	
        }else{
            $conn = mysqli_connect($this->Servidor,$this->Usuario,$this->Clave,$this->BaseDatos);
            if(!($conn)){
                die("Problemas con la conexión");
                $this->Conexion = false;
                return false;
            }else{
                $this->Conexion = $conn;
                return true;
            }
        }
	}
    
    public function DBConsulta($sql){
        if($this->Gestor==1){
            $resultado = odbc_exec($this->Conexion, utf8_decode($sql)) or die("<p>".odbc_errormsg());
            return $resultado;
        }else{
            mysqli_set_charset($this->Conexion,"utf8");
            $resultado = mysqli_query($this->Conexion,$sql) or die(mysqli_error($this->Conexion));
            return $resultado;
        }
	}
    
    public function __destruct(){
        if($this->Gestor==1){
            if($this->Conexion){
                odbc_close($this->Conexion);
            }	
        }else{
            if($this->Conexion){
                mysqli_close($this->Conexion);
            }	
        }
	}
    
}

?>