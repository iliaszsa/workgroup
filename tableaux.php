<?php 

    if (is_dir($repMenus)) {
        $dos_ateliers  = getSubDirectories($repMenus);
    }
    else {
        $dos_ateliers  = getSubDirectories("ateliers");
    }

    $sous_ateliers     = Array();

    
    foreach ($dos_ateliers as $key => $dossier) {
    array_push($sous_ateliers, /*substr(strrchr( */$dossier/*, "/"), 1)*/ );
    }

    if (!isset($nomTableau)) {
        $nomTableau         = "table_menus";
    }
    
        
    
    $services_menus     =   [   "Connexion"     => "connexion.php",
                                "Inscription"   => "inscription.php",
                                "Contact"       => "contact.php"
                            ];        
    // FIN DU TABLEAU $services_menus [];
    
    $menus_comptes     =    [   "Profil"        => "",
                                "Taches"        => "services.php",
                                "Panier"        => "panier.php",
                                "Affaires"      => "affaires.php",
                                "Deconnexion"   => "deconnexion.php"
                            ];        
    // FIN DU TABLEAU $menus_comptes [];



    $table_menus        =   [   "Accueil"        => "index.php",
                                "Blog"          => "blog.php",
                                "Ateliers"      => $sous_ateliers,
                                "Services"      => $services_menus,
                                "Recherche"     => "recherche.php",
                                "Mon compte"    => $menus_comptes
                            ];

    // FIN DE LA TABLEAU $table_menus [];   

    
    $articles           =   [   ["titre" => "Acticle", "description" => "Test description" ],
                                ["titre" => "Acticle", "description" => "Test description" ],
                                ["titre" => "Acticle", "description" => "Test description" ],
                                ["titre" => "Acticle", "description" => "Test description" ],
                                ["titre" => "Acticle", "description" => "Test description" ],
                                ["titre" => "Acticle", "description" => "Test description" ],
                                ["titre" => "Acticle", "description" => "Test description" ],
                                ["titre" => "Acticle", "description" => "Test description" ],
                                ["titre" => "Acticle", "description" => "Test description" ],
                                ["titre" => "Acticle", "description" => "Test description" ]
                            ];
    // FIN DE LA TABLEAU $articles [];
    
    $mes_icons          =   [   0 => "",
                                1 => "bi-camera2",
                                2 => "bi-camera2",
                                3 => "bi-chat-square-quote",
                                4 => "bi-envelope-open",
                                5 => "bi-basket2-fill"
                            ];
    // FIN DE LA TABLEAU $mes_icons [];





?>