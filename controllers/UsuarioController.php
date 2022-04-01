<?php
require_once 'models/usuario.php';

class usuarioController{

    public function index(){
        echo "Controlador Usuarios, Accion index";
    }

    public function registro(){
        require_once 'views/usuario/registro.php';
    }
    public function save(){
        if(isset($_POST)){
            $usuario = new Usuario;
            $usuario->setNombres($_POST['nombre']);
            $usuario->setApellidos($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['contrasena']);
            $save = $usuario->save();
            echo $save ? $_SESSION['register'] = "complete" : $_SESSION['register'] = "failed";
        }else{
            $_SESSION['register'] = "complete";
        }
        header("Location: ".base_url.'usuario/registro');
    }

}