<?php 

    session_start();

    include __DIR__ ."/fonctions.php";
    include __DIR__ ."/les_class.php";

    $cle_user           = connect_format2023();

    $repMenus       = "ateliers";
    $name_exo       = strtoupper( "Mes ". $nom_fichier );
    if (!isset($name_exo)) {
        $name_exo = "NON IDENTIFIE !";  
    }



    //Exploration des onglets pour annonces

    if (isset($_GET["annonces"])) {
        
        $onAnnonce          = "";
        $onAjout            = "d-none";
        $onDetails          = "d-none";
    }
    
    elseif (isset($_GET["ajout"])) {
        
        
        $onAnnonce          = "d-none";
        $onAjout            = "";
        $onDetails          = "d-none";
    }

    elseif (isset($_GET["details"])) {
        
        

        $onAnnonce          = "d-none";
        $onAjout            = "d-none";
        $onDetails          = "";
    }
    
    else {
        
        
        $onAnnonce          = "d-none";
        $onAjout            = "d-none";
        $onDetails          = "d-none";

    }
    


?>


<!DOCTYPE html>
<html lang="fr">

    <?php include_once("heade.php"); ?>

    <body>

        
        <!-- ======= START Header ======= -->
        <?php 

            $logo           = "logos/reunion.png";

            include __DIR__ . "/tableaux.php";
            include __DIR__ . "/menus_entete.php";


            $foldAnnonce 	        = "images/annonces/";
            // Récupération des photos et vidéos des annonces disponibles
            $imgAnnonce             = $foldAnnonce.'*.{jpg,jpeg,gif,png}';
            $globGalerie            = glob($imgAnnonce, GLOB_BRACE);
            // Compteur des images et vidéos contenues dans le dossier des annonces
            $nbAnnonce              = count($globGalerie);

            if (isset($_SESSION["userConnect"])) {

                
                $userLog            = $_SESSION['userConnect'];//Session de l'identifiant utilisateur
                $userID             = $_SESSION['userId'];//Session de l'identifiant utilisateur

                // Récupération des annonces déposées par l'utilisateur
                $focusAnn           = ("SELECT * FROM annonces WHERE userID = :userID ORDER BY date_fin DESC");
                $fAnn               = $cle_user -> prepare($focusAnn);
                $fAnn               -> bindValue(':userID', $userID, PDO::PARAM_INT);
                $fAnn               -> execute();

                $listAnn            = $fAnn -> fetchAll();
                $nmbrAnn            = $fAnn -> rowCount();

            } 
            
            else {
                
                $statut_session     = "DECONNEXION";
            }
            
                




        ?>
        <!-- ======= END Header ======= -->

        <div class="overlays">
            <div class="textOverlays">Chargement...</div>
        </div>

        <main>

            <section class="back_cover mb-90 hgt-7">
                <div class="exercice">Exercice à réaliser : <?php echo $name_exo;?></div>
                <input type="hidden" id="linkAnnonce" name="linkAnnonce" value="<?php echo $linkCrypt; ?>">
            </section>

            <section id="form-consult-annonce" class="une_section <?php echo $onAnnonce;?>">
                <h3><i class="fas fa-business-time fa-lg mr-7"></i><?php echo $nmbrAnn;?> Annonces disponibles</h3>
                
                <div class="formulaire bg-secondary">

                    <div class="annonce d-none"><!--  Début de l'annonce -->
                        <div class="img_annonce">
                            <img src="logos/conditions.png" alt="ANC" class="img-fluid">
                            <div>
                                <span class="prix_annonce">10 000 €</span>
                                <a href="" class="d-none"><i class="fas fa-pencil-alt fa-lg"></i></a>
                                <a href="" class="d-none"><i class="fas fa-trash fa-lg"></i></a>
                            </div>
                        </div>

                        <div class="content_annonce">
                            <h3 class="titre_annonce">Marque et catégorie de la voiture</h3>

                            <div class="details_annonce ">
                                Le détail de cette annonce est consultable ici, veuillez cliquer sur le bouton détail...
                            </div>

                            <div class="action_annonce">
                                <a href="">
                                    <span class="d-none d-md-inline">Modifier</span>
                                    <i class="fas fa-pencil-alt fa-lg ml-7"></i>
                                </a>
                                <a href="">
                                    <span class="d-none d-md-inline">Supprimer</span>
                                    <i class="fas fa-trash fa-lg ml-7"></i>
                                </a>
                                <a href="">
                                    <span class="d-none d-md-inline">Consulter</span>
                                    <i class="fas fa-eye fa-lg ml-7"></i>
                                </a>
                                <a href="">
                                    <span class="d-none d-md-inline">Acheter</span>
                                    <i class="fas fa-cart-plus fa-lg ml-7"></i>
                                </a>
                            </div>
                        </div>
                        

                    </div><!--  Fin de l'annonce -->

                    <?php

                    
                    // Extraction du nombre d'images correspondant à une annonce
                    if ($nmbrAnn     <= 0) {
                        echo'
                        <div class="flo-ui mt-20">
                            <div class="flo-notification alert-error">
                                <p>Vous n\'avez pas encore dépôsé d\'annonce et nous serions plus que honorés que vous utilisez nos services !</p>
                                <a href="javascript:void(0);" class="close-btn">&times;</a>                                  
                            </div><!-- end .notification alert-success alert-error section -->

                        </div>';

                    } else {


                        foreach($listAnn as $idAn => $lnAnn) {

                            $anc_id             = $lnAnn['id'];//
                            if ($anc_id         < 10) { $rang   = "0000".$anc_id; }
                            elseif ($anc_id     <= 99) { $rang   = "000".$anc_id; }
                            elseif ($anc_id     <= 999) { $rang   = "00".$anc_id; }
                            elseif ($anc_id     <= 9999) { $rang   = "0".$anc_id; }
                                


                            $anc_ref            = $lnAnn['ref'];//
                            $anc_userID         = $lnAnn['userID'];//
                            $anc_categorie      = $lnAnn['categorie'];//
                            $anc_datEdite       = $lnAnn['datEdite'];//
                            $anc_prix           = $lnAnn['prix_depart'];//
                            $anc_gain           = $lnAnn['prix_final'];//
                            $anc_dateFin        = $lnAnn['date_fin'];//
                            $anc_modele         = $lnAnn['modele'];//
                            $anc_marque         = $lnAnn['marque'];//
                            $anc_puissance      = $lnAnn['puissance'];//
                            $anc_annee          = $lnAnn['annee'];//
                            $anc_message        = $lnAnn['message'];//
                            $anc_statut         = $lnAnn['statut'];//
                            $anc_dateMaj        = $lnAnn['dateMaj'];//

                            $foldAnn            = $foldAnnonce."annonce_".$rang."/";
                            if (!is_dir($foldAnn)) { mkdir($foldAnn);}

                            // Récupération des photos et vidéos des annonces disponibles
                            $imgRep             = $foldAnn.'*.{jpg,jpeg,gif,png}';
                            $globImgRep         = glob($imgRep, GLOB_BRACE);//Contient toutes les images disponibles
                            // Compteur des images et vidéos contenues dans le dossier des annonces
                            $countImgRep        = count($globImgRep);//Nombre des images de l'annonces
                            if ($countImgRep    <= 0) {
                                copy($foldAnnonce."add-camera.png", $foldAnn."annonce_".$rang.".png");
                            } 
                            else {
                                
                                foreach($globImgRep as $idAn => $limageA) {
                                    
                                    $imAn        = "mes_images";//Valeur nulle
                                    $imgAnn      = str_replace($imAn,'', $limageA);

                                    

                                }// foreach(Boucle sur les images de l'annonce) {}

                            }// else {Si, au moins, une image de l'annonce a été ajouté au dossier annonce}
                            

                        
                            echo'
                            <div class="annonce"><!--  Début de l\'annonce -->
                                <div class="img_annonce">
                                    <img src="'.$imgAnn.'" alt="ANC" class="img-fluid">
                                    <div>
                                        <span class="prix_annonce">'.$anc_prix.' €</span>
                                        <a href="" class="d-none"><i class="fas fa-pencil-alt fa-lg"></i></a>
                                        <a href="" class="d-none"><i class="fas fa-trash fa-lg"></i></a>
                                    </div>
                                </div>

                                <div class="content_annonce">
                                    <h3 class="titre_annonce">'.$anc_categorie.' | '.$anc_marque.'</h3>

                                    <div class="details_annonce ">
                                        '.$anc_message.'
                                    </div>

                                    <div class="action_annonce">';
                                        if (isset($_SESSION["userConnect"])) {
                                            echo'
                                            <a href="">
                                                <span class="d-none d-md-inline">Modifier</span>
                                                <i class="fas fa-pencil-alt fa-lg ml-7"></i>
                                            </a>
                                            <a href="">
                                                <span class="d-none d-md-inline">Supprimer</span>
                                                <i class="fas fa-trash fa-lg ml-7"></i>
                                            </a>';
                                        }

                                        echo'
                                        <a href="">
                                            <span class="d-none d-md-inline">Consulter</span>
                                            <i class="fas fa-eye fa-lg ml-7"></i>
                                        </a>
                                        <a href="" class="'; 
                                            if (isset($_SESSION["userConnect"])) {
                                            echo' d-none'; } echo'">
                                            <span class="d-none d-md-inline">Acheter</span>
                                            <i class="fas fa-cart-plus fa-lg ml-7"></i>
                                        </a>
                                    </div>
                                </div>
                                

                            </div><!--  Fin de l\'annonce -->
                            ';

                        }//foreach(Boucle sur les images correspondant à une annonce

                    
                    }// else {Si, au moins, une annonce a été dépôsée par l'utilisateur}

                    ?>
                    
                    <hr class="mt-md">

                    <div class="form-row wid-lg-70 mb-20">
                        <section class="colm colm12 mt-7 text-center">
                            <a href="affaires?ajout=<?php echo $linkCrypt;?>" class="btn-save-texte fsize-md add-connexion">Ajouter une annonce
                                <i class="fas fa-business-time fa-lg ml-7"></i>
                            </a>
                        </section>
                    </div>
                            
                </div>

            </section>


            <section id="form-ajout-annonce" class="une_section <?php echo $onAjout;?>">
                <h3><i class="fas fa-business-time fa-lg mr-7"></i>Créaction d'une annonce</h3>
                    
                <form class="formulaire pb-30 bg-white">
                     
                    <div class="form-row">
                        
                        <section class="colm colm6">
                            <label for="" class="flo-select">
                                <select name="categorie" id="categorie">
                                    <option value="CatNulle" selected disabled>Catégorie...</option>
                                    <option value="VOITURES">Voitures</option>
                                    <option value="CMIONS">Camions</option>
                                    <option value="MINI PELLE">Mini-pelle</option>
                                    <option value="AUTRES PRODUITS">Autres produits</option>
                                    
                                </select>
                                <i class="arrow double"></i>
                                
                            </label>
                            <!-- <label for="categorie" class="flop-libele d-none">Libélé champ</label> -->
                            
                        </section>
                        
                        <section class="colm colm6">
                            <input type="text" class="flo-input nonFocus pl-35" id="designation" name="designation" autocomplete="off" placeholder="Désignation..." maxlength="60" onkeyup="enMajuscule(this);">
                            <label for="designation" class="flop-libele">Désignation...</label>
                            <a class="icon-input"><i class="fas fa-tags fa-lg"></i></a>
                        </section>

                    </div>

                    <div class="form-row">
                        
                        <section class="colm colm6">
                            <input type="text" class="flo-input nonFocus pl-35" id="prixannonce" name="prixannonce" autocomplete="off" placeholder="Prix départ..." maxlength="11"
                                onkeyup="verif(this);">
                            <label for="prixannonce" class="flop-libele">Prix départ...</label>
                            <a class="icon-input"><i class="fas fa-money-bill fa-lg"></i></a>
                        </section>
                        
                        <section class="colm colm6">
                            <input type="text" class="flo-input nonFocus pl-35" id="modele" name="modele" autocomplete="off"
                                placeholder="Modele de voiture..." maxlength="200" onkeyup="enMinuscule(this);">
                            <label for="modele" class="flop-libele">Modele de voiture...</label>
                            <a class="icon-input"><i class="fas fa-receipt fa-lg"></i></a>
                        </section>
                    </div>


                    <div class="form-row">
                        
                        <section class="colm colm4">
                            <input type="text" class="flo-input nonFocus pl-35" id="marque" name="marque" autocomplete="off"
                                placeholder="Marque de la voiture..." maxlength="24" onkeyup="">
                            <label for="marque" class="flop-libele">Marque de la voiture...</label>
                            <a class="icon-input"><i class="fas fa-receipt fa-lg"></i></a>
                        </section>
                      
                        <section class="colm colm4">
                            <input type="text" class="flo-input nonFocus pl-35" id="puissance" name="puissance" autocomplete="off"
                                placeholder="Puissance du moteur..." maxlength="2" onkeyup="verif(this);">
                            <label for="puissance" class="flop-libele">Puissance du moteur...</label>
                            <a class="icon-input"><i class="fas fa-fan fa-spin fa-lg"></i></a>
                        </section>

                        <section class="colm colm4">
                            <label for="" class="flo-select">
                                <select name="anneanc" id="anneanc">
                                    <option value="AnneeNulle" selected disabled>Année...</option>
                                    <?php 
                                            $pluAgee        = date('Y') - 2000;

                                        for ($anan  = date('Y'); $anan >= 2000 ; $anan--) {
                                            $anAge          = date('Y') - $anan;

                                            if ($anAge      == 0) {
                                                $labAge     = "Plus récente : -1 an";
                                            }
                                            elseif ($anAge  == 1) {
                                                $labAge     = $anAge ." an";
                                            }
                                            elseif ($anAge  > 1) {
                                                $labAge     = $anAge ." ans";
                                            }
                                            else {
                                                $labAge     = "plus de ".$pluAgee." ans";
                                            }

                                            echo'<option value="'.$anan.'">Date de '.$anan.' ('.$labAge.')</option>';
                                        }

                                    ?>

                                    <option value="ANCIENNE">Plus ancienne <?php echo "( + ". $pluAgee." ans).";?></option>
                                    
                                </select>
                                <i class="arrow double"></i>
                            </label>
                            <!-- <label for="anneanc" class="flop-libele d-none">Libélé champ</label> -->
                            
                        </section>


                    </div>


                    <div class="flo-ui getErrors mt-10"></div>


                    <div class="form-row" style="margin-top: 15px;">
                        <a href="affaires?annonces=<?php echo $linkCrypt;?>" class="ml-20 text-dark">
                            <i class="fas fa-folder-tree fa-lg mr-7"></i>Voir mes annonces
                        </a>
                    </div>


                    <div class="form-row wid-lg-70 mb-20">
                        <section class="colm colm12 mt-7 text-center">
                            <button class="btn-save-texte fsize-md add-annnonces">Publier l'annonce 
                                <i class="fas fa-arrow-up-right-from-square fa-lg ml-7"></i>
                            </button>
                        </section>
                    </div>
                
                </form>

            </section>


            <section id="form-detail-annonce" class="une_section <?php echo $onDetails;?>">
                <h3><i class="fas fa-business-time fa-lg mt-25 mr-7"></i>
                    <span> Annonce N°00023 </span>
                    <span class="text-special"><b class="text-danger">10 000 _€</b></span>
                </h3>
                <div class="formulaire pb-30 bg-warning">
                    <div class="annonce mini-hgt"><!--  Début de l\'annonce -->



                    </div><!-- Fin de l\'annonce -->
                            
                </div>
            </section>

            

            
            <div class="option-group field bg-secondary bx-shodow-black mt-7 mr-15 pb-30 ml-7"></div>
            <div class="option-group field bg-warning bx-shodow-black mt-7 mr-15 pb-30 ml-7"></div>
            <div class="option-group field bg-info bx-shodow-black mt-7 mr-15 pb-30 mb-60 ml-7"></div>

        </main>


        <!-- START Footer -->
        <?php include __DIR__ . "./footer.php"; ?>
        <!-- END Footer -->


        <script type="text/javascript" src="js/jquery-3.6.4.min.js"></script>
        <script type="text/javascript" src="js/fonctions.js"></script>
        <!-- <script type="text/javascript" src="../js/script-main.js"></script> -->
        <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="js/forms.js"></script>
        
    </body>

</html>