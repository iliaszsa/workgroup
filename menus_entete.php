<header id="header" class="d-flex align-items-center bx-shodow-black">

    <div class="container-fluid container-xxl d-flex align-items-center align-header">

        <div id="div-logo" class="me-auto align-logo">
            <!-- <h1><a href="index.html">Texte<span> du logo</span></a></h1> -->
            <a href="index.html" class="logo me-auto">
                <img src="<?php echo $logo;?>" alt="LOGO" class="img-fluid">
                <span>WORKGROUP</span>
            </a>
        </div>

        <?php  afficher_menu($table_menus); ?>

    </div>
</header><!-- End Header -->