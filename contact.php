<?php 

    include_once("fonctions.php");
    include_once("les_class.php");

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

            include_once("tableaux.php");
            include_once("menus_entete.php");

        ?>
        <!-- ======= END Header ======= -->


        <div class="overlays d-none"></div>

        <main>

            <section class="back_cover">

                <div class="exercice">Exercice à réaliser : <?php echo $name_exo;?></div>


                <div class="lecontenant">
                    
                    <form class="formulaire pb-30 bg-white" action="contact.php" method="POST">
                        
                        <div class="option-group field bg-info bx-shodow-black mt-7 pb-30 wid-md-50"> 
                            
                            <h2 class="style-hx txt-center">Formulaire de contact</h2>

                            <div class="form-row wid-lg-70">
                                <!-- <label id="LabelNom" class="flo-option block pl-30">Votre nom</label> -->
                                <section class="colm colm12">
                                    <input type="text" class="flo-input nonFocus pl-35" id="nom" name="nom" autocomplete="off" placeholder="Votre nom..." maxlength="30" onkeyup="enMajuscule(this.id);"
                                    value="<?php if (isset($_POST['nom']) ) { echo htmlspecialchars( trim($_POST['nom'])); } ?>">
                                    <label for="nom" class="flop-libele">Votre nom...</label>
                                    <a class="icon-input"><i class="fas fa-user-edit fa-lg"></i></a>
                                </section>

                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                
                                <section class="colm colm12">
                                    <input type="text" class="flo-input nonFocus pl-35" id="prenom" name="prenom" autocomplete="off" placeholder="Votre prénom..." maxlength="50" onkeyup=""
                                    value="<?php if (isset($_POST['prenom']) ) { echo htmlspecialchars( trim($_POST['prenom'])); } ?>">
                                    <label for="prenom" class="flop-libele">Votre prénom...</label>
                                    <a class="icon-input fn-password"><i class="fas fa-user-edit fa-lg"></i></a>
                                </section>
                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                
                                <section class="colm colm12">
                                    <input type="email" class="flo-input nonFocus pl-35" id="email" name="email" autocomplete="off" placeholder="Votre e-mail..." maxlength="200" onkeyup="enMinuscule(this.id);"
                                    value="<?php if (isset($_POST['email']) ) { echo htmlspecialchars( trim($_POST['email'])); } ?>">
                                    <label for="email" class="flop-libele">Votre e-mail...</label>
                                    <a class="icon-input"><i class="fas fa-at fa-lg"></i></a>
                                </section>
                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                
                                <section class="colm colm12">
                                    <input type="text" class="flo-input nonFocus pl-35" id="telephone" name="telephone" autocomplete="off" placeholder="Votre téléphone..." maxlength="10" onkeyup="verif(this);"
                                    value="<?php if (isset($_POST['telephone']) ) { echo htmlspecialchars( trim($_POST['telephone'])); } ?>">
                                    <label for="telephone" class="flop-libele">Votre téléphone...</label>
                                    <a class="icon-input"><i class="fas fa-phone fa-lg"></i></a>
                                </section>
                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                
                                <section class="colm colm12">
                                   <textarea class="flo-textarea nonFocus pl-35" name="message" id="message" cols="30" rows="10" placeholder="Votre message..."></textarea>
                                    <label for="mot_de_passe" class="flop-libele">Votre message...</label>
                                    <a class="icon-input"><i class="fas fa-message fa-lg"></i></a>
                                    <span class="flo-hint pt-xs pb-xs">Votre message doit être bref et précis, merci... <i class="fw-bolder count-chars">0</i>/500</span>
                                </section>
                            </div>
                        

                            <?php 
                                
                                include_once("formulaires.php"); 
                                include_once("errorMade.php");
                                
                            ?>


                            <div class="form-row wid-lg-70 mb-20">
                                <section class="colm colm12 mt-7 text-center">
                                    <button class="btn-save-texte fsize-md add-connexion">Envoyer <i class="fas fa-chevron-right fa-lg ml-7"></i></button>
                                </section>
                            </div>


                        </div>
                            
                           

                    </form>                
                
                </div>



            </section>

            

            


        </main>


        <!-- START Footer -->
        <?php include_once("footer.php"); ?>
        <!-- END Footer -->


        <script type="text/javascript" src="js/jquery-3.6.3.min.js"></script>
        <script type="text/javascript" src="js/fonctions.js"></script>
        <!-- <script type="text/javascript" src="../js/script-main.js"></script> -->
        <script type="text/javascript" src="js/scripts.js"></script>

        <script>
            
            if (<?php echo isset($formulaire_valide) AND $formulaire_valide == "INSERTION" ?>) {

                setTimeout(() => {
                    document.querySelector(".overlays").classList.remove("d-none");
                }, 5000);

                setTimeout(() => {
                    redirige("connexion.php");
                }, 8000); 
            }

        </script>



        
    </body>

</html>