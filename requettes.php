<?php 

    session_start();

    include_once("fonctions.php");
    include_once("les_class.php");

    $cle_user                   = connect_format2023();
    $initUser                   = mysqli_query($config, "ALTER TABLE utilisateurs AUTO_INCREMENT = 0 ");
    $initAnnonces               = mysqli_query($config, "ALTER TABLE annonces AUTO_INCREMENT = 0 ");

    //FORMULAIRE DE CREATION D'ANNONCE ENCHERE
    if (isset($_POST["categ"], $_POST["prix"]) ) {
        
        /* $anCategorie            = htmlspecialchars( strtoupper( trim( $_POST["categorie"]) ) );
        $anDesign               = htmlspecialchars( ucwords( trim( $_POST["designation"]) ) );
        $anPrix                 = htmlspecialchars( trim( $_POST["prixannonce"]) );
        $anModele               = htmlspecialchars( trim( $_POST["modele"]) );
        $anMarque               = htmlspecialchars( trim( $_POST["marque"]) );
        $anPuissance            = htmlspecialchars( trim( $_POST["puissance"]) );
        $anAnnee                = htmlspecialchars( trim( $_POST["anneanc"]) ); */

        /* ____________________________________________________________________________________ */

        $anCategorie            = htmlspecialchars( strtoupper( trim( $_POST["categ"]) ) );
        $anDesign               = htmlspecialchars( ucwords( trim( $_POST["desig"]) ) );
        $anPrix                 = htmlspecialchars( trim( $_POST["prix"]) );
        $anModele               = htmlspecialchars( strtoupper( trim( $_POST["mode"]) ) );
        $anMarque               = htmlspecialchars( strtoupper( trim( $_POST["marq"]) ) );
        $anPuissance            = htmlspecialchars( trim( $_POST["puis"]) );
        $anAnnee                = htmlspecialchars( trim( $_POST["anne"]) );

        $datEdition             = mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y'));//Date d'édition (numérique)
        $incLogin               = strtoupper(substr($anCategorie, 0, 1).substr($anDesign, 0, 1).strlen($anCategorie).strlen($anDesign));
        $statutReg              = "EN COURS";


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

            $newReg             -> bindValue(':ref',            $incLogin,   PDO::PARAM_STR);
            $newReg             -> bindValue(':userID',         $clepasse,   PDO::PARAM_INT);
            $newReg             -> bindValue(':categorie',      $anCategorie,  PDO::PARAM_STR);
            $newReg             -> bindValue(':datEdite',       $newDateMaj,  PDO::PARAM_INT);
            $newReg             -> bindValue(':prix_depart',    $anPrix,     PDO::PARAM_INT);
            $newReg             -> bindValue(':prix_final',     $anPrix,     PDO::PARAM_INT);
            $newReg             -> bindValue(':date_fin',       $dateDoublon,  PDO::PARAM_INT);
            $newReg             -> bindValue(':modele',         $anModele,    PDO::PARAM_STR);
            $newReg             -> bindValue(':marque',         $anMarque,    PDO::PARAM_STR);
            $newReg             -> bindValue(':puissance',      $anPuissance,  PDO::PARAM_INT);
            $newReg             -> bindValue(':annee',          $anAnnee,  PDO::PARAM_INT);
            $newReg             -> bindValue(':message',        $anMessage,  PDO::PARAM_STR);
            $newReg             -> bindValue(':statut',         $statutReg,  PDO::PARAM_STR);
            $newReg             -> bindValue(':dateMaj',        $newDateMaj,  PDO::PARAM_INT);

            $newReg             -> execute();

            if (!$newReg) {
                
                echo"echec_insert"; exit();
            } 
            else {
                echo"annonce_ajouter"; exit();
            }

        }//if(Si session active) {}

        else {

            echo"action_interdite"; exit();

        }//else {Si toutes les conditions de saisie sont respectées}

    }

    else {
        echo "jenesaispas"; exit();
    }



?>