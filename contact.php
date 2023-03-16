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
                    
                    <form id="consol-card" class="formulaire pb-30 bg-white">
                        <ul class="list-none pl-5">
                        <?php 

                        

                        foreach ($articles as $key => $larticle) {
                            $numArctile     = $key + 1;

                            echo '
                            <li id="lnLi_0" class="bx-shodow-black mt-7 pb-10 bg-info">
                                <div id="lnDiv_0" class="option-group field">
                                    <label id="lnLabel_0" class="flo-option block">
                                        <input type="checkbox" id="lnInput_0" name="this_line[]" value="this_check" class="">
                                        <span id="lnSpan_0" class="flo-checkbox"></span>
                                        <b id="lnTexte_0" class="txt_liste">'.$larticle['titre'].' '.$numArctile.'</b>
                                        
                                        <i id="btn_modif_0" class="fas fa-pencil-alt fa-lg i-spec"></i>
                                        <i id="btn_suppr_0" class="fas fa-trash fa-lg text-danger i-spec"></i>
                                    </label>

                                    <div class="flo-ui mt-7 notifi_liste ml-5 mr-5">
                                        <div class="flo-notification alert-success">
                                            <p>'.$larticle['description'].' / </p>
                                            <a href="#" class="close-btn">&times;</a>                                  
                                        </div><!-- end .notification alert-success alert-error section -->

                                    </div>

                                </div>
                            </li>
                            
                            ';
                        }

                        ?>

                        </ul>

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