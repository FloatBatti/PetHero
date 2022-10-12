<?php 

namespace jsonDAO;


interface IDAO{

    public function getAll();
    public function add($objeto);
    public function retrieveData();
    public function saveData();

}



?>