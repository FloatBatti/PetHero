<?php
require_once("../Config/Autoload.php");
require_once("../Config/Config.php");

use Config\Autoload as Autoload;
use Config\Request as Request;
use Config\Router as Router;

Autoload::start();

Router::Route(new Request());

use jsonDAO\MascotasDAO as MascotasDAO;
$mascotas= new MascotasDAO();
$lista=$mascotas->getAll();
use jsonDAO\DueñosDAO as DueñosDAO;
$dueños= new DueñosDAO();
$listaDueños=$dueños->getAll();
//var_dump($listaDueños);
use jsonDAO\GuardianesDAO as GuardianesDAO;
$guardianes=new GuardianesDAO();
$listaGuardianes=$guardianes->getAll();
//var_dump($listaGuardianes);
use jsonDAO\ReviewsDAO as ReviewsDAO;
$reviews=new ReviewsDAO();
$listaReviews=$reviews->getAll();
//var_dump($listaReviews);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PET HERO</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- COSTUM CSS -->
    <link rel="stylesheet" href="../styles/styleLanding.css">

  </head>
  <body>

    

    <!-- HEADER -->
    <header class="main-header">
        
        <div class="background-overley text-white py-2">
            
            <div class="container">

                <div class="row">

                    <div class="col-auto">
                        <h1>PetHero</h1>
                    </div>

                </div>

                <div class="row">

                    <div class="col-auto login-box">
                      
                        <form action="" method="POST" class="form-log">
        
                          <h1 id="title-log">Login</h1>
                    
                          <div class="inputContainer">
                            <input type="text" class="input-log" placeholder="a">
                            <label for="username" class="label-log">Username</label>
                          </div>
                    
                          <div class="inputContainer">
                            <input type="password" class="input-log" placeholder="b">
                            <label for="password" class="label-log">Password</label>
                          </div>
                    
                          <div class="d-grid gap-2 col-6 mx-auto">
                            <input type="submit" class="btn btn-outline-danger btn-md" value="Enter">
                          </div>
                          
        
                          <a href="regUsuario.php" id="register">No tienes cuenta? Registrate</a>
        
                        </form>
        
                    </div>

                </div>

            </div>
        </div>

    </header>

    <!-- STEPS -->
    <div class="accordion" id="accordionPanelsStayOpenExample">

      <div class="container py-3">

        <strong><p id="steps-title">¿Cómo funciona Pet Hero?</p></strong>

        <div class="row">

          <div class="col-md-12 step-items">
            <div class="circulo">1</div>
            <span class="step-title">Registrate</span></strong>
            <p class="step-element">Registrate a vos ya tus mascotas.</p>
          </div>

          <div class="col-md-12 step-items">
            <div class="circulo">2</div>
            <span class="step-title">Buscá un guardían.</span></strong>
            <img class="step-element" src="https://i.ytimg.com/vi/7OImaOuL-AA/maxresdefault.jpg" alt="foto-ejemplo" width="500px" style="display: block;">
          </div>

          <div class="col-md-12 step-items">
            <div class="circulo">3</div>
            <span class="step-title">Reserva</span></strong>
            <p class="step-element">Reserva un turno con el guardian de tu agrago y espera a que confirme. Una vez hecho eso, podes pagar.</p>
          </div>

          <div class="col-md-12 step-items">
            <div class="circulo">4</div>
            <span class="step-title">Disfruta el servicio de Pet Hero</span></strong>
            <p class="step-element">Relajate y deja tu mascota en las mejores manos</p>
          </div>

        </div>
       

      </div>
      
    </div>
    



    <!--BOOTSTRAP JAVASCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

  </body>
</html>