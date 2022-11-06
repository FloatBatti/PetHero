<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Mascota</title>
    
    <link href="../styles/dashboardDueño.css" rel="stylesheet" >
    <link href="../styles/registroMascota.css" rel="stylesheet" >
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
                <div class="contenedora-mascota">
                    <form action="<?php echo FRONT_ROOT ?>Duenos/AddMascota" method="post">
                        <div class="contenedora-inputs">
                            <div class="dato-registro">
                                <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="" required><br>
                            </div>
                            <div class="TT">
                                
                                <div><label for="perro"><input type="radio" id="perro" class="radio" name="especie">Perro</label></div>
                                <div><label for="gato"><input type="radio" id="gato" class="radio" name="especie">Gato</label></div>
                                         
                                
                            </div>
                            <div class="dato-registro">
                                <label for="raza">Raza</label>
                                    <select name="raza">
                                        <option value="Caniche">Caniche</option>
                                        <option value="Pequines" >Pequines</option>
                                        <option value="Labrador retriever">Labrador retriever</option>
                                        <option value="Bulldog francés">Bulldog francés</option>
                                        <option value="Golden retriever">Golden retriever</option>
                                        <option value="Pastor alemán">Pastor alemán</option>
                                        <option value="Bulldog">Bulldog</option>
                                        <option value="Beagle">Beagle</option>
                                        <option value="Rottweiler">Rottweiler</option>
                                        <option value="Braco alemán de pelo corto">Braco alemán de pelo corto</option>
                                        <option value="Dachshund(mini Salchicha)">Dachshund(mini Salchicha)</option>
                                        <option value="Sin raza"selected>Sin raza</option>
                                    </select>
                            </div>
                            <div class="TT">
                                <div></div>
                                    <label for="P"><input type="radio" id="P" name="tamano" class="radio">Pequeño</label>
                                    <label for="M"><input type="radio" id="M" name="tamano" class="radio" selected >Mediano</label> 
                                    <label for="G"><input type="radio" id="G" name="tamano" class="radio">Grande</label>
                            </div>
                                <div class="dato-registro">    
                                <label for="fotoUrl">Foto URL</label>
                                    <input type="file" name="fotoUrl" class="" required><br>
                            </div>
                                <div class="dato-registro">
                                    <label for="vacunacion">Foto Plan de Vacunacion</label>
                                <input type="text" name="urlvacunacion" class="" required><br>
                            </div>
                                                 
                                <div class="dato-registro">
                                    <label for="video">Video (opcional)</label>
                                <input type="text" name="urlVideo" class=""><br>
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