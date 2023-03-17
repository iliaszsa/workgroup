<?php 

    session_start();

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

    <body class="" style="background-image: linear-gradient(to bottom, #4a443b, #564e33, #5a592c, #586726, #4d7524, #537e22, #598720, #60901c, #839414, #a49617, #c39825, #e19839);">

        
        <!-- ======= START Header ======= -->
        <?php 

            $logo           = "logos/reunion.png";

            include __DIR__ . "./tableaux.php";
            include __DIR__ . "./menus_entete.php";

        ?>
        <!-- ======= END Header ======= -->



        <main>

            <section class="back_cover">

                <div class="exercice">Bienvenue <b style="font-weight: 700; color: #0000FF;"><?php echo $name_exo;?> </b></div>


                <div class="lecontenant pb-30">
                    
                    <form class="formulaire pb-30 bg-white">
                        
                    
                        <div class="option-group field bg-info bx-shodow-black mt-7 pb-30"> 
                            
                            <h2 class="style-hx"><i class="fas fa-edit fa-lg"></i> Informations personnelles</h2>

                            <div class="form-row">
                                <section class="colm colm6">
                                    <input type="text" class="flo-input" id="nomInscript" name="nomInscript" autocomplete="off" placeholder="Votre nom..." maxlength="30" onkeyup="enMajuscule(this);">
                                    <label for="nomInscript" class="flop-libele">Votre nom...</label>
                                </section>

                                <section class="colm colm6">
                                    <input type="text" class="flo-input" id="prenomInscript" name="prenomInscript" autocomplete="off" placeholder="Vos prénoms..." maxlength="50" onkeyup="">
                                    <label for="prenomInscript" class="flop-libele">Vos prénoms...</label>
                                </section>

                            </div>

                            <div class="form-row">
                                
                                <section class="colm colm6">
                                    <input type="email" class="flo-input" id="emailInscript" name="emailInscript" autocomplete="off" placeholder="Votre e-mail..." maxlength="200" onkeyup="enMinuscule(this);">
                                    <label for="emailInscript" class="flop-libele">Votre e-mail...</label>
                                </section>
                            
                                <section class="colm colm6">
                                    <input type="text" class="flo-input" id="majTelephone" name="majTelephone" autocomplete="off" placeholder="Numéro de téléphone..." maxlength="24" onkeyup="verif(this);">
                                    <label for="majTelephone" class="flop-libele">Numéro de téléphone...</label>
                                </section>

                            </div>

                            <div class="form-row">

                                <section class="colm colm12">
                                    <input type="password" class="flo-input cnt-pass" id="parampasse" name="parampasse" autocomplete="off" placeholder="Mot de passe actuel..." maxlength="24" onkeyup="">
                                    <label for="parampasse" class="flop-libele">Mot de passe actuel...</label>
                                </section>

                            </div>

                            <div class="form-row">

                                <section class="colm colm6">
                                    <input type="password" class="flo-input cnt-pass" id="majpasse" name="majpasse" autocomplete="off" placeholder="Nouveau mot de passe..." maxlength="24" onkeyup="">
                                    <label for="majpasse" class="flop-libele">Nouveau mot de passe...</label>
                                </section>

                                <section class="colm colm6">
                                    <input type="password" class="flo-input cnt-pass" id="majpasse2" name="majpasse2" autocomplete="off" placeholder="Confirmer le nouveau mot de passe..." maxlength="24" onkeyup="">
                                    <label for="majpasse2" class="flop-libele">Confirmer le nouveau mot de passe...</label>
                                    <a class="button-input text-dark bg-none" onclick="shopass(majpasse2, 'idcnfpass');"><i id="idcnfpass" class="fas fa-eye fa-lg"></i></a>
                                </section>


                            </div>
                            

                            <div class="flo-ui mt-7 notifi_liste wid-lg-70 d-none">
                                <div class="flo-notification alert-error">
                                    <p>Success Notification</p>
                                    <a href="#" class="close-btn">&times;</a>                                  
                                </div><!-- end .notification alert-success alert-error section -->

                            </div>


                            <div class="form-row wid-lg-70 mb-20">
                                <section class="colm colm12 mt-7 text-center">
                                    <button class="btn-save-texte fsize-md">Enregistrer <i class="fas fa-sync fa-lg ml-7"></i></button>
                                </section>
                            </div>


                        </div>



                        <div class="option-group field bg-info bx-shodow-black mt-7 pb-30">

                        </div>
                            
                           

                    </form>



                    
                    <form class="formulaire pb-30">

                        <div class="option-group field bg-info bx-shodow-black mt-7 pb-30">

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