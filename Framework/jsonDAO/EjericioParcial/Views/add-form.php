<?php
     include('header.php');
     include('nav.php');

     use jsonDAO\ArtistDAO as ArtistDAO;
     
     $artistDAO = new ArtistDAO();
     $listArtist = $artistDAO->getAll();

?>

<main class="py-5">
     <section id="listado" class="mb-5">
          <form action="../Controllers/SongController/add" method="POST">
               <div class="container">
                    <h3 class="mb-3">Agregar Canción</h3>
                    
                    <div class="mb-3">
                         <label for="">Id</label>
                         <input type="number" name="" class="form-control form-control-ml" required value="">
                    </div>

                    <div class="mb-3">
                         <label for="">Nombre</label>
                         <input type="text" name="" class="form-control form-control-ml" required value="">
                    </div>

                    <div class="mb-3" >
                         <label for="">Artista</label>

                         <div class="form-group">
                              <select name="" class="custom-select" required>
                                   <?php foreach($listArtist as $artist){
                                        
                                        if ($artist->isActive()){
                                             
                                   ?>

                                   <option value="<?php $artist->getId();?>">
                                   
                                   <?php echo $artist->getName();?>

                                   </option>

                                   <?php }?>
                                   <?php }?>
                              </select>
                         </div>
                    </div>

                    <div class="mb-3">
                         <label for="">Año</label>
                         <input type="number" name="" class="form-control form-control-ml" required value="">
                    </div>

                    <div class="mb-3">
                         <button type="submit" name="" class="btn btn-primary ml-auto d-block">Agregar</button>
                    </div>
               </div>
          </form>
     </section>
</main>

<?php include('footer.php'); ?>
