<?php
class Conexion{
    private $mysql;
    private $bdName;
    private $user;
    private $pass;

    public function __construct($bdName, $user, $pass){
        $this->bdName = $bdName;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function conectar(){
        $this->mysql = new mysqli(
            "localhost",
            $this->user,
            $this->pass,
            $this->bdName
        );
        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }
    }

    public function ejecutar($sql){
        return $this->mysql->query($sql);
    }

    public function desconectar(){
        $this->mysql->close();
    }
}
?>
