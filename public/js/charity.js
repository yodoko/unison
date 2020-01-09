document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.carousel');

    var options = {
        duration: 140,
        padding: 40,
        shift: 100,
        indicators: true,
        numVisible: 3,
        onCycleTo: null
    };

    // a - Il faut 1 savoir le nom d une assoc choisis
    // b - Remplacer le titre avec le nouveau nom de l'association

    // c - Recuperer les descriptifs
    // d - Parcourir les descriptifs
    // e - Afficher ceux qui sont associer à active  
    // f - Cacher ceux qui ne le sont pas 

    // g - Changer le lien externes
    // h - Finir console log

    function updateCharityName(newTitle) { // b
        var title = document.querySelectorAll('.description-title')[0];
        title.innerText = newTitle;

        console.log('Changed the title');
    }

    function checkTextIdentity(currentActive) {
        var texts = document.querySelectorAll('#desc'); // c

        for (var i = 0; i < texts.length; i++) { // d

            var isHidden = hasClass(texts[i], 'hidden-text');
            var mustActivate = texts[i].getAttribute('data-target') === currentActive;

            if (isHidden && mustActivate) {
                removeClass(texts[i], 'hidden-text'); // e
            } else if (!isHidden) {
                addClass(texts[i], 'hidden-text'); // f
            }

        }

        console.log('Changed the displayed text');
    }

    function updateLink(newLink) {
        var anchor = document.querySelector('.visit'); // c
        anchor.href = newLink;
        console.log('Changed the external link');
    }


    function onCycleController(ele, dragged) {
        var charity_name = ele.getAttribute('charity-name'); // a
        var link = ele.getAttribute('ext-link'); // a

        console.log(charity_name);
        console.log(link);

        updateCharityName(charity_name);
        checkTextIdentity(charity_name);
        updateLink(link);

        console.log('Changed the parameters');
    }

    options.onCycleTo = onCycleController;

    var instances = M.Carousel.init(elems, options);
});
