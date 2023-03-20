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
                    
                    <form class="formulaire pb-30 bg-white" action="connexion.php" method="POST">
                        
                    
                        <div class="option-group field bg-info bx-shodow-black mt-7 pb-30 wid-md-50"> 
                            
                            <h2 class="style-hx txt-center">Connexion à l'interface membre</h2>
                            
                            <div class="form-row wid-lg-70">
                                <section class="colm colm12">
                                    <input type="text" class="flo-input nonFocus pl-35" id="identifiant" name="identifiant" autocomplete="off" placeholder="Identifiant..." maxlength="50" onkeyup=""
                                        value="<?php if (isset($_POST['identifiant']) ) { echo htmlspecialchars( trim($_POST['identifiant'])); } ?>">
                                    <label for="identifiant" class="flop-libele">Identifiant...</label>
                                    <a class="icon-input fn-password"><i class="fas fa-lock fa-lg"></i></a>
                                </section>

                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                
                                <section class="colm colm12">
                                    <input type="password" class="flo-input nonFocus pl-35" id="passeWord" name="passeWord" autocomplete="off" onpaste="return false" placeholder="Mot de passe..." maxlength="24" onkeyup=""
                                    value="<?php if (isset($_POST['passeWord']) ) { echo htmlspecialchars( trim($_POST['passeWord'])); } ?>">
                                    <label for="passeWord" class="flop-libele">Mot de passe...</label>
                                    <a class="icon-input fn-password"><i class="fas fa-key fa-lg"></i></a>
                                </section>
                            </div>

                            <div class="form-row wid-lg-70" style="margin-top: -15px;">
                                <a href="" class="ml-20 text-dark"><i class="fas fa-head-side-virus fa-lg mr-7"></i>Mot de passe oublié</a>
                                <a href="inscription.php" class="ml-20 text-dark">M'inscrire <i class="fas fa-user-plus fa-lg"></i></a>
                                <label class="flo-option block ml-10" for="userMomory">
                                    <input type="checkbox" id="userMomory" name="userMomory" value="this_check" class="">
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
        <?php include("footer.php"); ?>
        <!-- END Footer -->


        <script type="text/javascript" src="js/jquery-3.6.3.min.js"></script>
        <script type="text/javascript" src="js/fonctions.js"></script>
        <!-- <script type="text/javascript" src="../js/script-main.js"></script> -->
        <script type="text/javascript" src="js/scripts.js"></script>

        <script>

            const varLoad   = document.querySelector(".overlays");

            if (<?php echo isset($sessionConnect) ?>) {

                setTimeout(() => {
                    varLoad.classList.remove("d-none");
                }, 3000);                    
                setTimeout(() => {
                    document.querySelector("#identifiant").value = "";
                    document.querySelector("#passeWord").value = "";
                    redirige("espace-user?log=<?php echo $securUser; ?>");
                }, 5000); 
            }

            else {
                varLoad.classList.add("d-none");
            }

        </script>

        
    </body>

</html>