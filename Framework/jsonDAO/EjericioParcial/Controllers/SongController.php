<?php 

namespace Controllers;

use jsonDAO\SongDAO;
use Models\Song as Song;

class SongController{

    private $songDAO;

    public function __construct()
    {
        $this->songDAO = new SongDAO();
    }

    public function checkSong($songName){

        $listSongs = $this->songDAO->getAll();

        $check = false;

        foreach($listSongs as $song){

            if($song->getName() == $songName){

                $check = true;
            }

        }

        return $check;
    }

    public function add($id, $nombre, $artistId, $year){

        if(!($this->checkSong($nombre))){

            $song = new Song();
            $song->setSongId($id);
            $song->setName($nombre);
            $song->setArtistId($artistId);
            $song->setYear($year);

            $this->songDAO->add($song);
            header("location:../Views/list.php");
        }
        else{

            echo "<script> if(confirm('La cancion ya existe')); </script>";
        }   
    }


}


?>