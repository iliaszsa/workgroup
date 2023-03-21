// Construction d'une table des stocks
const   table_stocks              = [];//Table des stocks vide

const   formulaire              = document.querySelector(".formStockes");
const   btnCreater              = document.querySelector(".create-article");//Bouton de création des formulaire

if (!btnCreater)                {//Si le bouton n'existe pas dans le formulaire, créer le
    CreateBouton("formSaisie", "create-article", "Ajouter un article");
}

// Création d'une plage d'affichage du stock de la table, dès qu'un article a été ajouté
const   btnAddARtcl             = document.querySelector(".create-article");//Bouton de création des formulaire
const   plageStock              = document.createElement("div");
        plageStock.className    = "form-row bg-info pt-none mb-20";
const   titrePlage              = document.createElement("h2");//Titre de la plage des stocks
        titrePlage.className    = "style-hx";
        titrePlage.innerText    = "Table des stocks";

const   tableRespons            = document.createElement("div");//Création d'une class responsive de la table
        tableRespons.className  = "table-responsive carnetstocks";

const   table                   = document.createElement("table");
        table.className         = "table table-striped custom-table pb-20 bx-shodow-black floraforms";
const   thead                   = document.createElement("thead");
        thead.className         = "bx-shodow-black";
const   trHead                  = document.createElement("tr");//Ligne des entetes
    
const   tbody                   = document.createElement("tbody");
// const   trBody                  = document.createElement("tr");//Ligne des données saisie
//         trBody.scope            = "row";
//         trBody.className        = "bg-white";
const   tfoot                   = document.createElement("tfoot");
const   trFoot                  = document.createElement("tr");//Ligne des totaux
        trFoot.scope            = "row";



