<?php

    // session_start();

    if (isset($_SESSION['userConnect'])) {
        
        $user_login             = $_SESSION['userConnect'];//Session de l'identifiant utilisateur
        $user_delai             = $_SESSION['userdelais'];//Session du délai d'activités
        $securUser              = $_SESSION['securiteOs'];//Session de la sécurité

    } 
    
    else {
        
        $logEmail               = "exemple@gmail.com";
        $cryptEmail             = str_replace(".", sha1('.'),

                                        str_replace("-", sha1("-"),

                                            str_replace("[]", sha1("[]"),

                                                str_replace("_", sha1("_"),

                                                    str_replace("@", sha1("@"),
                                                        
                                                        $logEmail
                                                    )
                                                
                                                )
                                            
                                            )

                                        )
                                    );

        $securUser              = $cryptEmail."&@=". md5(uniqid(microtime(), TRUE) );
    }
    



?>