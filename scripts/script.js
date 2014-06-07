// Inicjalizacja plugina fullPage

$(document).ready(function() {
    $('#fullpage').fullpage({
        slidesColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', '#333', '#ccddff'],
        css3: true,
        navigation: true,
        navigationTooltips: ['pierwszy', 'drugi', 'trzeci', 'czwarty'],
        slidesNavigation: true,
    

        
        onLeave: function(index, nextIndex, direction){ // callback wywolywany zawsze gdy opuszczana jest sekcja fullPage'a

            // chowanie navigacji pionowej w sekcjach ktore posiadają slajd
            
            if( $('.section').eq(nextIndex-1).children().eq(0).attr('class') == "slides" ){ //  .slides -> generowany przez plugin
                // DOKOŃCZYĆ
                
                
                //alert('x');
            }
        }
    });
                           
});


