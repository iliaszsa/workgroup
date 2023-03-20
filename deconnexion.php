<?php 
    
    session_start();

    if (isset($_SESSION['userConnect'])) {
        unset($_SESSION['userConnect'], $_SESSION['userdelais'], $_SESSION['securiteOs'] );
        session_destroy();
    }
        

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

        <div class="overlays"></div>

        <main>

            <section class="back_cover" style="z-index: 1000;">

                <div class="exercice">Exercice à réaliser : <?php echo $name_exo;?></div>


                <div class="lecontenant">
                    
                    <form class="formulaire pb-30 bg-white">
                        
                    
                        <div class="option-group field bg-info bx-shodow-black mt-7 pb-30 wid-md-50"> 
                            
                            <h2 class="style-hx txt-center">Déconnexion de l'interface membre</h2>
                            
                            <div class="form-row wid-lg-70">
                                <section class="colm colm12">
                                    <input type="text" class="flo-input" id="identifiant" name="identifiant" autocomplete="off" placeholder="Identifiant..." maxlength="50" onkeyup="" disabled>
                                    <label for="identifiant" class="flop-libele">Identifiant...</label>
                                </section>

                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                <section class="colm colm12">
                                    <input type="password" class="flo-input" id="passeWord" name="passeWord" autocomplete="off" placeholder="Mot de passe..." maxlength="24" onkeyup="" disabled>
                                    <label for="passeWord" class="flop-libele">Mot de passe...</label>
                                </section>
                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                <a href="" class="ml-20 text-dark"><i class="fas fa-head-side-virus fa-lg mr-7"></i>Mot de passe oublié</a>
                                <a href="inscription.php" class="ml-20 text-dark">M'inscrire <i class="fas fa-user-plus fa-lg"></i></a>
                                <label class="flo-option block ml-10">
                                    <input type="checkbox" id="lnInput_0" name="this_line[]" value="this_check" class="">
                                    <span class="flo-checkbox"></span>
                                    <b class="txt_liste">Se souvenir de moi</b>
                                </label>
                            </div>



                            <?php 
                                
                                include_once("formulaires.php");
                                include_once("errorMade.php");
                                
                            ?>


                            <div class="form-row wid-lg-70 mb-20">
                                <section class="colm colm12 mt-7 text-center">
                                    <button class="btn-save-texte fsize-md add-connexion">Me connecter <i class="fas fa-key fa-lg ml-7"></i></button>
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
        <!-- <script type="text/javascript" src="js/script-main.js"></script> -->
        <script type="text/javascript" src="js/scripts.js"></script>

        <script>            
            
            setTimeout(() => {
                redirige("connexion.php");
            }, 3000);

        </script>
        
    </body>

</html>