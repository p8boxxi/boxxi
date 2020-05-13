<?php

class Cistella {


    public $vector_id_producte=[];
    public $quantitat_del_producte=[];
    public $quants_productes;
    public $quin_detall;


    public function __construct() {
        $this->quants_productes=0;
        $this->quin_detall=0;
    }


    public function posaProducteCistella($idProd, $quants){

        $this->vector_id_producte[$this->quin_detall]=$idProd;
        $this->quantitat_del_producte[$this->quin_detall]=$quants;
        $this->quants_productes= $this->quants_productes + $quants;
        $this->quin_detall++;

       
    }

    public function mostraProductesCistella(){
       $resultat = [];

        for ($i=0;$i<$this->quin_detall;$i++){
            $resultat["idProducte"][$i]=$this->vector_id_producte[$i];
            $resultat["quantitatProducte"][$i]=$this->quantitat_del_producte[$i];
        }

        if ($resultat!=null){
            return $resultat;
        }else{
            return null;
        }
       
    }




}

?>