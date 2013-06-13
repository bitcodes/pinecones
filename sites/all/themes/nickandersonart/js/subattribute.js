(function($, Drupal, window, document, undefined) {
    $(document).ready(function() {
        $(".add-to-cart").find(".attribute").next(".attribute").addClass("subattribute"); // add class to subattributes
        $(".subattribute").css("display', 'none"); //hide subattribute div

        $('html, body').each(function() {

            var item = $('.attribute-1').find('.form-item');
           // $("<span/>").html("").appendTo(item);
            $('.attribute-1').find('input').each(function() {
                var value = $(this).val();

                switch (value) {
                    case value:
                        $(this).addClass('value' + value);
                }
                $(this).next('label').next('span').addClass('spans' + value);

            });

        });


    });
  })(jQuery, Drupal, this, this.document);

