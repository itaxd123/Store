<?php
require_once 'models/usuario.php';

class usuarioController{

    public function index(){
        echo "Controlador Usuarios, Accion index";
    }

    public function registro(){
        require_once 'views/usuario/registro.php';
    }
    public function validator($valor){
         return $valor = isset($valor) ? $valor : false;
    }
    public function save(){
        
        if(isset($_POST)){
            $nombre = $this->validator ($_POST['nombre']);
            $apellidos = $this->validator ($_POST['apellidos']);
            $email = $this->validator ($_POST['email']);
            $contrasena = $this->validator ($_POST['contrasena']);
            if($nombre && $apellidos && $email && $contrasena){
                $usuario = new Usuario;
                $usuario->setNombres($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($contrasena);
                $save = $usuario->save();
                echo $save ? $_SESSION['register'] = "complete" : $_SESSION['register'] = "failed";
            }else{
                $_SESSION['register'] = "failed";
            
            }
        }else{
            $_SESSION['register'] = "failed";
        }
        header("Location: ".base_url.'usuario/registro');
    }

    public function login(){
        if(isset($_POST)){
        $usuario = new Usuario();
        $usuario->setEmail($_POST['email']);
        $usuario->setPassword($_POST['password']);
        $identity = $usuario->login();
        if ($identity && is_object($identity)){
            $_SESSION['identity'] = $identity;

            if($identity->role == 'admin'){
                $_SESSION['admin'] = true;
            }
        }else {
            $_SESSION['error_login']= 'Identificación Fallida';
             }
        }
        header("Location:".base_url);

    }
    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        header("Location:".base_url);
    }

}