<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Perfil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <link href="../styles/dashboardDueño.css" rel="stylesheet" >
    <link href="../styles/editarPerfil.css" rel="stylesheet" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    </head>
  <body>
    <div class="cabecera">
        <div class="logo"><a href='<?php echo FRONT_ROOT . "Home/LogOut"?>'><img src="../assets/img/PetHeroLogo.png" height="50"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut"?>">LOG OUT</a></div>
    </div>
        <div class="contenedora-general">
            <div class="contenedora-section">
                <div class="contenedora-edit">
                
                    <form action="<?php echo FRONT_ROOT . "Usuario/ActualizarDatos"?>" method="post">
                    
                        <div class="contenedora-inputs">
                        <div class="titulo">Editar Perfil</div>
                        <div class="datoregistro">
                                <label for="usuario">Usuario</label>
                                <input type="text"  placeholder="" name="username" class="protegido" value="<?php echo $usuario->getUsername();  ?>" disabled><br>
                        </div>
                        <div class="datoregistro">
                                <label for="nombre">Nombre</label>
                                <input type="text" placeholder="" name="nombre" class="protegido" value="<?php echo $usuario->getNombre(); ?>" disabled><br>
                        </div>
                        <div class="datoregistro">
                                <label for="apellido">Apellido</label>
                                <input type="text" placeholder="" name="apellido" class="protegido" value="<?php echo $usuario->getApellido(); ?>" disabled><br>
                        </div>
                        <div class="datoregistro">
                                <label for="dni">DNI</label>
                                <input type="text" placeholder="" name="dni" class="protegido" value="<?php echo $usuario->getDni(); ?>" disabled><br>
                        </div>
                        <div class="datoregistro">
                                <label for="mail">E-Mail</label>
                                <input type="email" placeholder="" name="mail" class="protegido" value="<?php echo $usuario->getCorreoelectronico(); ?>" disabled><br>
                        </div>
                        <div class="datoregistro">
                                <label for="telefono">Telefono</label>
                                <input type="tel" placeholder="" name="telefono" class="" value="<?php echo $usuario->getTelefono(); ?>" required><br>
                        </div>
                        <div class="datoregistro">
                                <label for="direccion">Direccion</label>
                                <input type="text" placeholder="" name="direccion" class=""  value="<?php echo $usuario->getDireccion(); ?>" required><br>
                        </div>
                        <div class="datoregistro">
                                <label for="pass">Contraseña</label>
                                <input type="password" placeholder="" name="password" class=""  value="<?php echo $usuario->getPassword();?>" required><br>
                        </div>
                        <div></div>
                        <div class="datoregistro">
                                <label for="re-pass">Repetir Contraseña</label>
                                <input type="password" placeholder="" name="rePassword" class="" value="<?php echo $usuario->getPassword();?>" required><br>
                        </div>
                        
                        <div class="boton">
                            <button type="submit" class="submit"><img src="../assets/img/dogboneEdit.png"></button>
                        </div>
                  
                    </div>
                </form>
                </div>
                
            </div>
        <aside>
        <?php require_once(VIEWS_PATH. "dashboardDueno/MenuDash.php");?>
        </aside>
    </div>

  </body>
  </html>
