<?php 

    session_start();

    include_once("config/sessions.php");
    include_once("fonctions.php");
    include_once("les_class.php");

    $cle_user                   = connect_format2023();

    $repMenus                   = "ateliers";
    $name_exo                   = strtoupper( $nom_fichier );
    if (!isset($name_exo)) {
        $name_exo = "NON IDENTIFIE !";  
    }




?>


<!DOCTYPE html>
<html lang="fr">

    <?php include_once("heade.php"); ?>

    <body class="userSessions">

        
        <!-- Vérification d'existance de session active et récupération des données utilisateur -->
        <?php 
        
        if (isset($_SESSION['userConnect']) ) {

            $log_user               = $_SESSION['userConnect'];//
            $limiteSession          = mktime(date('H') + 1, date('i'), date('s'), date('m'), date('d'), date('Y'));//Durée de la session ouverte
            
            $getUser                = ("SELECT * FROM utilisateurs WHERE email = :email OR telephone = :telephone ");
            $focus                  = $cle_user ->prepare($getUser);
            $focus                  -> bindValue(':email', $log_user, PDO::PARAM_STR);
            $focus                  -> bindValue(':telephone', $log_user, PDO::PARAM_STR);
            $focus                  -> execute();
            $infoUser               = $focus -> fetchAll();
            $userExist              = $focus -> rowCount();

            if ($userExist          > 0) {
                
                foreach ($infoUser as $indeks => $valUser) {
                    
                    $log_id         = $valUser['id'];//
                    $log_login      = $valUser['login'];//
                    $log_nom        = $valUser['nom'];//
                    $log_prenom     = $valUser['prenom'];//
                    $log_email      = $valUser['email'];//
                    $log_tel        = $valUser['telephone'];//
                    $log_pass       = $valUser['password'];//
                    $log_infos      = $valUser['details'];//
                    $log_datEdite   = $valUser['datEdite'];//
                    $log_statut     = $valUser['statut'];//
                    $log_dateMaj    = $valUser['dateMaj'];//
                
                    $nomPseudo      = $log_nom . " " . $log_prenom;
                    $_SESSION['userId']         = $log_id;//Session de l'identifiant utilisateur
                    $_SESSION['userDelais']     = $limiteSession;//Session du délai d'activités

                }


            } 
            else {
                
                $userExist          = "moinZero";
                $nomPseudo          = $name_exo;
            }
            
        } 
        
        else { 
            
            $userExist              = "moinZero";
            $nomPseudo              = $name_exo;
            $lock_autoriz           = "AUCUNE CONNEXION";
        }

        ?>
        



        <!-- ======= START Header ======= -->
        <?php 

            $logo           = "logos/reunion.png";

            include_once("tableaux.php");
            include_once("menus_entete.php");

        ?>
        <!-- ======= END Header ======= -->


        <div class="overlays">
            <div class="textOverlays">Chargement...</div>
        </div>

        <main class="pb-60">

            <section class="back_cover mb-90 hgt-7">
                <div class="exercice">Bienvenue <strong><?php echo $nomPseudo;?> </strong></div>
            </section>

            <section class="une_section">
                <h3><i class="fas fa-user-shield fa-lg mr-7"></i> Informations personnelles</h3>
                <form class="formulaire pb-20">
                    <?php 
                        include_once('infos-users.php');
                    ?>                            
                </form>

            </section>


            <section class="une_section">
                <h3><i class="fas fa-user-shield fa-lg mr-7"></i> Titre des informations</h3>
                <form class="formulaire pb-20">
                    <?php 
                        include('infos-users.php');
                    ?>
                            
                </form>
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
                verif_mySessions('<?php echo $_SESSION["userConnect"];?>');
            }, 500);
        </script>
        
    </body>

</html>