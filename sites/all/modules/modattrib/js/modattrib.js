(function($) {
  $(document).ready(function() {
    var success = function() {
      $('#modattrib-form').ajaxForm({
        target: '#form',
        success: success
      });
    };
    $('#modattrib-link').click(function(event) {
      $.get(Drupal.settings.basePath + 'callback', function(data) {
        $('#form').html(data);
        Drupal.attachBehaviors('#modattrib-form');
        success();
      });
      event.preventDefault();
    });
  });
})(jQuery);