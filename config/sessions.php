<?php

    if (isset($_GET["log"])) {
        
        $cryptage       =   "[]";  
        $cryptlog       =   $_GET["log"];
        
        $thisCrypt      =   explode($cryptage,
                                str_replace(sha1("&@="), "&@=",
                                    $cryptlog
                                )
                            );
        
        $decryptLog     =   explode("&@=", $thisCrypt[0]);        
        $cryptEmail     =   str_replace(sha1("-"), "-", 
                                str_replace(sha1("_"), "_",
                                    str_replace(sha1("."), ".",
                                        str_replace(sha1("@"), "@",
                                            $decryptLog[1]
                                        )
                                    )
                                )
                            );
                            
        $_SESSION['userConnect']    = $cryptEmail;//Session de l'identifiant utilisateur
    
    }// if(Si capture d'une requêtte $_GET["log"]) {}


    else {

        $error_captGet      = "Aucune capture Get";
    }

    

    
    



?>