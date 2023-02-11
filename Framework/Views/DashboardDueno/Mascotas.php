<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mis Mascotas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/verMascota.css" rel="stylesheet">
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
            <div class="drop-Mascota">
                <div class="header-Mascotas">Mis Mascotas</div>

                <div class="conteiner-list">

                    <?php foreach ($listaMascotas as $mascota) {?>
                            
                        <div class="mascotita">
                                <div class="col nombre"><?php echo $mascota->getNombre() ?></div>
                                <div class="col"><a href="../Mascotas/VerPerfilMascota?id=<?php echo $mascota->getId();?>"><img src="../assets/img/verperfil.png" width="35px"></a></div>                         
                                <div class="col borrar"><a href="../Mascotas/RemoverMascota?id=<?php echo $mascota->getId();?>"><img src="../assets/img/delete.png" width="35px"></a></div>
                            </div>  
                                   
                    <?php } ?>

                </div>

            </div>
        </div>
        <aside>
        <?php require_once(VIEWS_PATH . "dashboardDueno/MenuDash.php"); ?>
        </aside>
    </div>
</body>

</html>