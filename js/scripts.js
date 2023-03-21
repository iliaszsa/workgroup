(function() {

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


    /**
        * Une fonction facile d'écouteurs d'événements
    */
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



    /**
     * Mobile nav dropdowns activate
     */
    on('click', '.navbar .dropdown > a', function(e) {
        if (select('#navbar').classList.contains('navbar-mobile')) {
          e.preventDefault()
          this.nextElementSibling.classList.toggle('dropdown-active')
        }
    }, true);











    /**
     * Changement de position des icons dans un input
     */
    on('focus', '.nonFocus.pl-35', function(e) {
        if (select('.nonFocus').classList.contains('pl-35')) {
          e.preventDefault();
          this.classList.remove('pl-35');
          this.classList.add("fw-bolder");
        }
    }, true);

    on('blur', '.nonFocus.pl-35', function(e) {
        e.preventDefault();
        this.classList.add('pl-35');
        this.classList.remove("fw-bolder");
    }, true);
    





    // ARRET DE CHARGEMENT DE LA PAGE
    setTimeout(() => {
      select(".overlays").classList.add("d-none");
    }, 3000);

    
})();

