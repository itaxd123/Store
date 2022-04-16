<h1>Registrarse</h1>
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
        <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class="alert_red">Registro fallido</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>
<form action="<?=base_url?>usuario/save" method="POST">
    <label for="nombre">Nombre</label>
    <!-- <input type="text" name="nombre" required/> -->
    <input type="text" name="nombre" />

    <label for="apellidos">Apellidos</label>
    <!-- <input type="text" name="apellidos" required/> -->
    <input type="text" name="apellidos" />

    <label for="email">Email</label>
    <!-- <input type="email" name="email" required/> -->
    <input type="email" name="email" />
    
    <label for="contrasena">Contraseña</label>
    <!-- <input type="password" name="contrasena" required/> -->
    <input type="password" name="contrasena" />

    <input type="submit" value="Registrarse"/>
</form>