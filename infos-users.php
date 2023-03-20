

    <div class="form-row">
        <section class="colm colm6">
            <input type="text" class="flo-input nonFocus pl-35" id="nomInscript" name="nomInscript" autocomplete="off" placeholder="Votre nom..."
                maxlength="30" onkeyup="enMajuscule(this);" value="<?php echo $log_nom;?>" readonly>
            <label for="nomInscript" class="flop-libele">Votre nom...</label>
            <a class="icon-input"><i class="fas fa-user-tie fa-lg"></i></a>
        </section>

        <section class="colm colm6">
            <input type="text" class="flo-input nonFocus pl-35" id="prenomInscript" name="prenomInscript" autocomplete="off" placeholder="Vos prénoms..."
                maxlength="50" onkeyup="" value="<?php echo $log_prenom;?>" readonly>
            <label for="prenomInscript" class="flop-libele">Vos prénoms...</label>
            <a class="icon-input"><i class="fas fa-user-tie fa-lg"></i></a>
        </section>

    </div>

    <div class="form-row">
        
        <section class="colm colm6">
            <input type="email" class="flo-input nonFocus pl-35" id="emailInscript" name="emailInscript" autocomplete="off" placeholder="Votre e-mail..."
                maxlength="200" onkeyup="enMinuscule(this);" value="<?php echo $log_email;?>" readonly>
            <label for="emailInscript" class="flop-libele">Votre e-mail...</label>
            <a class="icon-input"><i class="fas fa-envelope-circle-check fa-lg"></i></a>
        </section>

        <section class="colm colm6">
            <input type="text" class="flo-input nonFocus pl-35" id="majTelephone" name="majTelephone" autocomplete="off" placeholder="Numéro de téléphone..." maxlength="24"
                onkeyup="verif(this);" value="<?php echo $log_tel;?>" readonly>
            <label for="majTelephone" class="flop-libele">Numéro de téléphone...</label>
            <a class="icon-input"><i class="fas fa-phone fa-lg"></i></a>
        </section>

    </div>

    <div class="form-row">

        <section class="colm colm12">
            <input type="password" class="flo-input nonFocus pl-35" id="parampasse" name="parampasse" autocomplete="off" placeholder="Mot de passe actuel..."
                maxlength="24" onkeyup="" onpaste="return false">
            <label for="parampasse" class="flop-libele">Mot de passe actuel...</label>
            <a class="icon-input fn-password"><i class="fas fa-eye fa-lg"></i></a>
        </section>

    </div>

    <div class="form-row">

        <section class="colm colm6">
            <input type="password" class="flo-input nonFocus pl-35" id="majpasse" name="majpasse" autocomplete="off" placeholder="Nouveau mot de passe..."
                maxlength="24" onkeyup="" onpaste="return false">
            <label for="majpasse" class="flop-libele">Nouveau mot de passe...</label>
            <a class="icon-input fn-password"><i class="fas fa-eye fa-lg"></i></a>
        </section>

        <section class="colm colm6">
            <input type="password" class="flo-input nonFocus pl-35" id="majpasse2" name="majpasse2" autocomplete="off" placeholder="Confirmer le nouveau mot de passe..."
                maxlength="24" onkeyup="" onpaste="return false">
            <label for="majpasse2" class="flop-libele">Confirmer le nouveau mot de passe...</label>
            <a class="icon-input fn-password"><i class="fas fa-eye fa-lg"></i></a>
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



    <div class="option-group field bg-secondary bx-shodow-black mt-7 pb-30"></div>
    <div class="option-group field bg-warning bx-shodow-black mt-7 pb-30"></div>
    <div class="option-group field bg-info bx-shodow-black mt-7 pb-30"></div>