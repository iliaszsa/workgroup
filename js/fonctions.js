function getXMLHttpRequest() {
    var xhr = null;
     
    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }
     
    return xhr;
}


const   divNotif    = document.querySelector(".notifi_liste");//Plage de notification des opération
const   divMsg      = document.querySelector(".notifi_liste .flo-notification p");//Paragraphe d'alerte


let regexmail       = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

let nbr_char        = 8; //generation d'un nombre à 8 chiffres
let y               = Math.random();
let nb              = y * Math.pow(10, nbr_char);
let code_passe      = Math.round(nb);
if (code_passe.length <= 7) { code_passe = code_passe + "1";}



function verif(chars) {
    // Caractères autorisés
    let regex = new RegExp("[0-9]", "i");
    let valid;
    for (x = 0; x < chars.value.length; x++) {
        valid = regex.test(chars.value.charAt(x));
        if (valid == false) {
            chars.value = chars.value.substring(0, x) + chars.value.substring(x + 1, chars.value.length - x + 1); x--;
        }
    }
}

function verif_date(chiff) {
    // Caractères autorisés
    var regex = new RegExp("[:/0-9]", "i");
    var valid;
    for (x = 0; x < chiff.value.length; x++) {
        valid = regex.test(chiff.value.charAt(x));
        if (valid == false) {
            chiff.value = chiff.value.substring(0, x) + chiff.value.substring(x + 1, chiff.value.length - x + 1); x--;
        }
    }
}


//////////// Fonction affiche/masque div ////////////////
function affich_div(div, option) {
    
    var id_div = document.getElementById(div);

    if (option == '' || option == undefined) {option = "block";}

        
    if (id_div.style.display == "none") {

        id_div.style.display = option;
    }

    else {

        id_div.style.display = "none";
    }
}


function afficher_masque(element_cacher, option) {
    
    var get_IdMasque = document.getElementById(element_cacher);

    if (option == undefined || option == "") { option = "block";}

    get_IdMasque.style.display = option;
}


function masquer_affiche(element_afficher) {
    
    var get_IdAffiche = document.getElementById(element_afficher);
    get_IdAffiche.style.display = "none";
}


function affich_cache(div_x, div_y, option) {

    var divx_x = document.getElementById(div_x); // Article à masquer
    var divy_y = document.getElementById(div_y); // Les boutons des commentaires à masquer

    if (option  == undefined  || option == "") {option = "block";}
    
    if (divy_y.style.display = "none") {

        divx_x.style.display = "none";
        divy_y.style.display = option;
    }

    else {

        divx_x.style.display = option;
        divy_y.style.display = "none";
    }

}



function afficher_modal(id_modal, var_option) {


    if (var_option == null || var_option == '' ||  var_option == undefined ) {
    
        $('#' + id_modal).modal('show');

    }

    else {

        if (var_option  == "true" || var_option  == "T"  || var_option == "OUI" || var_option == "O"  || var_option == "Y"  || var_option == 1) {

            $('#' + id_modal).modal({

                show    : true,
                backdrop: false,
                keyboard: false

            });
        }

        else if (var_option  == "false" || var_option  == "F"  || var_option == "NON"  || var_option == "N"  || var_option == 0) {

            $('#' + id_modal).modal('show');
        }

    }
}


function masquer_modal(id_modal) {
    
    $('#' + id_modal).modal('hide');
}

///****************** Fonction qui remplit un champ, select, div et span ***************************************
function RemplirThis($object, $valeur) {
    
    var tagbalise = document.getElementById($object).tagName;
    var baliseValue = document.getElementById($object);

    if (tagbalise == "SPAN" || tagbalise == "DIV" || tagbalise == "SMALL" || tagbalise == "OPTGROUP") {

        baliseValue.innerHTML = $valeur;

    }

    else if (tagbalise == "label" || tagbalise == "fieldset") {

        baliseValue.innerHTML = $valeur;

    }

    else if (tagbalise == "UL" || tagbalise == "LI") {

        baliseValue.innerHTML = $valeur;

    }

    else if (tagbalise == "INPUT" || tagbalise == "TEXTAREA") {

        baliseValue.value = $valeur;
    }

    else if (tagbalise == "SELECT") {

        baliseValue.options[baliseValue.selectedIndex].value = $valeur;
    }

    else if (tagbalise == "IMG" || tagbalise == "img") {

        tagbalise.src = $valeur;
    }
    
}



