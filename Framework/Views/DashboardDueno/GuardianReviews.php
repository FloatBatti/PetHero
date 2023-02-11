<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reviews del Guardian</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="../../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../../styles/guardianListaReviews.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="cabecera">
        <div class="logo"><a href='<?php echo FRONT_ROOT . "Home/LogOut"?>'><img src="../../assets/img/PetHeroLogo.png" height="50"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut"?>">LOG OUT</a></div>
    </div>
    <div class="contenedora-general">
        <div class="contenedora-section">
           
            <div class="lista-reviews">
                <div class="titulo"><h2>Reviews</h2></div>
                <div class="rotulo">
                    <div class="campo fecha">Fecha</div>
                    <div class="campo usuario">Usuario</div>
                    <div class="campo calificacion">Calificacion</div>
                    <div class="campo comentario">Comentario</div>
                    
                </div>
                <div class="scrolleable">
                <div class="reseña">
                    <div class="campo fecha">20-11-2022</div>
                    <div class="campo usuario">Agustin</div>
                    <div class="campo calificacion"><img src="../../assets/img/1_stars.png"></div>
                    <div class="campo comentario"><div class="contenido">El guardian es trolo pero cuida bien a los michis</div></div>
                </div>
                
            </div>
            </div>
            
        </div>
        
        <aside>                          
        <?php require_once(VIEWS_PATH . "dashboardDueno/MenuDash.php"); ?>
        </aside>
    </div>

</body>

</html>