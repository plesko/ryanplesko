(function ($) {$.fn.vAlign = function() {return this.each(function(i){var ah = $(this).height();var ph = $(window).height();var mh = Math.ceil((ph-ah) / 2);$(this).css('margin-top', mh);});};})(jQuery);