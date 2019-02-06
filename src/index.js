

$(document).ready(function(){
    
    console.log('ready')
    setTimeout(function(){
         
        if($(window).scrollTop() == 0) {
            $('body, html').animate({ scrollTop: $(window).height() }, 1400);
        }
    }, 4000);
    

    $('header svg').on('click', function(){
        $('body, html').stop().animate({ scrollTop: $(window).height() }, 1400);
    });

    $(window).on('scroll', clientScroll);
    $(window).on('scroll', watchClone);
    let $cloned = $('#Cloned'),
        $showcase = $('#Showcase');

    function clientScroll(){
        let st = $(window).scrollTop(),
            cl_st = st + $(window).height() * .85;
        $('#Clients svg text').each(function(){
            if(cl_st > $(this).position().top){
                $(this).addClass('animate-in');
                if($(this).hasClass('last')){
                    $(window).off('scroll', clientScroll);
                }
            }
        });

        
    }

    function watchClone(){
        let st = $(window).scrollTop();

        console.log('st: ' + st);
        console.log('$cloned.position().top: ' + $cloned.position().top)

        if(st > $cloned.position().top){
            $(window).scrollTop($showcase.position().top);
        }
    }

    $('.project-image').on('click', function(){
        let $this = $(this),
            index = $this.data('index'),
            $next_1 = $('.project-image').eq(index + 1),
            $next_2 = $('.project-image').eq(index + 2),
            $next_3 = $('.project-image').eq(index + 3)



            if($next_1.length > 0) {
                let t_top = Math.floor( $this.offset().top + $this.height() ),
                    n_1_top = Math.floor( $next_1.offset().top + $next_1.height() ),
                    n_2_top = $next_2.length > 0 ? Math.floor( $next_2.offset().top + $next_2.height() ) : 0,
                    n_3_top = $next_3.length > 0 ? Math.floor( $next_3.offset().top + $next_3.height() ) : 0;
                
                if(t_top != n_1_top){
                    let top = $next_1.offset().top;
                    $('body, html').stop().animate({ scrollTop: top }, 1400);
                    
                } else {
                    if(n_1_top != n_2_top) {
                        let top = $next_2.offset().top;
                        $('body, html').stop().animate({ scrollTop: top }, 1400);
                    } else if(n_2_top != n_3_top) {
                        let top = $next_3.offset().top;
                        $('body, html').stop().animate({ scrollTop: top }, 1400);
                    } else {
                        console.log('not found')
                    }
                }
            } else {
                //go to about
                $('body, html').stop().animate({ scrollTop: $('#About').offset().top }, 1400);
            }
    });
    
    
    $('.in-view').bind('inview', function(event, isInView) {
        if (isInView) {
            console.log('in view');
            $(this).addClass('animate-in');
          // element is now visible in the viewport
        } else {
          // element has gone out of viewport
        }
   
    });

    $('.to-top button').on('click', function(){
        $('body, html').animate({ scrollTop: 0 }, 10000);
    });

    clientScroll();
    
});