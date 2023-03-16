<?php 

    include __DIR__ ."./fonctions.php";
    include __DIR__ ."./les_class.php";

    $repMenus       = "ateliers";
    $name_exo       = strtoupper( "Mes ". $nom_fichier );
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

            include __DIR__ . "./tableaux.php";
            include __DIR__ . "./menus_entete.php";

        ?>
        <!-- ======= END Header ======= -->



        <main>

            <section class="back_cover">

                <div class="exercice">Exercice à réaliser : <?php echo $name_exo;?></div>


                <div class="lecontenant pb-30">
                    
                    <form class="formulaire pb-30 bg-white" action="./affaires.php" method="POST">
                        
                    
                        <div class="option-group field bg-info bx-shodow-black mt-7 pb-30 wid-md-50"> 
                            
                            <h2 class="style-hx"><i class="fas fa-business-time fa-lg"></i> Ajout d'une ou plusieurs annonces</h2>

                            <div class="form-row wid-lg-70">
                                <label for="categorie" id="LabelCateg" class="flo-option block pl-30">Catégorie de l'annonce</label>
                                <section class="colm colm12">
                                    <label for="" class="flo-select">
                                        <select name="categorie" id="categorie"  onfocus="affich_div('LabelCateg');" onblur="affich_div('LabelCateg');">
                                            <option value="typeNulle" selected disabled>Catégorie...</option>
                                            <option value="VOITURES">Voitures</option>
                                            <option value="CMIONS">Camions</option>
                                            <option value="MINI PELLE">Mini-pelle</option>
                                            <option value="AUTRES PRODUITS">Autres produits</option>
                                            
                                        </select>
                                        <i class="arrow double"></i>
                                    </label>
                                    <!-- <label for="categorie" class="flop-libele d-none">Libélé champ</label> -->
                                    
                                </section>
                            </div>
                            
                            <div class="form-row wid-lg-70">
                                <label for="designation" id="LabelDesign" class="flo-option block pl-30">Désignation</label>
                                <section class="colm colm12">
                                    <input type="text" class="flo-input" id="designation" name="designation" autocomplete="off" placeholder="Désignation..." maxlength="30" onkeyup="enMajuscule(this);"
                                        onfocus="affich_div('LabelDesign');" onblur="affich_div('LabelDesign');">
                                    <label for="designation" class="flop-libele">Désignation...</label>
                                </section>

                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                <label for="prixannonce" id="LabelPrix" class="flo-option block pl-30">Prix départ</label>
                                <section class="colm colm12">
                                    <input type="text" class="flo-input" id="prixannonce" name="prixannonce" autocomplete="off" placeholder="Prix départ..." maxlength="50" onkeyup="verif(this);"
                                        onfocus="affich_div('LabelPrix');" onblur="affich_div('LabelPrix');">
                                    <label for="prixannonce" class="flop-libele">Prix départ...</label>
                                </section>
                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                <label for="modele" id="LabelModel" class="flo-option block pl-30">Modele de voiture</label>
                                <section class="colm colm12">
                                    <input type="text" class="flo-input" id="modele" name="modele" autocomplete="off" placeholder="Modele de voiture..." maxlength="200" onkeyup="enMinuscule(this);"
                                        onfocus="affich_div('LabelModel');" onblur="affich_div('LabelModel');">
                                    <label for="modele" class="flop-libele">Modele de voiture...</label>
                                </section>
                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                <label for="marque" id="LabelMarque" class="flo-option block pl-30">Marque de la voiture</label>
                                <section class="colm colm12">
                                    <input type="text" class="flo-input" id="marque" name="marque" autocomplete="off" placeholder="Marque de la voiture..." maxlength="24" onkeyup=""
                                        onfocus="affich_div('LabelMarque');" onblur="affich_div('LabelMarque');">
                                    <label for="marque" class="flop-libele">Marque de la voiture...</label>
                                </section>
                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                <label for="puissance" id="LabelPuissance" class="flo-option block pl-30">Puissance du moteur</label>
                                <section class="colm colm12">
                                    <input type="text" class="flo-input" id="puissance" name="puissance" autocomplete="off" placeholder="Puissance du moteur..." maxlength="2" onkeyup="verif(this);"
                                        onfocus="affich_div('LabelPuissance');" onblur="affich_div('LabelPuissance');">
                                    <label for="puissance" class="flop-libele">Puissance du moteur...</label>
                                </section>
                            </div>
                            

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                <a href="affaires?annonces=<?php echo $securUser;?>" class="ml-20 text-dark">
                                    <i class="fas fa-folder-tree fa-lg mr-7"></i>Voir mes annonces
                                </a>
                            </div>

                            <?php 
                                
                                include_once __DIR__ . "./formulaires.php"; 
                                include_once __DIR__ . "./errorMade.php";
                                
                            ?>


                            <div class="form-row wid-lg-70 mb-20">
                                <section class="colm colm12 mt-7 text-center">
                                    <button class="btn-save-texte fsize-md add-connexion">Publier l'annonce <i class="fas fa-arrow-up-right-from-square fa-lg mr-7"></i></button>
                                </section>
                            </div>


                        </div>
                            
                           

                    </form>                
                
                </div>



            </section>

            

            


        </main>


        <!-- START Footer -->
        <?php include __DIR__ . "./footer.php"; ?>
        <!-- END Footer -->


        <script type="text/javascript" src="./js/jquery-3.6.3.min.js"></script>
        <script type="text/javascript" src="./js/fonctions.js"></script>
        <!-- <script type="text/javascript" src="../js/script-main.js"></script> -->
        <script type="text/javascript" src="./js/scripts.js"></script>
        
    </body>

</html>