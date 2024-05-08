(function($) {
    $(document).ready(function() {
        $('.menu-icon').click(function() {
            $('.header-mwnu').addClass('show');
        });

        $('.close-icon').click(function() {
            $('.header-mwnu').removeClass('show');
        });

        $('.testimonial-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 5000,
            nextArrow: '<button class="slick-next slick-arrow"><i class="fas fa-chevron-right"></i></button>',
            prevArrow: '<button class="slick-prev slick-arrow"><i class="fas fa-chevron-left"></i></button>',
        });

        $('li.has-childern').click(function() {
            $(this).children('ul').slideToggle();
        });

        $(".drop-head").click(function() {
            $(this).siblings().slideToggle();
            $(this).toggleClass('acitve');
        });

        $('.search-toggle').click(function() {
            $('.header-search').addClass('show');
        });

        $('.close-search').click(function() {
            $('.header-search').removeClass('show');
        });

        if ($(window).width() < 991) {
            $('.fltr-are').hide();
            $('.filter-btn').click(function() {
                //   e.stopPropagation();
                $(this).text(function(i, text) {
                    return text.trim('') === "Filter" ? "Hide" : "Filter";
                });

                $(this).toggleClass('active');
                $('.fltr-are').slideToggle(500);
            });
        }

        // $(window).scroll(function() {
        //     var scroll = $(window).scrollTop();
        //     var bannerHeight = $('.banner-sec').height();
        //     if (scroll >= (bannerHeight - 150)) {
        //         $("header").addClass("darkHeader");
        //     } else {
        //         $("header").removeClass("darkHeader");
        //     }
        // }); //missing );
    })
})(jQuery132);
