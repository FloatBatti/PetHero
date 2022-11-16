<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/alert.css" rel="stylesheet">
    <link href="../styles/cupon.css" rel="stylesheet">
    <link href="../styles/alert.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="cabecera">
        <div class="logo"><a href='<?php echo FRONT_ROOT . "Home/LogOut" ?>'><img src="../assets/img/PetHeroLogo.png" height="100"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut" ?>">LOG OUT</a></div>
    </div>
    <div class="contenedora-general">
        <div class="contenedora-section">
            <div class="cupon">
                <div class="datos-reserva">
                    <div class="datofactura">
                        <div class="ask">Fecha de reserva</div><div class="return"><?php echo $reserva->getFecha(); ?><hr></div>
                        </div>
                    <div class="datofactura">
                    <div class="ask">Id de Reserva</div><div class="return"><?php echo $reserva->getId(); ?><hr></div>
                       </div>
                        <div class="datofactura fechas">
                        <div class="inner fechas"><div class="inner ask">Fecha Inicio</div><div class="return inner"><?php echo $reserva->getFechaInicio();?></div></div>
                        <div class="inner fechas"><div div class="inner ask">Fecha Fin</div><div class="return inner"><?php echo $reserva->getFechaFin();?><hr></div></div>
                        </div>
                        
                    <div class="datofactura">
                            <div class="ask">Guardian</div><div class="return"><?php echo $guardian->getUsername();?><hr></div>
                    </div>     
                        <div class="datofactura">
                            <div class="ask">Mascota</div><div class="return"><?php echo $mascota->getNombre();?><hr></div>
                        </div>    
                        <div class="datofactura">
                            <div class="ask">Costo</div><div class="return"><?php echo $reserva->getCosto(); ?><hr></div>
                        </div>
                        <div class="total">
                        <div class="ask">Total: </div><div class="costo-total">$<?php echo $reserva->getCosto();?>.- </div> 
                    </div>
                </div>
              
                <div class="datos-tarjeta">
                    <form action="" method="" >
                        <div class="titulo"><div>PetHero Payment</div></div>
                        <div class="campo tc"><div class="campo">Tarjeta</div>
                            <select name="tc" class="tarjeta">
                            <option value="MasterCard" clas="master">MasterCard</option>
                            <option value="Visa" class="visa">Visa</option>
                        </select>
                        </div>
                        
                        <div class="campo">Numero de Tarjeta<br>
                            <input type="number" class="data colorin" maxlength="16">
                        </div>
                        <div class="campo">Titular de la Tarjeta
                            <div>Nombre<br><input type="text" class="data"></div>
                            <div>Apellido<br><input type="text" class="data "></div>
                        </div>
                        <div>
                            <div class="campo">
                                Expires<br>
                                <input type="month" class="venc">
                            </div>
                            <div class="">CVC<br>
                                <input type="number" class="cod " maxlength="3">
                            </div>
                        </div>
                        <div class="boton">
                            <button type="submit" class="enviar">Pagar</button>
                        </div>
                    </form>
                </div>    
            </div>
            <div> 
           <?php if (isset($alert)) { ?>
                    <div class="alert-<?php echo $_GET["tipo"] ?>"><?php echo $_GET["alert"] ?></div>
                    
                <?php } ?>
            </div>
        </div>
        <aside>
          <?php require_once(VIEWS_PATH . "dashboardDueno/menuDash.php"); ?>
          
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