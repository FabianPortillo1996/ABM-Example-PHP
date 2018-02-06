<?php
abstract class BDAbstract{
    
    //Propiedades unicas de la clase
    private static $bd_url = 'bd_url';
    private static $bd_usuario = 'bd_usuario';
    private static $bd_pass = 'bd_password';
    private $conexion;
    
    //Propiedades que seran reescritas por clases hijas
    protected $bd_nombre;
    protected $filas = array();
    protected $sentencia;
    
    abstract function insertar();
    abstract function obtener();
    abstract function actualizar();
    abstract function eliminar();
    
    private function empezar_conexion(){
        $this->conexion = new mysqli(self::bd_url, self::bd_usuario, self::bd_pass, $this->bd_nombre);
    }
    
    private function cerrar_conexion(){
        $this->conexion->close();
    }
    
    protected function ejecutar_sentencia(){
        $this->empezar_conexion();
        $this->conexion->query($this->sentencia);
        $this->cerrar_conexion();
    }
    
    protected function obtener_datos(){
        $this->empezar_conexion();
        $resultados = $this->conexion->query($this->sentencia);
        while($this->filas = $resultados->fetch_assoc());
        $this->cerrar_conexion();
    }
}
?>
