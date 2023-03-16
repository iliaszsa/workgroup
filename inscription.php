<?php 

    include __DIR__ ."./fonctions.php";
    include __DIR__ ."./les_class.php";

    $repMenus       = "ateliers";
    $name_exo       = strtoupper( $nom_fichier );
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


                <div class="lecontenant">
                    
                    <form class="formulaire pb-30 bg-white" action="./inscription.php" method="POST">
                        
                    
                        <div class="option-group field bg-info bx-shodow-black mt-7 pb-30 wid-md-50"> 
                            
                            <h2 class="style-hx txt-center">Inscription à l'interface membre</h2>

                            <div class="form-row wid-lg-70">
                                <label id="LabelNom" class="flo-option block pl-30">Votre nom</label>
                                <section class="colm colm12">
                                    <input type="text" class="flo-input" id="nom" name="nom" autocomplete="off" placeholder="Votre nom..." maxlength="30" onkeyup="enMajuscule(this);" onfocus="affich_div('LabelNom');" onblur="affich_div('LabelNom');">
                                    <label for="nom" class="flop-libele">Votre nom...</label>
                                </section>

                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                <label id="LabelPrenom" class="flo-option block pl-30">Vos prénoms</label>
                                <section class="colm colm12">
                                    <input type="text" class="flo-input" id="prenom" name="prenom" autocomplete="off" placeholder="Vos prénoms..." maxlength="50" onkeyup="" onfocus="affich_div('LabelPrenom');" onblur="affich_div('LabelPrenom');">
                                    <label for="prenom" class="flop-libele">Vos prénoms...</label>
                                </section>
                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                <label id="LabelEmail" class="flo-option block pl-30">Votre e-mail</label>
                                <section class="colm colm12">
                                    <input type="email" class="flo-input" id="email" name="email" autocomplete="off" placeholder="Votre e-mail..." maxlength="200" onkeyup="enMinuscule(this);" onfocus="affich_div('LabelEmail');" onblur="affich_div('LabelEmail');">
                                    <label for="email" class="flop-libele">Votre e-mail...</label>
                                </section>
                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                <label id="LabelPassword" class="flo-option block pl-30">Mot de passe</label>
                                <section class="colm colm12">
                                    <input type="password" class="flo-input" id="mot_de_passe" name="mot_de_passe" autocomplete="off" placeholder="Mot de passe..." maxlength="24" onkeyup="" onfocus="affich_div('LabelPassword');" onblur="affich_div('LabelPassword');">
                                    <label for="mot_de_passe" class="flop-libele">Mot de passe...</label>
                                </section>
                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                <label id="LabelPassword2" class="flo-option block pl-30">Confirmer le mot de passe</label>
                                <section class="colm colm12">
                                    <input type="password" class="flo-input" id="mot_de_passe2" name="mot_de_passe2" autocomplete="off" placeholder="Confirmer le mot de passe..." maxlength="24" onkeyup="" onfocus="affich_div('LabelPassword2');" onblur="affich_div('LabelPassword2');">
                                    <label for="mot_de_passe2" class="flop-libele">Confirmer le mot de passe...</label>
                                </section>
                            </div>
                            

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                <a href="connexion.php" class="ml-20 text-dark">Me connecter <i class="fas fa-user-lock fa-lg"></i></a>
                            </div>

                            <?php 
                                
                                include_once __DIR__ . "./formulaires.php"; 
                                include_once __DIR__ . "./errorMade.php";
                                
                            ?>


                            <div class="form-row wid-lg-70 mb-20">
                                <section class="colm colm12 mt-7 text-center">
                                    <button class="btn-save-texte fsize-md add-connexion">M'inscrire <i class="fas fa-user-check fa-lg ml-7"></i></button>
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