///****************** Fonction qui vide un champ, select, div et span  ***************************************
function ViderThis($this) {

    var tagbalise   = document.getElementById($this).tagName;
    var baliseValue = document.getElementById($this);

    if (tagbalise   == "SPAN" || tagbalise == "DIV") {

        baliseValue.innerHTML = "";

    }


    else if (tagbalise == "UL" || tagbalise == "LI") {

        baliseValue.innerHTML = "";

    }

    else if (tagbalise == "INPUT" || tagbalise == "TEXTAREA") {

        baliseValue.value = "";
    }

    else if (tagbalise == "SELECT") {

        baliseValue.selectedIndex = 0;
    }

    

}

function redirige($page, $onglet) {
    
    if ($onglet == "" || $onglet == undefined) {
        window.location.href = $page;
    }
    else {
        window.open($page, "_blank");
    }
    
}



//+================================================================================================================
//GENERATION DE CODE/MOT DE PASSE PROVISOIR
function generer_codePass(champ_code) {
    
    var nbr_char        = 8; //generation d'un nombre à 8 chiffres
    var x               = Math.random();
    var nb              = x * Math.pow(10, nbr_char);
    code_passe          = Math.round(nb);
    if (code_passe.length <= 7) { code_passe = code_passe + "1";}

    if (champ_code      == "" || champ_code == undefined) { 

        return code_passe;
    }
    else {

        var idgener     = document.getElementById(champ_code);
        idgener.value   = code_passe;
    }
    
    
}



///****************** Fonction qui vide un champ, select, div et span  ***************************************
function getSelection_index($this, $index) {

    var tagbalise   = document.getElementById($this).tagName;
    var baliseValue = document.getElementById($this);

    baliseValue.selectedIndex = $index;

}



function getFocusThis(champ) {

    var natur_balise    = document.getElementById(champ).tagName;
    var selectBalise    = document.getElementById(champ);

    if (natur_balise    == "SPAN" || natur_balise == "DIV") {

        //document.location.href = "#" + selectBalise;
        selectBalise.focus();

    }


    else if (natur_balise == "UL" || natur_balise == "LI") {

        //document.location.href = "#" + selectBalise;
        selectBalise.focus();

    }

    else if (natur_balise == "INPUT" || natur_balise == "TEXTAREA") {

        selectBalise.focus();
    }

    else if (natur_balise == "SELECT") {

        selectBalise.focus();
    }

}


function selectContent(champ) {

    var natur_balise    = document.getElementById(champ).tagName;
    var selectBalise    = document.getElementById(champ);

    if (natur_balise    == "SPAN" || natur_balise == "DIV") {

        //document.location.href = "#" + selectBalise;
        selectBalise.select();

    }


    else if (natur_balise == "UL" || natur_balise == "LI") {

        //document.location.href = "#" + selectBalise;
        selectBalise.select();

    }

    else if (natur_balise == "INPUT" || natur_balise == "TEXTAREA") {

        selectBalise.select();
    }

    else if (natur_balise == "SELECT") {

        selectBalise.select();
    }

}



function change_attribute(champ, attrib, new_attribut) {

    var natur_balise    = document.getElementById(champ).tagName;
    var selectBalise    = document.getElementById(champ);

    selectBalise.setAttribute(attrib, new_attribut);

}

function suppr_attribute(champ, attrib) {

    var natur_balise    = document.getElementById(champ).tagName;
    var selectBalise    = document.getElementById(champ);

    selectBalise.removeAttribute(attrib);

}


function ajout_attribute(champ, attrib) {

    var natur_balise    = document.getElementById(champ).tagName;
    var selectBalise    = document.getElementById(champ);

    selectBalise.setAttribute(attrib);


}


