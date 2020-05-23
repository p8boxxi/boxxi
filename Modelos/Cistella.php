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

        public function treuProducteCistella($idProd){

        $copia = new Cistella();

        $copia->vector_id_producte=[];
        $copia->quantitat_del_producte=[];
        $copia->quants_productes=0;
        $copia->quin_detall=0;

        
        $posicio = 0;
        foreach($_SESSION["cistella"]->vector_id_producte as $id){  
            
            if ($id != $idProd){
                $copia->vector_id_producte[$copia->quin_detall]=$id; 
                $copia->quantitat_del_producte[$copia->quin_detall]=$this->quantitat_del_producte[$posicio];
                $copia->quants_productes = $copia->quants_productes + $this->quantitat_del_producte[$posicio];
                $copia->quin_detall++;
            }
            $posicio++;
        }
    
        $_SESSION["cistella"] = clone $copia;
       

    }




}

?>