<script type="text/javascript" src="<?= base_url(); ?>/web_tril/temp_tril/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>/web_tril/temp_tril/js/bootstrap.min.js"></script>
<script>
    function myFunction(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        imgText.innerHTML = imgs.alt;
        expandImg.parentElement.style.display = "block";
    }
</script>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("bmySlides");
        var dots = document.getElementsByClassName("bdemo");
        var captionText = document.getElementById("bcaption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" bactive", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>
<script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/vendor/jquery-1.12.0.min.js"></script>
<script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/jquery.meanmenu.js"></script>
<script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/jquery.magnific-popup.js"></script>
<script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/ajax-mail.js"></script>
<script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/jquery.mb.YTPlayer.js"></script>
<script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/jquery.nicescroll.min.js"></script>
<script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/plugins.js"></script>
<script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/main.js"></script>
<script type="text/javascript">
    (function($) {
        "use strict";
        $.scrollUp({
            scrollText: '<i class="fa fa-angle-up"></i>',
            easingType: 'linear',
            scrollSpeed: 900,
            animation: 'fade'
        });
    })(jQuery);
</script>
<script type="text/javascript" src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/jquery.min.js"></script>
<script type=" text/javascript" src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/owl.carousel.js"></script>
<script src="<?= base_url(); ?>/web_tril/dash/plugins/datatable/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true
        });
    })
    $(document).ready(function() {
        $('#example').DataTable();
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });
        table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>

<script type="text/javascript">
    function openNav() {
        document.getElementById("MobileSlideMenu").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("MobileSlideMenu").style.width = "0";
    }
    (function($) {
        $(window).on("load", function() {

            var content = $("#content"),
                autoScrollTimer = 8000,
                autoScrollTimerAdjust, autoScroll;

            content.mCustomScrollbar({
                scrollButtons: {
                    enable: true
                },
                callbacks: {
                    whileScrolling: function() {
                        autoScrollTimerAdjust = autoScrollTimer * this.mcs.topPct / 100;
                    },
                    onScroll: function() {
                        if ($(this).data("mCS").trigger === "internal") {
                            AutoScrollOff();
                        }
                    }
                }
            });
        });
    })(jQuery);
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() > 100) {
                $('#tombolScrollTop').fadeIn();
            } else {
                $('#tombolScrollTop').fadeOut();
            }
        });
    });

    function scrolltotop() {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    }
</script>
<script type="text/javascript">
    function open_show() {
        document.getElementById("my_show").style.display = "block";
        document.getElementById("close").style.display = "none";
    }

    function close_show() {
        document.getElementById("my_show").style.display = "none";
        document.getElementById("close").style.display = "block";
    }
</script>