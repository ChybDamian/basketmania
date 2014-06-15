// Inicjalizacja plugina fullPage

$(document).ready(function() {
    $('#fullpage').fullpage({
        slidesColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', '#333', '#ccddff'],
        css3: true,
        navigation: true,
        navigationTooltips: ['pierwszy', 'drugi', 'trzeci', 'czwarty'],
        slidesNavigation: true,
    

        
        onLeave: function(index, nextIndex, direction){ // callback wywolywany zawsze gdy opuszczana jest sekcja fullPage'a

            //wyswietlanie navigacji tylko w sekcjach strony innych niż pierwsza
            if( index == 1 ){                                  
                $('#fullPage-nav').animate({"right": "20px"});
                $("#navTop").animate({"margin-top": "0px"});

            }            
            
            if( nextIndex == 1 ){
                $('#fullPage-nav').animate({"right": "-50px"});
                $("#navTop").animate({"margin-top": "-100px"});               
            }
            
            if( nextIndex == 2 ){
                 $('#player').animate({'left': "700px"},
                    function(){              
                        var list = $('.boxContainer ul').children();
                        
                        list.eq(0).animate({
                            "opacity": 1,
                            "margin-left": 0
                        },function(){
                            list.eq(1).animate({
                                "opacity": 1,
                                "margin-left": 0                                    
                            },function(){
                                list.eq(2).animate({
                                    "opacity": 1,
                                    "margin-left": 0                                    
                                });
                            });
                        });          
                    }
                 );   
            }
        }

    });
    
   $('#fullPage-nav').css("right","-50px");
    
    
    
   //plax plugin
    
    
    $('#plax-sphere-1').plaxify({"xRange":60,"yRange":60})
    $('#plax-logo').plaxify({"xRange":30,"yRange":30})
    $('#plax-sphere-2').plaxify({"xRange":15,"yRange":15})
    $('#plax-sphere-3').plaxify({"xRange":60,"yRange":60,"invert":true})
    $.plax.enable();
});


