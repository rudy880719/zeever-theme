(function ($, Backdrop) {
  /*global jQuery:false */
  /*global Backdrop:false */
  "use strict";
  /**
   * Add functionality to open/close menu mobile.
   */
  Backdrop.behaviors.zeever_mobile_menu = {
    attach: function (context, settings) {
      var $context = $(context);

      $(".quarter").click(function () {
        if ($context.find('.navbar-collapse--show').length) {
          $('.navbar-collapse').removeClass('navbar-collapse--show colapse-show');
          $('.toggle-nav').removeClass('toggle-nav--active');
        } else {
          $('.navbar-collapse').addClass('navbar-collapse--show colapse--show');
          $('.toggle-nav').addClass('toggle-nav--active');
        }
      });
    }
  };

  /**
   * Add functionality make iivblock image clickable.
   */
  Backdrop.behaviors.zeever_image_clickable = {
    attach: function (context, settings) {
      var $context = $(context);
      if ($context.find('.block-iivblock').length) {
        if ($context.find('.block-iivblock .iivblock-body a ').length) {
          var href = $('.block-iivblock .iivblock-body a:first ').attr('href');
          if ($context.find('.block-iivblock .iivblock-image img ').length) {
            $('.block-iivblock .iivblock-image img').css("cursor", "pointer");
            $('.block-iivblock .iivblock-image').on('click', "img", function () {
                window.location.href = href;
              }
            );
          }
        }
      }
    }
  };

})(jQuery, Backdrop);
