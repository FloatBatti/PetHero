<?php
     include('header.php');
     include('nav.php');

     use jsonDAO\SongDAO as SongDAO;
     use jsonDAO\ArtistDAO as ArtistDAO;
     use Models\Song as Song;

     $songDAO = new SongDAO();
     $songList = $songDAO->getAll();

     $artistDAO = new ArtistDAO();

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Canciones</h2>

               <table class="table bg-light">
                    <thead class="bg-dark text-white">
                         <th>Id</th>
                         <th>Nombre</th>
                         <th>Artista</th>
                         <th>Año</th>
                    </thead>
                    <tbody>

                         <?php foreach ($songList as $song){?>

                         <tr>
                              <th><?php echo $song->getSongId();?></th>
                              <th><?php echo $song->getName();?></th>
                              <th><?php 
                              
                              $artist = $artistDAO->returnById($song->getArtistId());
                              
                              echo $artist->getName();
                              
                              ?></th>

                              <th><?php echo $song->getYear();?></th>
                         </tr>
                         
                         <?php }?>
                         
                    </tbody>
               </table>
          </div>
     </section>
</main>

<?php include('footer.php'); ?>
