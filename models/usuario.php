<?php

class usuario{

    private $id;
    private $nombres;
    private $apellidos;
    private $email;
    private $password;
    private $imagen;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombres
     */ 
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set the value of nombres
     *
     * @return  self
     */ 
    public function setNombres($nombres)
    {
        $this->nombres = $this->db->real_escape_string($nombres);
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password),PASSWORD_BCRYPT, ['cost'=>4]);
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen =  $this->db->real_escape_string($imagen);
    }

    public function save(){
        $sql= "INSERT INTO usuarios VALUES (NULL, 
                '{$this->getNombres()}', 
                '{$this->getApellidos()}',
                '{$this->getEmail()}',
                '{$this->getPassword()}',
                'user',NULL)";
       $register = $this->db->query($sql);

       return $register ? true : false;
    }

    public function login (){
        $result =false;
        $email = $this->email;
        $password= $this->password;
        //Comprobar si el usuario existe
        $sql = "SELECT * FROM USUARIOS WHERE email = '$email'";
        $login = $this->db->query($sql);

        
        if($login && $login->num_rows == 1 ){
            $usuario = $login->fetch_object();
            
            //Verificar la contraseña
            $verify = password_verify($password, $usuario->password);
            
            $verify ? $result = $usuario : false;
        }
        return $result;
    }
    
}