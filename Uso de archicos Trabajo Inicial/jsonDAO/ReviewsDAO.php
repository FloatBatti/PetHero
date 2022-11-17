<?php
    namespace jsonDAO;

    use Models\Review as Review;

    class ReviewsDAO implements InterfaceDAO
    {
        private $listaReviews = array();


        public function GetAll(){
            $this->RetrieveData();
            return $this->listaReviews;
            
        }
        public function RetrieveData(){

            $this->listaReviews = array();

        $jsonContent = file_get_contents("../Data/Reviews.json");

        $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, True) : array();

        foreach ($arrayToDecode as $valuesArray){

            $review = new Review();

            $review->setId($valuesArray["id"]);
            $review->setFecha($valuesArray["fecha"]);
            $review->setAutorID($valuesArray["autorID"]);
            $review->setUserID($valuesArray["userID"]);
            $review->setCalificacion($valuesArray["calificacion"]);
            $review->setComentario($valuesArray["comentario"]);
            
            array_push($this->listaReviews, $review);

        }   
        }

        public function Add($review){
            $this->RetrieveData();
            
            array_push($this->listaReviews, $review);

            $this->SaveData();
        }
        public function SaveData(){
            $arrayToEncode = array();

        foreach($this->listaReviews as $review)
        {
            
            $valuesArray["id"] = $review->getId();
            $valuesArray["fecha"] = $review->getFecha();
            $valuesArray["autorID"] = $review->getAutorID();
            $valuesArray["userID"] = $review->getUserID();
            $valuesArray["calificacion"] = $review->getCalificacion();
            $valuesArray["comentario"] = $review->getComentario();
            


            array_push($arrayToEncode, $valuesArray);
        }

        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents("../Data/Reviews.json", $jsonContent);
            
        }
    }
?>    