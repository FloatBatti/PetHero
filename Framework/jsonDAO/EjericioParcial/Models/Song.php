<?php

namespace Models;

class Song{

    private $songId;
    private $artistId;
    private $name;
    private $year;


    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getArtistId()
    {
        return $this->artistId;
    }

    public function setArtistId($artistId)
    {
        $this->artistId = $artistId;

        return $this;
    }
 
    public function getSongId()
    {
        return $this->songId;
    }

    public function setSongId($songId)
    {
        $this->songId = $songId;

        return $this;
    }
}



?>