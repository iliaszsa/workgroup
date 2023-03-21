<?php 

    $cle_user                   = connect_format2023();
    $initUser                   = mysqli_query($config, "ALTER TABLE utilisateurs AUTO_INCREMENT = 0 ");

    // __________ ______________________ _________________________

    $error_requette             = "";
    $aff_error                  = "d-none";


    if (isset($_POST["nom"], $_POST["email"], $_POST["mot_de_passe"]) ) {
        
        $incNom                 = htmlspecialchars( strtoupper( trim( $_POST["nom"]) ) );
        $incPrenom              = htmlspecialchars( ucwords( trim( $_POST["prenom"]) ) );
        $incEmail               = htmlspecialchars( strtolower( trim( $_POST["email"]) ) );
        $inctelephone           = htmlspecialchars( trim( $_POST["telephone"]) );
        $incPasse               = htmlspecialchars( trim( $_POST["mot_de_passe"]) );
        $incPasse2              = htmlspecialchars( trim( $_POST["mot_de_passe2"]) );


        $datEdition             = mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y'));//Date d'édition (numérique)
        $incLogin               = strtoupper(substr($incNom, 0, 1).substr($incPrenom, 0, 1).strlen($incNom).strlen($incPrenom));
        $statutReg              = "EN COURS";


        //Vérification de la bonne saisie du formulaire
        if ($incNom             == "" || strlen($incNom) < 3) {
            $error_nom          =   'Le champ <b class="text-uppercase text-danger">nom</b> '. 
                                    'est obligatoir, veuillez le compléter s\'il vous plaît !';
        }

        elseif ($incPrenom      == "" || strlen($incPrenom) < 3) {
            $error_prenom       =   'Le champ <b class="text-uppercase text-danger">prenom</b> '. 
                                    'est obligatoir, veuillez le compléter s\'il vous plaît !';
        }

        elseif ($incEmail       == "" || strlen($incEmail) < 3) {
            $error_email        =   'Le champ <b class="text-uppercase text-danger">e-mail</b> '. 
                                    'est obligatoir, veuillez le compléter s\'il vous plaît !';
        }

        elseif ($inctelephone   == "" || strlen($inctelephone) < 10) {
            $error_telephone    =   'Le champ <b class="text-uppercase text-danger">num telephone</b> '. 
                                    'est obligatoir, veuillez le compléter s\'il vous plaît !';
        }

        elseif ($incPasse       == "" || strlen($incPasse) < 3) {
            $error_passeI       =   'Le champ <b class="text-uppercase text-danger">mot de passe</b> '. 
                                    'est obligatoir, veuillez le compléter s\'il vous plaît !';
        }

        elseif ($incPasse2      == "") {
            $error_passeI       =   'La confirmation du <b class="text-uppercase text-danger">mot de passe</b> '. 
                                    'est obligatoir, veuillez le compléter s\'il vous plaît !';
        }

        elseif ($incPasse2      != $incPasse) {
            $error_passeII      =   'Les deux(2) <b class="text-uppercase text-danger">mot de passe</b> '. 
                                    'ne sont pas identiques, veuillez corriger l\'erreur s\'il vous plaît !';
        }

        else {

            if (!isset($incInfos)) {
                $incInfos       = "Aucun commentaire sur le dossier !";
            }

            $clepasse           = password_hash($incPasse2, PASSWORD_DEFAULT);

            // VERIFICATION DES DOUBLONS SUR LES UTILISATEUR AVEC (EMAIL/TELEPHONE)
            $getDoublon         = ("SELECT email, telephone FROM utilisateurs WHERE email = :email OR telephone = :telephone");
            $echap              = $cle_user -> prepare($getDoublon);
            $echap              -> bindValue(':email', $incEmail, PDO::PARAM_STR);
            $echap              -> bindValue(':telephone', $inctelephone, PDO::PARAM_INT);
            $echap              -> execute();
            $isDouble           = $echap -> rowCount();

            if ($isDouble       > 0) {
                
                $error_doublon  =   'Désolé mais nous avons trouvé un utilisateur avec, au moins, une des informations saisies ! <br>'.
                                    'Nous vous suggerons de vous connecter avec le mail <b class="text-uppercase text-danger">'.$incEmail.'</b> '. 
                                    'ou avec le numéro de téléphone <b class="text-uppercase text-danger">'.$inctelephone.'</b> ou, simplement, corriger l\'erreur s\'il vous plaît !'; 
            }

            else {

                // Préparation d'une requêtte d'insertion des nouvelles données
                $reqAdd             = ("INSERT INTO `utilisateurs` (    `login`,
                                                                        `nom`,
                                                                        `prenom`,
                                                                        `email`,
                                                                        `telephone`,
                                                                        `password`,
                                                                        `details`,
                                                                        `datEdite`,
                                                                        `statut`,
                                                                        `dateMaj`) 
                                            VALUES (    :login,
                                                        :nom,
                                                        :prenom,
                                                        :email,
                                                        :telephone,
                                                        :password,
                                                        :details,
                                                        :datEdite,
                                                        :statut,
                                                        :dateMaj)
                                        ");

                $newReg             = $cle_user     -> prepare($reqAdd);

                $newReg             -> bindValue(':login',      $incLogin, PDO::PARAM_STR);
                $newReg             -> bindValue(':nom',        $incNom, PDO::PARAM_STR);
                $newReg             -> bindValue(':prenom',     $incPrenom, PDO::PARAM_STR);
                $newReg             -> bindValue(':email',      $incEmail, PDO::PARAM_STR);
                $newReg             -> bindValue(':telephone',  $inctelephone, PDO::PARAM_STR);
                $newReg             -> bindValue(':password',   $clepasse, PDO::PARAM_STR);
                $newReg             -> bindValue(':details',    $incInfos, PDO::PARAM_STR);
                $newReg             -> bindValue(':datEdite',   $datEdition, PDO::PARAM_STR);
                $newReg             -> bindValue(':statut',     $statutReg, PDO::PARAM_STR);
                $newReg             -> bindValue(':dateMaj',    $datEdition, PDO::PARAM_STR);

                $newReg             -> execute();

                if (!$newReg) {
                    $error_insert   =   'Une ou plusieurs erreurs <b class="text-uppercase text-danger">de validation</b> '. 
                                        'de vos données ont été détectées lors de l\'exécution de la requêtte, veuillez réessayer s\'il vous plaît !';
                } else {
                    $success_saisie =   'Félicitations, <b class="text-uppercase text-danger">'.$incNom.' '.$incPrenom.'</b>, '. 
                                        'votre demande d\'inscription a été envoyé avec succès et a bien été prise en compte !';
                    $formulaire_valide  = "INSERTION";
                }

            }//else {Si aucun doublou d'utilisateur}


        } //else {Si toutes les conditions de saisie sont respectées}

    }



    // VERIFICATION ET PARAMETRES DE CONNEXION

    elseif (isset($_POST["identifiant"], $_POST["passeWord"]) ) {
        
        $login                  = htmlspecialchars( trim( $_POST["identifiant"]) );
        $logPasse               = htmlspecialchars( trim( $_POST["passeWord"]) );


        if ($login              == "" || strlen($login) < 3) {
            $error_login        =   'Vous devez renseigner votre <b class="text-uppercase text-danger">identifiant</b> '. 
                                    'de connexion pour continuer, veuillez le compléter s\'il vous plaît !';
        }

        elseif ($logPasse       == "" || strlen($logPasse) < 3) {
            $error_passeI       =   'Le champ <b class="text-uppercase text-danger">mot de passe</b> '. 
                                    'est obligatoir, veuillez le compléter s\'il vous plaît !';
        }

        else {

            //Vérification des données saisies avec la BDD
            $focusUser          = ("SELECT * FROM utilisateurs WHERE login = '$login' OR email = '$login' ");
            $verLog             = $cle_user     -> prepare($focusUser);
            $verLog             -> execute();

            $resultLog          = $verLog       -> fetchAll();
            $response           = $verLog       -> rowCount();

            if ($response       <= 0) {

                $error_log      =   'Connexion échouée ! <b class="text-uppercase text-danger">L\'identifiant et/ou le mot de passe </b> '. 
                                    'sont incorrectes, veuillez corriger et compléter s\'il vous plaît !';
                                    
            }
            
            else {

                //Code des vérifications de l'identifiant et le mot des passe
                foreach ($resultLog as $ln => $valUser) {
                    
                    $log_id     = $valUser['id'];//
                    $log_login  = $valUser['login'];//
                    $log_nom    = $valUser['nom'];//
                    $log_prenom = $valUser['prenom'];//
                    $log_email  = $valUser['email'];//
                    $log_tel    = $valUser['telephone'];//
                    $log_pass   = $valUser['password'];//
                    $log_infos  = $valUser['details'];//
                    $log_datEdite= $valUser['datEdite'];//
                    $log_statut = $valUser['statut'];//
                    $log_dateMaj= $valUser['dateMaj'];//

                    
                    if (password_verify($logPasse, $log_pass) === false) {
                       
                        $error_log      =   'Connexion échouée ! <b class="text-uppercase text-danger">L\'identifiant et/ou le mot de passe </b> '. 
                                        'sont incorrectes, veuillez corriger et compléter s\'il vous plaît !';
                    } 
                    
                    else {
                        
                        $cryptage       = "[]";
                        $cryptEmail     = str_replace("-", sha1("-"),
                                            str_replace("_", sha1("_"),
                                                str_replace(".", sha1("."),
                                                    str_replace("@", sha1("@"),
                                                        $log_email
                                                    )
                                                )
                                            )
                                        );  
                        $cryptlog       = str_replace("&@=", sha1("&@="), md5($log_email)."&@=".$cryptEmail.$cryptage.md5(uniqid(microtime(), TRUE) ) );
                        $securUser      = $cryptlog;

                        $limiteSession  = mktime(date('H') + 1, date('i'), date('s'), date('m'), date('d'), date('Y'));//Durée de la session ouverte
                        // $newDateMaj     = mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y'));//Date de mise à jour
                        $sessionConnect = "AUTHENTIFICATION";
                        
                        /* $fichLog        = fopen("config/logUser.txt", "w+");
                        fwrite($fichLog, $login.";".$log_id.";".$limiteSession.";CONNEXION;ACTIF", 1024);
                        fclose($fichLog); */
                        
                       

                        //Mise à jour de la session

                        $sql            = ("UPDATE utilisateurs SET statut = :statut, dateMaj = :dateMaj  WHERE id = '$log_id' AND email = '$log_email'");
                        $newUp          = $cle_user -> prepare($sql);
                        $newUp          -> bindValue(':statut', "ACTIF", PDO::PARAM_STR);
                        $newUp          -> bindValue(':dateMaj', $newDateMaj, PDO::PARAM_INT);
                        $newUp          -> execute();

                        if (!$newUp) {
                            $error_log  =   'Votre connexion a réussi mais avec <b class="text-uppercase text-danger"> un code erreur de mis à jour </b> '. 
                                    'qui nous a bloqué la sauvegarde de cette activité !';
                        } 
                        
                        else {
                            $success_saisie  =   'Connexion à l\'espace utilisateur réussie avec l\'identifiant <b class="text-uppercase text-danger">'.$login.' </b>, '. 
                                    'un instant s\'il vous plaît...';
                        }                      

                    }                    

                }                

            }//else{Si l'identifiant est bien entregistré dans la BDD}
            

        }//else {Si toutes les conditions de saisie sont respectées}
        

    }//elseif(Si demande d'identification sur l'interface utilisateur) {}





    //FORMULAIRE DE CREATION D'ANNONCE ENCHERE
    elseif (isset($_POST["categ"], $_POST["prix"]) ) {
        
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

        $error_requette         =   'Erreur de traitement de votre <b class="text-uppercase text-danger">requêtte</b>.<br>'. 
                                    'Une ou plusieurs données ont été mal renseignées ou ma formatées !';                                    
    }//else{Si aucune soumission d'un ou plusieurs formulaires}


?>