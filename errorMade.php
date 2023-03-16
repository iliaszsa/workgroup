<?php 

    if (isset($error_nom)) {
        $aff_error          = "";
        echo'
        <div class="flo-ui mt-7 notifi_liste wid-lg-70 '.$aff_error.'">
            <div class="flo-notification alert-error">
            <p>
                Le champ <b class="text-uppercase text-danger">nom</b> 
                est obligatoir, veuillez le compléter s\'il vous plaît !
            </p>
                <a href="#" class="close-btn">&times;</a>                                  
            </div><!-- end .notification alert-success alert-error section -->

        </div>';
    }
    
    elseif (isset($error_prenom)) {
        $aff_error          = "";
        echo'
        <div class="flo-ui mt-7 notifi_liste wid-lg-70 '.$aff_error.'">
            <div class="flo-notification alert-error">
                <p>'.$error_prenom.'</p>
                <a href="#" class="close-btn">&times;</a>                                  
            </div><!-- end .notification alert-success alert-error section -->

        </div>';
    }

    elseif (isset($error_email)) {
        $aff_error          = "";
        echo'
        <div class="flo-ui mt-7 notifi_liste wid-lg-70 '.$aff_error.'">
            <div class="flo-notification alert-error">
                <p>'.$error_email.'</p>
                <a href="#" class="close-btn">&times;</a>                                  
            </div><!-- end .notification alert-success alert-error section -->

        </div>';
    }

    elseif (isset($error_telephone)) {
        $aff_error          = "";
        echo'
        <div class="flo-ui mt-7 notifi_liste wid-lg-70 '.$aff_error.'">
            <div class="flo-notification alert-error">
                <p>'.$error_telephone.'</p>
                <a href="#" class="close-btn">&times;</a>                                  
            </div><!-- end .notification alert-success alert-error section -->

        </div>';
    }

    elseif (isset($error_passeI)) {
        $aff_error          = "";
        echo'
        <div class="flo-ui mt-7 notifi_liste wid-lg-70 '.$aff_error.'">
            <div class="flo-notification alert-error">
                <p>'.$error_passeI.'</p>
                <a href="#" class="close-btn">&times;</a>                                  
            </div><!-- end .notification alert-success alert-error section -->

        </div>';
    }

    elseif (isset($error_passeII)) {
        $aff_error          = "";
        echo'
        <div class="flo-ui mt-7 notifi_liste wid-lg-70 '.$aff_error.'">
            <div class="flo-notification alert-error">
                <p>'.$error_passeII.'</p>
                <a href="#" class="close-btn">&times;</a>                                  
            </div><!-- end .notification alert-success alert-error section -->

        </div>';
    }

    elseif (isset($error_login)) {
        $aff_error          = "";
        echo'
        <div class="flo-ui mt-7 notifi_liste wid-lg-70 '.$aff_error.'">
            <div class="flo-notification alert-error">
                <p>'.$error_login.'</p>
                <a href="#" class="close-btn">&times;</a>                                  
            </div><!-- end .notification alert-success alert-error section -->

        </div>';
    }

    elseif (isset($error_log)) {
        $aff_error          = "";
        echo'
        <div class="flo-ui mt-7 notifi_liste wid-lg-70 '.$aff_error.'">
            <div class="flo-notification alert-error">
                <p>'.$error_log.'</p>
                <a href="#" class="close-btn">&times;</a>                                  
            </div><!-- end .notification alert-success alert-error section -->

        </div>';
    }

    elseif (isset($success_saisie)) {
        $aff_error          = "";
        echo'
        <div class="flo-ui mt-7 notifi_liste wid-lg-70 '.$aff_error.'">
            <div class="flo-notification alert-success">
                <p>'.$success_saisie.'</p>
                <a href="#" class="close-btn">&times;</a>                                  
            </div><!-- end .notification alert-success alert-error section -->

        </div>';
    }

    else {
        echo'
        <div class="flo-ui mt-7 notifi_liste wid-lg-70 '.$aff_error.'">
            <div class="flo-notification alert-error">
            <p>'.$error_requette.'</p>
                <a href="#" class="close-btn">&times;</a>                                  
            </div><!-- end .notification alert-error alert-error section -->

        </div>';
    }


?>