function disabledThis(champ) {

    var natur_balise    = document.getElementById(champ).tagName;
    var selectBalise    = document.getElementById(champ);

    if (natur_balise == "INPUT" || natur_balise == "TEXTAREA") {

        selectBalise.disabled = true;
    }

    else if (natur_balise == "SELECT") {

        selectBalise.disabled = true;
    }

}


function activeThis(champ) {

    var natur_balise    = document.getElementById(champ).tagName;
    var selectBalise    = document.getElementById(champ);

    if (natur_balise == "INPUT" || natur_balise == "TEXTAREA") {

        selectBalise.disabled = false;
    }

    else if (natur_balise == "SELECT") {

        selectBalise.disabled = false;
    }

}

function enMajuscule(champ) {

    var natur_balise    = document.getElementById(champ).tagName;
    var selectBalise    = document.getElementById(champ);
    selectBalise.value.toUpperCase();

}

function enMinuscule(champ) {

    var natur_balise    = document.getElementById(champ).tagName;
    var selectBalise    = document.getElementById(champ);
    selectBalise.value.toLowerCase();

}


function checkedThis(champ, option) {

    var natur_balise    = document.getElementById(champ).tagName;
    var selectBalise    = document.getElementById(champ);

    if (option == ""  || option  == undefined) {

        if (selectBalise.checked == true || selectBalise.checked === true) {

            selectBalise.checked = false;
        }
        else {

            selectBalise.checked = true;
        }

    }
    else {
        
        selectBalise.checked = option;
    }

}


function checkedAll(parent) {
    var nodes = document.getElementById(parent).childNodes;
    for(var i = 0; i < nodes.length; i++) {

        if (nodes[i].nodeName.toLowerCase() == 'div') {
            nodes[i].style.background = '#f3f3f3';
        }
    }

    
}


function addClass(champ, laClass) {
    let natur_balise    = document.getElementById(champ).tagName;
    let selectBalise    = document.getElementById(champ);
    selectBalise.classList.add(laClass);
}


function deleteClass(champ, laClass) {
    let natur_balise    = document.getElementById(champ).tagName;
    let selectBalise    = document.getElementById(champ);
    selectBalise.classList.remove(laClass);
}


function shopass(champ, bton) {
    
    let     elSelect    = document.getElementById(champ);//Champ d'application de la fonction
    const   typa        = elSelect.getAttribute("type");//type du champ d'application
    let     ibtnpass    = document.getElementById(bton);//Bonton d'appel de la fonction
    
    ibtnpass.addEventListener("focus", () => {

    });
    
    alert("Le type de ce champ est : " + typa + " !");

    /* if (typa            == "password") {

        ibtnpass.classList.remove("fa-eye-slash");
        ibtnpass.classList.add("fa-eye");

        elSelect.setAttribute("type", "password");
        elSelect.focus();

    }

    else {

        ibtnpass.classList.remove("fa-eye");
        ibtnpass.classList.add("fa-eye-slash");
        elSelect.setAttribute("type", "text");
        elSelect.focus();
        
        // selInput.addEventListener("blur", () => {
        //     selInput.setAttribute("type", "password");
        //     gestpass.classList.remove("cibling");
        //     ibtnpass.classList.remove("fa-eye-slash");
        //     ibtnpass.classList.add("fa-eye");
        // });
        
    } */

}

function verif_mySessions(user) {

    const varLoad   = document.querySelector(".overlays");
    if (!regexmail.test(user)) {
        varLoad.classList.remove("d-none");
        setTimeout(() => {
            redirige("connexion.php");
        }, 2000);
    }

    else {

        setTimeout(() => {
            varLoad.classList.add("d-none");
        }, 2000);
    }
        

    return false;

} // FONCTION DE VERIFICATION DE SESSION ACTIVE 



/* function deconnecte_me(user) {

    id_user             = document.getElementById(user).value;
    $.ajax({

        URL             : "deconnexion.php",
        type            : "POST",
        data            : "deconnex-manuel=" + id_user,

        success         : (statut) => {
            
            if (statut  == "deconnecter") {
                
            } else {
                
            }
        },

        error           : (statut) => {

        }

    });

    return false;

} // FONCTION DE DECONNEXION */
