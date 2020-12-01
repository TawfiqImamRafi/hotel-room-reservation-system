(function ($) {
    "use-strict"

    jQuery(document).ready(function () {
        
        $(document).on('click', '.nav-bar', function() {
            $('.page-content-area').toggleClass('no-sidebar');
            $('.header-logo').toggleClass('no-header-logo');
        });
    });



}(jQuery));