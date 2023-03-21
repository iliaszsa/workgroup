<?php 

    include_once("fonctions.php");
    include_once("les_class.php");

    $repMenus       = "ateliers";
    $name_exo       = strtoupper( str_replace("_", " ", substr(strrchr( $dossier_page, "/"), 1) ) );
    if (!isset($name_exo)) {
        $name_exo = "NON IDENTIFIE !";  
    }


?>


<!DOCTYPE html>
<html lang="fr">

    <?php include_once("heade.php"); ?>

    <body>

        
        <!-- ======= START Header ======= -->
        <?php 

            $logo           = "logos/reunion.png";

            include_once("tableaux.php");
            include_once("menus_entete.php");



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

            <section class="une_section">
                <h3><i class="fas fa-business-time fa-lg mr-7"></i><?php echo $nbAnnonce;?> Annonces disponibles</h3>
                <form class="formulaire bg-secondary">

                    
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
                                    <a href="">
                                        <span class="d-none d-md-inline">Acheter</span>
                                        <i class="fas fa-cart-plus fa-lg ml-7"></i>
                                    </a>
                                </div>
                            </div>
                            

                        </div><!--  Fin de l\'annonce -->
                        ';

                    }//foreach(Boucle sur les images correspondant à une annonce


                    ?>
                    
                            
                </form>

            </section>


            <section class="une_section">
                <h3>
                    <i class="fas fa-edit fa-lg fa-fw mr-7"></i> Informations à venir...
                </h3>
                <form class="formulaire pb-30 bg-white">
                    
                    
                            
                </form>
            </section>


            <div class="option-group field bg-secondary bx-shodow-black mt-7 mr-15 pb-30 ml-7"></div>
            <div class="option-group field bg-warning bx-shodow-black mt-7 mr-15 pb-30 ml-7"></div>
            <div class="option-group field bg-info bx-shodow-black mt-7 mr-15 pb-30 mb-60 ml-7"></div>


        </main>


        <!-- START Footer -->
        <?php include_once("footer.php"); ?>
        <!-- END Footer -->


        <script type="text/javascript" src="js/jquery-3.6.3.min.js"></script>
        <script type="text/javascript" src="js/fonctions.js"></script>
        <!-- <script type="text/javascript" src="../js/script-main.js"></script> -->
        <script type="text/javascript" src="js/scripts.js"></script>
        
    </body>

</html>