// Déclaration de création du formulaire de saisie et la table des stocks
btnAddARtcl.addEventListener("click", () => {

    
    const   formsMasque         = document.querySelector(".masqueForms");
            formsMasque.classList.remove("d-none");
    // ------------------------------------------------------------------
    const   newType             = document.querySelector("#typeDesign");//Récupère le type de produit
    newType.selectedIndex       = 0;
    const   newDesign           = document.querySelector("#designation");//Récupère la valeur(désignation) du produit
    const   newQlte             = document.querySelector("#designQlte");//Récupère la qualité du produit
            newQlte.selectedIndex= 1;
    const   newQte              = document.querySelector("#quantite");//Récupère la quatité
    const   newPxUnit           = document.querySelector("#prixUnit");//Récupère le prix Unitaire d'achat
    const   newPxVent           = document.querySelector("#prixVente");//Récupère le prix de Vente    
    newDesign.focus();
    

    CreateBouton("formSaisie", "RegArticle", "Enregistrer");//Insertion du bouton Enregistrer
    const   btnReg              = document.querySelector(".RegArticle");
    btnAddARtcl.classList.add("d-none");//A supprimer lors du click du bouton enregistrer

    // Création de la table des stocks sélon les entêtes désignées dans le tableau (elements.js/) table-entete_table
    // A) => Création de la plage da la table des stocks, la table, tbody et tfoot
    formulaire.appendChild(plageStock);//Création d'une div dans le formulaire
    plageStock.appendChild(titrePlage);//Création d'un élement h2
    plageStock.appendChild(tableRespons);//Création d'un div responsive de la table
    tableRespons.appendChild(table);//Table des stocks
    table.appendChild(thead);//Création de l'entête de la table sans contenu
    thead.appendChild(trHead);//Création de la ligne d'entête
    // Insertion des titre dans la ligne des entêtes
    for (let tet = 0; tet < entete_table.length; tet++) {
        const element           = entete_table[tet];

        const   th              = document.createElement("th");//Création de cellule head (th)
                th.scope        = "col";
                th.innerText    = element;
        trHead.appendChild(th);//Insertion de l'entête dans la table        
    }
    
    table.appendChild(tbody);//Création d'un élement tbody dans la table
    // const   balzSmall           = document.createElement("small");
    //         balzSmall.className = "d-block";    
    // const   balzA               = document.createElement("a");
    //         balzA.className     = "text-bold-700";




    // Création et insertion des 3 lignes vides dans la table
    for (let trV = 0; trV <= 3; trV++) {
        const   trBody          = document.createElement("tr");//Ligne vides dans la table
        trBody.id               = "limitr" + trV;
        trBody.scope            = "row";
        trBody.className        = "bg-white text-white";
        tbody.appendChild(trBody);

        for (let tdV = 0; tdV < entete_table.length; tdV++) {
            const valueElm      = entete_table[tdV];
            const   tdVide      = document.createElement("td");
                    tdVide.id   = "labelTotal_" + tdV;
                    tdVide.className="tdVide";
                    tdVide.innerText="";

                if (trV         == 3) {
                    tdVide.classList.remove="tdVide";
                    tdVide.classList.add("text-center");
                    tdVide.style.hover  = "color: black";
                    tdVide.innerText="...";
                }


            trBody.appendChild(tdVide);            
            
        }
        
    }
    
    
    table.appendChild(tfoot);//Création d'un élement tfoot dans la table
    tfoot.appendChild(trFoot);//Création de la ligne des totaux
    // Insertion des cellules dans la ligne des totaux, au nombre exacte des entêntes
    for (let foot = 0; foot < entete_table.length; foot++) {
        const element           = entete_table[foot];

        const   td              = document.createElement("td");//Création de cellule head (td)
                td.id           = "total_" + foot;
                td.innerText    = "...";
        trFoot.appendChild(td);//Insertion de l'entête dans la table        
    }





    // Contrôle et enregistrement de la saisie du formulaire
    btnReg.addEventListener("click", () => {

        const   valType         = newType.options[newType.selectedIndex].value;
        const   valDesign       = newDesign.value;
        const   lgDesign        = valDesign.length;
        const   valQlte         = newQlte.options[newQlte.selectedIndex].value;
        const   valQte          = newQte.value;
        const   valPxAchat      = newPxUnit.value;
        const   valPxVente      = newPxVent.value;

        if (valType             == "typeNulle") {
            laBelNotif(newType, "error", "Erreur de sélection de type de produit !");
        }
        else if (valDesign      == "" || lgDesign < 3) {
            laBelNotif(newDesign, "error", "Erreur de saisie, veuillez indiquer la désignation du produit (3 caractères minimum) !");            
        }
        else if (valQlte      == "QualiteNulle") {
            laBelNotif(newQlte, "error", "Erreur, veuillez indiquer une qualité du produit !");            
        }
        else if (valQte      == "" || valQte < 1) {
            laBelNotif(newQlte, "error", "Erreur, veuillez indiquer une quantité du produit !");            
        }
        else if (valPxAchat      == "" || valPxAchat < 1) {
            laBelNotif(newQlte, "error", "Erreur, veuillez indiquer le prix d'achat du produit !");            
        }
        else if (valPxVente      == "" || valPxVente < 1) {
            laBelNotif(newQlte, "error", "Erreur, veuillez indiquer le prix de vente du produit !");            
        }

        else {

            const   prixAchat       = parseFloat(valQte*valPxAchat);
            const   prixVente       = parseFloat(valQte*valPxVente);
            
            const   newMrg          = parseFloat(prixVente - prixAchat);
            const   newTTC          = parseFloat(prixAchat + newMrg);
            const   valStatut       = "EN STOCK";

            const thisProduit       = {

                proDesign           : valDesign,
                proQte              : valQte,
                proPxA              : valPxAchat,
                proPxV              : valPxVente,
                proMrg              : prixAchat,
                proTTC              : newTTC,
                proDAte             : ValDate,
                proStatut           : valStatut
                
            }
            
            for (let stk = 0; stk < stocks_produits.length; stk++) {
                const thiStk        = stocks_produits[stk];
                
                    divTbody.appendChild(divTRow);
    
                //Création d'un élément span pour les N° d'ordre
                const numOrd        = stk + 1;
                    spanOrdre.innerText     = numOrd;
                    divTRow.appendChild(spanOrdre);
    
                Object.keys(thiStk).forEach(key => {
    
                    const values        = thiStk[key];
    
                    let divTData        = document.createElement("div");
                    divTData.className  = "div-like-td wid-15";
                    divTData.innerHTML  = values;
                    
                    if (key             === "proDesign") {
                        divTData.className  = "div-like-td wid-22";
                    }
    
                    divTRow.appendChild(divTData);
                    //console.log(key, values);   
    
                });
    
            }

        }


    });
    


});//Création d'un formulaire de saisie d'article
