<?php 

    $cle_user                   = connect_format2023();

    $error_requette             = "";
    $aff_error                  = "d-none";

    if (isset($_POST["nom"], $_POST["email"], $_POST["mot_de_passe"]) ) {
        
        $incNom                 = htmlspecialchars( strtoupper( trim( $_POST["nom"]) ) );
        $incPrenom              = htmlspecialchars( ucwords( trim( $_POST["prenom"]) ) );
        $incEmail               = htmlspecialchars( strtolower( trim( $_POST["email"]) ) );
        // $inctelephone           = htmlspecialchars( trim( $_POST["telephone"]) );
        $inctelephone           = htmlspecialchars( trim( 0102030405 ) );
        $incPasse               = htmlspecialchars( trim( $_POST["mot_de_passe"]) );
        $incPasse2              = htmlspecialchars( trim( $_POST["mot_de_passe2"]) );


        $datEdition             = mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y'));//Date d'édition (numérique)
        $incLogin               = strtoupper(substr($incNom, 0, 1).substr($incPrenom, 0, 1).strlen($incNom).strlen($incPrenom));



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

                        $hashPass       = password_hash("jenesaispas", PASSWORD_DEFAULT);
                                                
                        $error_log      =   'Connexion échouée ! <b class="text-uppercase text-danger">L\'identifiant et/ou le mot de passe </b> '. 
                                    'sont incorrectes, veuillez corriger et compléter s\'il vous plaît !';
                    } 
                    
                    else {
                        
                        session_start();
                        
                        $cryptEmail     = str_replace(".", sha1('.'),

                                            str_replace("-", sha1("-"),

                                                str_replace("[]", sha1("[]"),

                                                    str_replace("_", sha1("_"),

                                                        str_replace("@", sha1("@"),
                                                            
                                                            $log_email
                                                        )
                                                    
                                                    )
                                                
                                                )

                                            )
                                        );

                        $securUser      = $cryptEmail."&@=". md5(uniqid(microtime(), TRUE) );
                        $limiteSession  = mktime(date('H') + 1, date('i'), date('s'), date('m'), date('d'), date('Y'));//Durée de la session ouverte    
                        // $newDateMaj     = mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y'));//Date de mise à jour

                        $_SESSION['userConnect']    = $login;//Session de l'identifiant utilisateur
                        $_SESSION['userdelais']     = $limiteSession;//Session du délai d'activités
                        $_SESSION['securiteOs']     = $securUser;//Session de la sécurité


                        //Mise à jour de la session
                        $newState       = [ 'statut' => "ACTIF", 'dateMaj' => $newDateMaj ];

                        $sql            = ("UPDATE utilisateurs SET statut=:statut, dateMaj=:dateMaj  WHERE id = '$log_id' AND email = '$log_email'");
                        $newUp          = $cle_user -> prepare($sql);
                        $newUp          -> execute($newState);

                        if (!$newUp) {
                            $error_log  =   'Votre connexion a réussi mais avec <b class="text-uppercase text-danger"> un code erreur de mis à jour </b> '. 
                                    'qui nous a bloqué la sauvegarde !';
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

    else {

        $error_requette         =   'Erreur de traitement de votre <b class="text-uppercase text-danger">requêtte</b>.<br>'. 
                                    'Une ou plusieurs données ont été mal renseignées ou ma formatées !'; 
        
                                    
    }//else{Si aucune soumission d'un ou plusieurs formulaires}


?>