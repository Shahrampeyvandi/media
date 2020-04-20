
$(document).ready(function() {
    var wind_ = $(window);
    wind_.on('load', function () {
        $('.page-loader').fadeOut(700, function () {});
    });
    if (wind_.width() >= 600) {
        $('.sidebar').css('margin-right', '0');
        $('.main').css('margin-right', '250px')
        $('.hamburger').hide();
        $('.close-sidebar').show();
    } else {
        $('.sidebar').css('margin-right', '-250px');
        $('.main').css('margin-right', '0px')
        $('.close-sidebar').hide();
        $('.hamburger').show();
    }
    $('.hamburger').click(function() {
        $('.sidebar').css('margin-right', '0');

        $('.main').css('margin-right', '250px')
        $(this).hide();
        $('.close-sidebar').show();
    });
    $('.close-sidebar').click(function() {
        $('.sidebar').css('margin-right', '-250px');

        $('.main').css('margin-right', '0px')
        $(this).hide();
        $('.hamburger').show();
    });

    $(".print_page").click(function() {
        var host = '<?php echo base_url();?>'

        var divContents = $(".print-content").html();
        var printWindow = window.open('', '', 'height=400,width=800');
        printWindow.document.write('<html><head>');
        printWindow.document.write('<title>پنل شبکه تبادل فناوری</title>  <link rel = "stylesheet" href ="../../../Panel/vendor/bootstrap/bootstrap.min.css" ><link rel="stylesheet" href="../../../Panel/vendor/bootstrap/RTL.css"><link rel="stylesheet" href="../../../Panel/vendor/bootstrap/bootstrap-select.css"><link rel="stylesheet" href="../../../Panel/vendor/FontAwesome/all.css"><link rel="stylesheet" href="{{route(" BaseUrl")}}/datepicker/bootstrap-datepicker.min.css"><link rel="stylesheet" href="../../../Panel/assets/css/style.css"></link>');
        printWindow.document.write('</head><body class="p-5">');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();

    });



});

$('body').scrollspy({ target: '.dotted-scrollspy' });
$('.navbar-collapse a').click(function() { $(".navbar-collapse ").collapse('hide'); });
$('.carousel.carousel-multi-item.v-2 .carousel-item').each(function() { var next = $(this).next(); if (!next.length) { next = $(this).siblings(':first'); }
    next.children(':first-child').clone().appendTo($(this)); for (var i = 0; i < 4; i++) { next = next.next(); if (!next.length) { next = $(this).siblings(':first'); }
        next.children(':first-child').clone().appendTo($(this)); } });


(function() {
    'use strict';

    window.addEventListener('load', function() {
        var massage = " ورودی ها را کامل کنید";
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    alert(massage);
                }
                form.classList.add('was-validated');

            }, false);
        });
    }, false);
})();
