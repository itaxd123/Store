
    <!-- Barra Lateral -->
    <aside id="lateral">
            <div id="login"class="block_aside">
            <?php if(!isset($_SESSION['identity'])):?>
                <h3>Entrar a la web</h3>
                <form action="<?= base_url?>usuario/login" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email"></input>
                    <label for="password"> Password</label>
                    <input type="password" name="password"></input>
                    <input type="submit" value="Enviar"></input>
                </form>
                <?php else: ?>
                    <h3><?php echo $_SESSION['identity']->nombre." ".$_SESSION['identity']->apellidos;?></h3>
                    <?php endif; ?>
                <ul>
                <?php if(isset($_SESSION['admin'])):?>
                <li><a href="#"> Gestionar Categorias</a></li>
                <li><a href="#"> Gestionar Productos</a></li>
                 <li><a href="#"> Gestionar Pedidos</a></li>
                 <?php endif; ?>
                        
            <?php if(isset($_SESSION['identity'])):?>

            <li><a href="#"> Mis pedidos</a></li>
            <li> <a href="<?=base_url?>usuario/logout"> Cerrar sesión</a></li>
            <?php endif; ?>
            </ul>
        </div>
        </aside>
    </div>
    <!-- Contenido Central -->
    <div id="central">
        