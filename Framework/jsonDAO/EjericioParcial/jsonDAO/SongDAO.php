<?php 

namespace jsonDAO;

use Models\Song;

class SongDAO implements IDAO{

    private $songsList = array();

    public function getAll(){

        $this->retrieveData();

        return $this->songsList;

    }

    

    public function add($song){

        $this->retrieveData();

        array_push($this->songsList , $song);

        $this->saveData();


    }

    public function retrieveData(){

        $this->songsList = array();

            if(file_exists('../Data/Songs.json'))
            {
                $jsonContent = file_get_contents('../Data/Songs.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $song = new Song();
                    $song->setsongId($valuesArray["songId"]);
                    $song->setArtistId($valuesArray["artistId"]);
                    $song->setName($valuesArray["name"]);
                    $song->setYear($valuesArray["year"]);

                    array_push($this->songsList, $song);
                }
            }

    }

    public function saveData(){

        $arrayToEncode = array();

        foreach($this->songsList as $song)
        {
            $valuesArray["songId"] = $song->getSongId();
            $valuesArray["artistId"] = $song->getArtistId();
            $valuesArray["name"] = $song->getName();
            $valuesArray["year"] = $song->getYear();

            array_push($arrayToEncode, $valuesArray);
        }

        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents('Data/song.json', $jsonContent);

    }

}

?>