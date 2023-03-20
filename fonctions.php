<?php 

    include_once("config/paramcog.php");

    $newDateMaj     = mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y'));//Date de mise à jour

    // informations sur la page
    $info_page      = pathinfo($_SERVER['PHP_SELF']);

    $dossier_page   = $info_page['dirname'];//Repertoire de la page
    $nom_page       = $info_page['basename'];//Nom et extension de la page
    $ext_page       = $info_page['extension'];//Extension de la page
    $nom_fichier    = $info_page['filename'];//Nom de la page sans extension


    function redirigeThis($page="", $time=3) {
        
        if ($page   != ""  AND !file_exists($page)) {
            
            $newPage    = fopen($page, "w+");
            fwrite($newPage, "");
            fclose($newPage);

            echo'
            <meta http-equiv="refresh" content="5; url='.$page.'">
            ';
        }

        else {
            echo'
            <meta http-equiv="refresh" content="'.$time.'; url='.$page.'">
            ';
        }
        

    } // FIN DE LA FONCTION DE REDIRECTION DES PAGES



    // Return an array with the list of sub directories of $dir
    function getSubDirectories($dir)
    {
        $subDir = array();
        // Get and add directories of $dir
        $directories = array_filter(glob($dir), 'is_dir');
        $subDir = array_merge($subDir, $directories);
        // Foreach directory, recursively get and add sub directories
        foreach ($directories as $directory) $subDir = array_merge($subDir, getSubDirectories($directory.'/*'));
        // Return list of sub directories
        return $subDir;

    } // FIN DE LA FONCTION DE RECUPERATION DES SOUS REPERTOIRES


    function afficher_menu($liste_menus) {
        
        global $info_page, $linkCrypt;

        foreach ($liste_menus as $key => $menus) {  
            
            if ($key       == "Ateliers") {
                echo'            
                <li class="dropdown">

                    <a class="nav-link scrollto" href="#'.$key.'">
                        <span> '.$key.'</span> 
                        <i class="fas fa-chevron-right ml-10"></i>
                    </a>
                    <ul>';
                    foreach ($menus as $nomMenu => $sousmenus) {

                        $maSousMenu     = str_replace("_", " ", substr(strrchr( $sousmenus, "/"), 1) );

                        echo'
                        <li'; if (substr($maSousMenu, 0, 7) != "atelier") {
                            echo ' class="d-none"'; } echo'>
                            <a class="nav-link scrollto ';
                            if( $info_page['basename'] == $sousmenus."/index.php" ){
                                echo' active';
                            }                        
                            echo'" href="'.$sousmenus.'/index.php">'.$maSousMenu.'</a>
                        </li>
                        ';
                    }

                    echo'
                    </ul>

                </li>                
                ';
            } 
            
            elseif ($key       == "Services") {
                echo'            
                <li class="dropdown">

                    <a class="nav-link scrollto" href="#'.$key.'">
                        <span> '.$key.'</span> 
                        <i class="fas fa-chevron-right ml-10"></i>
                    </a>
                    <ul>';
                    foreach ($menus as $nomService => $leservice) {

                        echo'
                        <li>
                            <a class="nav-link scrollto ';
                            if( $info_page['basename'] == $leservice ){
                                echo' active';
                            }                        
                            echo'" href="'.$leservice.'">'.$nomService;
                            if ($nomService == "Connexion") {
                                echo'<i class="fas fa-user-lock fa-lg"></i>';
                            } 
                            elseif ($nomService == "Inscription") {
                                echo'<i class="fas fa-user-plus fa-lg"></i>';
                            }
                            elseif ($nomService == "Contact") {
                                echo'<i class="fas fa-envelope-open-text fa-lg"></i>';
                            }

                            else {
                                echo'<i class="fas fa-moon fa-lg"></i>';
                            }
                            
                            echo'
                            </a>
                        </li>
                        ';
                    }

                    echo'
                    </ul>

                </li>                
                ';
            }

            //Si existance de session active(Afficher le menu compte)
            elseif (isset($_SESSION['userConnect']) AND $key == "Mon compte" || $key == "Profil" || $key == "Taches" || $key == "Panier"  || $key == "Affaires") {
                
                echo'            
                <li class="dropdown">

                    <a class="nav-link scrollto" href="#'.$key.'">
                        <span> '.$key.'</span> 
                        <i class="fas fa-user-lock ml-10"></i>
                    </a>
                    <ul>';
                    foreach ($menus as $nomRubrique => $laRubrique) {

                        echo'
                        <li>
                            <a class="nav-link scrollto text-left';
                            if( $info_page['basename'] == $laRubrique ){ echo' active'; } echo'"';
                                
                                if ($nomRubrique == "Affaires") {

                                    $liens      = substr($laRubrique, 0, 8)."?annonces=".$linkCrypt;

                                    echo' href="'.$liens.'" >';
                                } else {
                                    echo' href="'.$laRubrique.'" >';
                                }
                                    echo $nomRubrique;

                                if ($nomRubrique == "Profil") {
                                    echo'<i class="fas fa-user-tie fa-lg"></i>';
                                } 
                                elseif ($nomRubrique == "Taches") {
                                    echo'<i class="fas fa-list-check fa-lg"></i>';
                                }
                                elseif ($nomRubrique == "Panier") {
                                    echo'<i class="fas fa-cart-plus fa-lg"></i>';
                                }

                                elseif ($nomRubrique == "Affaires") {
                                    echo'<i class="fas fa-business-time fa-lg"></i>';
                                }
                                elseif ($nomRubrique == "Deconnexion") {
                                    echo'<i class="fas fa-power-off fa-lg"></i>';
                                }

                                else {
                                    echo'<i class="fas fa-moon fa-lg"></i>';
                                }
                                

                                // <i class="fas fa-user-lock"></i>
                            
                            echo'
                            </a>
                        </li>
                        ';
                    }

                    echo'
                    </ul>

                </li>                
                ';
            }

            else {
                echo'            
                <li class="'; if ($key  == 'Mon compte' AND  !isset($_SESSION['userConnect']) ) { echo' d-none';} echo ' ">
                    <a class="nav-link scrollto ';
                    if( $info_page['basename'] == $menus ){
                        echo' active';
                    }
                        echo'" href="'.$menus.'">
                        '.$key.'
                    </a>
                </li>                
                ';
            }
            
                
        }

    } // FIN DE LA FONCTION afficher_menu($menus);



    


?>