<?php 

    
    
    $domaine        = "localhost";
    $useRoot        = "root";
    $userPass       = "";


    // LISTE DES BASES DES DONNEES
    $dbformat       = "format_2023";




    $config 	    = mysqli_connect("$domaine", "$useRoot", "$userPass", "$dbformat");

                        //Tentative de connexion
                        if($config === false) {
                            die("Erreur de connexion à la base de données !". mysqli_connect_error($config));
                        }                        
                        else {
                            // mysqli_query($config, "SET NAMES 'utf8'");
                            mysqli_set_charset($config, 'utf8mb4');

                        }

    
    // FONCTION DE CONNEXION A LA BDD
    function connect_format2023 () {
        // LISTE DES BASES DES DONNEES
        global $domaine, $useRoot, $userPass, $dbformat;
	    return new PDO( "mysql:host=$domaine;dbname=".$dbformat."",
                        "".$useRoot."",
                        "".$userPass."",        
                        array(  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4")
                    );
	}


    
    if (isset($_SESSION['userConnect'])) {
        $linkCrypt          = md5($_SESSION['userConnect']."&@=".md5(uniqid(microtime(), TRUE) ) );
    } else {
        $linkCrypt          = md5($_SESSION['userConnect']."&@=".md5(uniqid(microtime(), TRUE) ) );
    }
    

    


?>