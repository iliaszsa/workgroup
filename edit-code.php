<?php

    //FORMULAIRE DE CREATION D'ANNONCE ENCHERE
    elseif (isset($_POST["categorie"], $_POST["prixannonce"]) ) {
        
        $anCategorie            = htmlspecialchars( strtoupper( trim( $_POST["categorie"]) ) );
        $anDesign               = htmlspecialchars( ucwords( trim( $_POST["designation"]) ) );
        $anPrix                 = htmlspecialchars( trim( $_POST["prixannonce"]) );
        $anModele               = htmlspecialchars( trim( $_POST["modele"]) );
        $anMarque               = htmlspecialchars( trim( $_POST["marque"]) );
        $anPuissance            = htmlspecialchars( trim( $_POST["puissance"]) );
        $anAnnee                = htmlspecialchars( trim( $_POST["anneanc"]) );


        $datEdition             = mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y'));//Date d'édition (numérique)
        $incLogin               = strtoupper(substr($anCategorie, 0, 1).substr($anDesign, 0, 1).strlen($anCategorie).strlen($anDesign));
        $statutReg              = "EN COURS";


        //Vérification de la bonne saisie du formulaire
        if ($anCategorie        == "CatNulle" || strlen($anCategorie) < 3) {
            $error_nom          =   'Vous devez sélectionner <b class="text-uppercase text-danger">une catégorie</b> '. 
                                    'de votre annonce, veuillez le compléter s\'il vous plaît !';
        }

        elseif ($anDesign       == "" || strlen($anDesign) < 3) {
            $error_prenom       =   'Veuillez désigner cette <b class="text-uppercase text-danger">annonce</b> '. 
                                    'à un mémo, juste un mot pour distinguer cette annonce aux autres !';
        }

        elseif ($anPrix         == "" || strlen($anPrix) < 20) {
            $error_email        =   'Vous devez renseigner <b class="text-uppercase text-danger">le prix</b> '. 
                                    'de votre annonce, soit une valeur supérieure ou égale à 20 €, compléter s\'il vous plaît !';
        }
        
        elseif ($anAnnee        == "anneanc" ) {
            $error_email        =   'Veuillez sélectionner <b class="text-uppercase text-danger">l\'année de la mise en circulation</b> '. 
                                    'de votre annonce, compléter le champ s\'il vous plaît !';
        }

        else {

            if ($anModele       == "") {
                $anModele       =  "NO RENSEIGNEE !";
            }

            if ($anMarque       == "") {
                $anMarque       =  "NO RENSEIGNEE !";
            }

            if ($anPuissance    == "") {
                $anPuissance    =  0;
            }

            if (!isset($anMessage) || $anMessage   == "") {
                $anMessage      =  "Aucun message lié à cette annonce !";
            }

            
            if (isset($_SESSION["userId"])) {
                
                $clepasse           = $_SESSION['userId'];
                $dateDoublon        = mktime(date('H'), date('i'), date('s'), date('m') + 1, date('d'), date('Y'));//Date d'édition (numérique)

                // Préparation d'une requêtte d'insertion des nouvelles données
                $reqAdd             = ("INSERT INTO `annonces` (    `ref`,
                                                                    `userID`,
                                                                    `categorie`,
                                                                    `datEdite`,
                                                                    `prix_depart`,
                                                                    `prix_final`,
                                                                    `date_fin`,
                                                                    `modele`,
                                                                    `marque`,
                                                                    `puissance`,
                                                                    `annee`,
                                                                    `message`,
                                                                    `statut`,
                                                                    `dateMaj`) 
                                            VALUES (    :ref,
                                                        :userID,
                                                        :categorie,
                                                        :datEdite,
                                                        :prix_depart,
                                                        :prix_final,
                                                        :date_fin,
                                                        :modele,
                                                        :marque,
                                                        :puissance,
                                                        :annee,
                                                        :message,
                                                        :statut,
                                                        :dateMaj)
                                        ");

                $newReg             = $cle_user     -> prepare($reqAdd);

                $newReg             -> bindValue(':ref',            $incLogin,  PDO::PARAM_STR);
                $newReg             -> bindValue(':userID',         $clepasse,  PDO::PARAM_INT);
                $newReg             -> bindValue(':categorie',      $anCategorie,  PDO::PARAM_STR);
                $newReg             -> bindValue(':datEdite',       $newDateMaj,  PDO::PARAM_INT);
                $newReg             -> bindValue(':prix_depart',    $anPrix,  PDO::PARAM_INT);
                $newReg             -> bindValue(':prix_final',     $anPrix,  PDO::PARAM_INT);
                $newReg             -> bindValue(':date_fin',       $dateDoublon,  PDO::PARAM_INT);
                $newReg             -> bindValue(':modele',         $anModele,  PDO::PARAM_STR);
                $newReg             -> bindValue(':marque',         $anMarque,  PDO::PARAM_STR);
                $newReg             -> bindValue(':puissance',      $anPuissance,  PDO::PARAM_INT);
                $newReg             -> bindValue(':annee',          $anAnnee,  PDO::PARAM_INT);
                $newReg             -> bindValue(':message',        $anMessage,  PDO::PARAM_STR);
                $newReg             -> bindValue(':statut',         $statutReg,  PDO::PARAM_STR);
                $newReg             -> bindValue(':dateMaj',        $newDateMaj,  PDO::PARAM_INT);

                $newReg             -> execute();

                if (!$newReg) {
                    $error_insert   =   'Une ou plusieurs erreurs <b class="text-uppercase text-danger">de validation</b> '. 
                                        'de vos données ont été détectées lors de l\'exécution de la requêtte, veuillez réessayer s\'il vous plaît !';
                } else {
                    $success_saisie =   'Félicitations, votre annonce <b class="text-uppercase text-danger">'.$anCategorie.' '.$anModele.'</b>, '. 
                                        'vient d\'être envoyée et passe en vérification avant publication. <br>Veuillez noter le succès de votre demande et attendez notre retour, merci !';
                    $formulaire_valide  = "INSERTION";
                }

            }//if(Si session active) {}

            else {

                $error_log      =   'Votre annonce ne peut être publié car vous êtes déconnecté ! <br>'.
                                    'Veuillez vous connecter s\'il vous plaît !';
                
                $formulaire_valide  = "INSERTION";
            }

        } //else {Si toutes les conditions de saisie sont respectées}

    }



?>