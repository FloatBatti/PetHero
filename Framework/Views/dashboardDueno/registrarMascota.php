<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Mascota</title>
    
    <link href="../../styles/dashboardDueño.css" rel="stylesheet" >
    <link href="../../styles/registroMascota.css" rel="stylesheet" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    </head>
  <body>
    <div class="cabecera">
        <div class="logo"><a href='../index.php'><img src="../../img/PetHeroLogo.png" height="100"></a>
        </div>
        <div>Faqs</div>
    </div>
        <div class="contenedora-general">
            <div class="contenedora-section">
                <div class="contenedora-mascota">
                    <form action="<?php echo FRONT_ROOT ?>Duenos/Add" method="post">
                        <div class="contenedora-inputs">
                            <div class="dato-registro">
                                <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="" required><br>
                            </div>
                            <div class="dato-registro">
                                <label for="raza">Raza</label>
                                    <select name="raza">
                                        <option value="Caniche">Caniche</option>
                                        <option value="Pequines" selected>Pequines</option>
                                        <option value="Labrador retriever">Labrador retriever</option>
                                        <option value="Bulldog francés">Bulldog francés</option>
                                        <option value="Golden retriever">Golden retriever</option>
                                        <option value="Pastor alemán">Pastor alemán</option>
                                        <option value="Bulldog">Bulldog</option>
                                        <option value="Beagle">Beagle</option>
                                        <option value="Rottweiler">Rottweiler</option>
                                        <option value="Braco alemán de pelo corto">Braco alemán de pelo corto</option>
                                        <option value="Dachshund(mini Salchicha)">Dachshund(mini Salchicha)</option>
                                        <option value="Sin raza">Sin raza</option>
                                    </select>
                            </div>
                            <div class="dato-registro">
                                <label for="peso">Peso en kgs</label>
                                    <input type="number" name="peso"><br>
                            </div>
                                <div class="dato-registro">    
                                <label for="dni">Foto URL</label>
                                    <input type="text" name="fotoUrl" class="" required><br>
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
                                <button type="submit" class="submit"><a href=""><img src="../../img/dogbone.png"></a></button>
                            </div>
                        </div>
                        
                        </form>        
                    </div>
                
            </div>
        <aside>
            <div class="contenedora-aside">
            <div class="icono perfil"></div><div class="opcion">Ver Perfil</div>
            <div class="icono mascota"></div><div class="opcion">Registrar Mascota</div>
            <div class="icono vermascotas"></div><div class="opcion" >Ver Mascota</div>
            <div class="icono guardian"></div><div class="opcion">Ver Guardianes</div>
            <div class="icono favoritos"></div><div class="opcion">Ver Guardianes Favoritos</div>
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

