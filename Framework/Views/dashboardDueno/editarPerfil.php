<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Perfil</title>
    
    <link href="../styles/dashboardDueño.css" rel="stylesheet" >
    <link href="../styles/editarPerfil.css" rel="stylesheet" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    </head>
  <body>
    <div class="cabecera">
        <div class="logo"><a href='../index.php'><img src="../assets/img/PetHeroLogo.png" height="100"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut"?>">LOG OUT</a></div>
    </div>
        <div class="contenedora-general">
            <div class="contenedora-section">
                <div class="contenedora-edit">
                
                    <form action="" method="post">
                        <div class="contenedora-inputs">
                        <div class="titulo">Editar Perfil</div>
                        <div class="datoregistro">
                                <label for="usuario">Usuario</label>
                                <input type="text"  placeholder="<?php echo $usuario->getUsername();  ?>" name="username" class="" disabled><br>
                        </div>
                        <div class="datoregistro">
                                <label for="nombre">Nombre</label>
                                <input type="text" placeholder="<?php echo $usuario->getNombre(); ?>" name="nombre" class="" disabled><br>
                        </div>
                        <div class="datoregistro">
                                <label for="apellido">Apellido</label>
                                <input type="text" placeholder="<?php echo $usuario->getApellido(); ?>" name="apellido" class="" disabled><br>
                        </div>
                        <div class="datoregistro">
                                <label for="dni">DNI</label>
                                <input type="text" placeholder="<?php echo $usuario->getDni(); ?>" name="dni" class="" disabled><br>
                        </div>
                        <div class="datoregistro">
                                <label for="mail">E-Mail</label>
                                <input type="email" placeholder="<?php echo $usuario->getCorreoelectronico(); ?>" name="mail" class="" disabled><br>
                        </div>
                        <div class="datoregistro">
                                <label for="telefono">Telefono</label>
                                <input type="tel" placeholder="<?php echo $usuario->getTelefono(); ?>" name="telefono" class="" required><br>
                        </div>
                        <div class="datoregistro">
                                <label for="direccion">Direccion</label>
                                <input type="text" placeholder="<?php echo $usuario->getDireccion(); ?>" name="direccion" class="" required><br>
                        </div>
                        <div class="datoregistro">
                                <label for="pass">Contraseña</label>
                                <input type="password" placeholder="<?php echo $usuario->getPassword();?>" name="password" class="" required><br>
                        </div>
                        <div></div>
                        <div class="datoregistro">
                                <label for="re-pass">Repetir Contraseña</label>
                                <input type="password" placeholder="<?php echo $usuario->getPassword();?>" name="rePassword" class="" required><br>
                        </div>
                        
                        <div class="boton">
                            <button type="submit" class="submit"><a href=""><img src="../assets/img/dogboneEdit.png"></a></button>
                        </div>
                  
                    </div>
                </form>
                </div>
                
            </div>
        <aside>
        <div class="contenedora-aside">
                <div class="icono perfil"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/EditarPerfil"?>">Editar Perfil</a></div>
                <div class="icono mascota"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/vistaRegistroMascota" ?>">Registrar Mascota</a></div>
                <div class="icono vermascotas"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/vistaMascotas" ?>">Mis Mascotas</a></div>
                <div class="icono guardian"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/vistaGuardianes" ?>">Guardianes</a></div>
                <div class="icono favoritos"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/vistaFavoritos" ?>">Favoritos</a></div>
                <div class="icono reservas"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "" ?>">Reservas</a></div>
                <div class="icono mensajes"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "" ?>">Mensajes</a></div>                                       
            </div>
        </aside>
    </div>

    <div class="footer-separador"></div>
    <footer>
        <div>Copyright &#169 2022 Pet Hero S.A. es una empresa del grupo Batti's System CO.</div>
        <div><a href="">Terminos y Condiciones</a></div>
        <div><a href="">Aviso de privacidad</a></div>
    </footer>

  </body>
  </html>
