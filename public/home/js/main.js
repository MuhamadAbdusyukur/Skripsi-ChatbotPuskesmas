(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').addClass('shadow-sm').css('top', '0px');
        } else {
            $('.sticky-top').removeClass('shadow-sm').css('top', '-100px');
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Date and time picker
    $('.date').datetimepicker({
        format: 'L'
    });
    $('.time').datetimepicker({
        format: 'LT'
    });


    // Header carousel
// Header carousel
$(".header-carousel").owlCarousel({
    autoplay: true,
    autoplayTimeout: 3000,    // Tetap 5 detik, bisa disesuaikan
    smartSpeed: 1000,         // <-- PENTING: Kecepatan transisi slide (1 detik)
    autoplayHoverPause: true,
    items: 1,
    loop: true,               // Pastikan ini TRUE
    dots: true,
    nav : true,
    navText: ["", ""], // Baris ini akan menyembunyikan teks bawaan

    

    // Hapus animateOut dan animateIn jika Anda mengalami stuttering/lompatan.
    // Owl Carousel biasanya akan menggunakan transisi default-nya
    // yang lebih mulus untuk looping.
    // Jika Anda tetap ingin animasi kustom, coba 'fadeOut' dan 'fadeIn' saja
    // tanpa 'Left' atau 'Right' untuk permulaan.
    // animateOut: 'fadeOut', // Coba komen ini dulu
    // animateIn: 'fadeIn'    // Coba komen ini dulu
});


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: false,
        smartSpeed: 1000,
        center: true,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            }
        }
    });

    
})(jQuery);

