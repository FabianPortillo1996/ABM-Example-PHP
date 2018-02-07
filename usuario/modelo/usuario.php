<?php

require_once('../../core/BaseDatos/BDAbstract.php');

class Usuario extends BDAbstract {
    
    public $nombre;
    public $email;
    protected $telefono;
    private $password;
    
    function __construct(){
        $this->bd_nombre = 'veterinaria';
    }
    
    public function insertar($datos_usuario = array()){
        if(array_key_exists('email', $datos_usuario)){
            $this->obtener($datos_usuario['email']);
            if($datos_usuario != $this.email){
                foreach($datos_usuario as $campo=>$valor){
                    $campo = $valor;
                }
                $this->sentencia = "INSERT INTO usuarios (nombre,email,telefono,password) VALUES ('$nombre', '$email', '$telefono', '$password')";
                $this->ejecutar_sentencia();
            }
        }
    }
    
    
    public function obtener($email = ''){
        if($email != ''){
            $this->sentencia = "SELECT * FROM usuarios WHERE email = '$email'";
            $this->ejecutar_sentencia();
        }
        if(count($this->filas) == 1){
            foreach($this->filas[0] as $propiedad => $valor){
                $this->$propiedad = $valor;
            }
        }
    }
    
    
    public function actualizar($datos_usuario = array()){
        foreach($datos_usuario as $campo => $valor){
            $campo = $valor;
        }
        $this->sentencia = "UPDATE usuarios SET nombre='$nombre',apellido='$apellido',telefono='$telefono' WHERE email='$email'";
        $this->ejecutar_sentencia();
    }
    
    
    public function eliminar($email = ''){
        $this->sentencia = "DELETE FROM usuarios WHERE email='$email'";
        $this->ejecutar_sentencia();
    }
}
?>
