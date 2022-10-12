<?php 

namespace jsonDAO;

use Models\Artist;

class ArtistDAO implements IDAO{

    private $artistList = array();

    public function getAll(){

        $this->retrieveData();

        return $this->artistList;

    }

    public function add($object){

        $this->retrieveData();

        array_push($this->artistList , $object);

        $this->saveData();


    }

    public function returnById($id){

        $this->retrieveData();

        $artistId = null;

        foreach($this->artistList as $artist){

            if ($artist->getId() == $id){

                $artistId = $artist;

            }
        }

        return $artistId;

    }

    public function retrieveData(){

        $this->artistList = array();

            if(file_exists('../Data/Artists.json'))
            {
                $jsonContent = file_get_contents('../Data/Artists.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $artist = new Artist();
                    $artist->setId($valuesArray["artistId"]);
                    $artist->setName($valuesArray["name"]);
                    $artist->setActive($valuesArray["active"]);

                    array_push($this->artistList, $artist);
                }
            }

    }

    public function saveData(){

        $arrayToEncode = array();

        foreach($this->artistList as $artist)
        {
            $valuesArray["artistId"] = $artist->getArtistId();
            $valuesArray["name"] = $artist->getName();
            $valuesArray["active"] = $artist->isActive();

            array_push($arrayToEncode, $valuesArray);
        }

        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents('Data/Artists.json', $jsonContent);

    }




}



?>