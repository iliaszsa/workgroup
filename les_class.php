<?php

use function PHPSTORM_META\type;

    class produits {

        public string $nom_pro;
        public string $categ_pro;
        public float $stock;
        public string $description;
        public float $prixHT;
        public float $prixTVA;
        public float $prixTTC;

        public function __construct(string $nom, string $categorie, string $descript, float $stock, float $prixUnit, float $prixHrT, float $prixTvA)
        {
            $this -> nom_pro    = $nom;
            $this -> categ_pro  = $categorie;
            $this -> stock      = $stock;
            $this -> description= $descript;

            $this -> prixHT     = $prixUnit;
            $this -> prixHT     = $prixHrT;
            $this -> prixTVA    = $prixTvA;

            $this -> prixTTC    = $this -> prixHT +  ( $this -> prixHT * $this -> prixTVA);
        }


    }




?>