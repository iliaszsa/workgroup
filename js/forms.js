(function () {

    "use strict";

    /*  Une fonction facile de sélection */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
          return [...document.querySelectorAll(el)]
        } else {
          return document.querySelector(el)
        }
    }


    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
            if (all) {
            selectEl.forEach(e => e.addEventListener(type, listener))
            } else {
            selectEl.addEventListener(type, listener)
            }
        }
    }

    /*FORMULAIRE D'ENREGISTREMENT D'ANNONCE  */
    on('click', '.add-annnonces', function(e) {

        let     errorMe         = select(".getErrors");

        let     divError        = document.createElement("div");
        divError.className      = "flo-notification alert-error";
        let     msgError            = document.createElement("p");


        let   categorie         = select("#categorie");
        let   design            = select("#designation");
        let   price             = select("#prixannonce");
        let   modela            = select("#modele");
        let   marqua            = select("#marque");
        let   puissa            = select("#puissance");
        let   annea             = select("#anneanc");

        const valCategorie      = categorie.options[categorie.selectedIndex].value;
        const valDesign         = design.value;
        const valPrice          = price.value;
        const valModela         = modela.value;
        const valMarqua         = marqua.value;
        const valPuissa         = puissa.value;
        const valAnnea          = annea.options[annea.selectedIndex].value;
    
        e.preventDefault();

        if (valCategorie        == "CatNulle" || valCategorie == undefined) {
            categorie.focus();
            msgError.innerHTML  = "Veuillez sélectionner une catégorie de votre annonce !";
            errorMe.appendChild(divError).appendChild(msgError);
            setTimeout(() => {
                divError.remove();
            }, 5000);

        }

        else if (valDesign       == "" ) {
            design.focus();
            msgError.innerHTML  = "Veuillez marquer cette annonce en l'attribuant un text unique (exp: 2ème Bugatti) !";
            errorMe.appendChild(divError).appendChild(msgError);
            setTimeout(() => {
                divError.remove();
            }, 5000);

        }

        else if (valPrice       == "" || valPrice <= 0) {
            price.focus();
            msgError.innerHTML  = "Veuillez indiquer le prix de cette annonce (1 € minimum) !";
            errorMe.appendChild(divError).appendChild(msgError);
            setTimeout(() => {
                divError.remove();
            }, 5000);

        }

        else if (valPuissa       == "" || valPuissa < 1) {
            puissa.focus();
            msgError.innerHTML  = "Veuillez indiquer la puissance ou une capacité de fonctionnement de votre << <b class='fw-bolder'>" + valDesign.toUpperCase() + "</b> >> (annonce) !";
            errorMe.appendChild(divError).appendChild(msgError);
            setTimeout(() => {
                divError.remove();
            }, 5000);

        }

        else if (valAnnea       == "AnneeNulle") {
            annea.focus();
            msgError.innerHTML  = "Veuillez sélectionner une année de fabrication ou, création ou, simplement, une année de mis à en vente !";
            errorMe.appendChild(divError).appendChild(msgError);
            setTimeout(() => {
                divError.remove();
            }, 5000);

        }

        else {

            $.ajax({

                url             :   "requettes.php",
                type            :   "POST",
                data            :   "&categ="          + valCategorie  +
                                    "&desig="          + valDesign     +
                                    "&prix="           + valPrice      +
                                    "&mode="           + valModela     +
                                    "&marq="           + valMarqua     +
                                    "&puis="           + valPuissa     +
                                    "&anne="           + valAnnea,
        
                success         : (success_statut) => {
                    
                    if (success_statut  == "annonce_ajouter") {
                        
                        const chargea   = select(".overlays");
                        const linkdir   = select("#linkAnnonce").value;

                        msgError.innerHTML  = "Votre annonce vient d'être ajoutée à votre liste d'annonces, merci !";
                        divError.className  = "flo-notification alert-success fw-bolder";
                        errorMe.appendChild(divError).appendChild(msgError);
                        setTimeout(() => {
                            divError.remove();
                            chargea.classList.remove("d-none");
                        }, 7000);

                        setTimeout(() => {
                            redirige("affaires?annonces=" + linkdir);
                        }, 10000);
                    }

                    else if (success_statut == "echec_insert") {
                        msgError.innerHTML  = "Une erreur s'est produite lors de l'insertion des données de votre annonce !";
                        divError.className  = "flo-notification erreur";
                        errorMe.appendChild(divError).appendChild(msgError);
                        setTimeout(() => {
                            divError.remove();
                        }, 7000);
                    }

                    else if (success_statut == "action_interdite") {
                        msgError.innerHTML  = "Vous n'êtes pas autorisé à dépôser des annonces ! Veuillez vérifier votre connexion, s'il vous plaît !";
                        divError.className  = "flo-notification erreur";
                        errorMe.appendChild(divError).appendChild(msgError);
                        setTimeout(() => {
                            divError.remove();
                        }, 7000);
                    }

                    else {
                        
                        msgError.innerHTML  = "Une erreur " + success_statut + " s'est produite lors de l'enregistrement de votre annonce !";
                        divError.className  = "flo-notification erreur";
                        errorMe.appendChild(divError).appendChild(msgError);
                        setTimeout(() => {
                            divError.remove();
                        }, 7000);
                        
                    }
                },
        
                error           : (error_statut) => {

                    msgError.innerHTML  = "Une erreur [ " + error_statut + " ] s'est produite lors de l'enregistrement de votre annonce !";
                    divError.className  = "flo-notification erreur";
                    errorMe.appendChild(divError).appendChild(msgError);
                    setTimeout(() => {
                        divError.remove();
                    }, 7000);
                }
        
            });

        }
        

        
        /* if (select('#navbar').classList.contains('navbar-mobile')) {
          
          this.nextElementSibling.classList.toggle('dropdown-active')
        } */

    }, true);









})();