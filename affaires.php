<?php 

    session_start();

    include __DIR__ ."/fonctions.php";
    include __DIR__ ."/les_class.php";

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

        ?>
        <!-- ======= END Header ======= -->



        <main>

            <section class="back_cover mb-90 hgt-7">
                <div class="exercice">Exercice à réaliser : <?php echo $name_exo;?></div>
            </section>

            <section id="form-consult-annonce" class="une_section <?php echo $onAnnonce;?>">
                <h3><i class="fas fa-business-time fa-lg mr-7"></i><?php echo $nbAnnonce;?> Annonces disponibles</h3>
                
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
                    foreach($globGalerie as $idAn => $lannonce) {

                        $rang               = $idAn + 1;


                        $imAn               = "mes_images";//Valeur nulle
                        $photo_An           = str_replace($imAn,'', $lannonce);

                        $Ext_Image          = strrchr($photo_An, '.');//Récupère l'extension de l'image
                        //echo $photo_An.'<br />';
                        $Nom_Image          = substr($photo_An, strrpos($photo_An, '/') + 1, - strlen($Ext_Image));//Nom de l'image (ex : home)
                        $nom_photo          = substr(strrchr($photo_An, "/"), 1);//substr($photo, 7);Nom & extension de l'image (ex : home.png)

                    
                        echo'
                        <div class="annonce"><!--  Début de l\'annonce -->
                            <div class="img_annonce">
                                <img src="'.$photo_An.'" alt="ANC" class="img-fluid">
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
                    
                <form class="formulaire pb-30 bg-white" action="affaires.php" method="POST">
                     
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
                            <input type="text" class="flo-input" id="designation" name="designation" autocomplete="off" placeholder="Désignation..." maxlength="30" onkeyup="enMajuscule(this);">
                            <label for="designation" class="flop-libele">Désignation...</label>
                        </section>

                    </div>

                    <div class="form-row">
                        
                        <section class="colm colm6">
                            <input type="text" class="flo-input" id="prixannonce" name="prixannonce" autocomplete="off" placeholder="Prix départ..." maxlength="50" onkeyup="verif(this);"
                                >
                            <label for="prixannonce" class="flop-libele">Prix départ...</label>
                        </section>
                        
                        <section class="colm colm6">
                            <input type="text" class="flo-input" id="modele" name="modele" autocomplete="off" placeholder="Modele de voiture..." maxlength="200" onkeyup="enMinuscule(this);"
                                >
                            <label for="modele" class="flop-libele">Modele de voiture...</label>
                        </section>
                    </div>


                    <div class="form-row">
                        
                        <section class="colm colm4">
                            <input type="text" class="flo-input" id="marque" name="marque" autocomplete="off" placeholder="Marque de la voiture..." maxlength="24" onkeyup=""
                                >
                            <label for="marque" class="flop-libele">Marque de la voiture...</label>
                        </section>
                      
                        <section class="colm colm4">
                            <input type="text" class="flo-input" id="puissance" name="puissance" autocomplete="off" placeholder="Puissance du moteur..." maxlength="2" onkeyup="verif(this);"
                                >
                            <label for="puissance" class="flop-libele">Puissance du moteur...</label>
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


                    <div class="form-row" style="margin-top: 15px;">
                        <a href="affaires?annonces=<?php echo $linkCrypt;?>" class="ml-20 text-dark">
                            <i class="fas fa-folder-tree fa-lg mr-7"></i>Voir mes annonces
                        </a>
                    </div>

                    <?php 
                                
                        include_once("formulaires.php"); 
                        include_once("errorMade.php");
                        
                    ?>


                    <div class="form-row wid-lg-70 mb-20">
                        <section class="colm colm12 mt-7 text-center">
                            <button class="btn-save-texte fsize-md add-connexion">Publier l'annonce 
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


        <script type="text/javascript" src="/js/jquery-3.6.3.min.js"></script>
        <script type="text/javascript" src="/js/fonctions.js"></script>
        <!-- <script type="text/javascript" src="../js/script-main.js"></script> -->
        <script type="text/javascript" src="/js/scripts.js"></script>
        
    </body>

</html>