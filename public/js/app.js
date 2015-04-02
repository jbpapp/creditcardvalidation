(function() {
  $('input[name=card_number]').mask('9999-9999-9999-9999');

  $('form').submit(function(e) {
    var data, form, url;
    e.preventDefault();
    form = $(this);
    data = form.serialize();
    url = form.attr('action');
    form.find('.form-group').removeClass('has-error');
    form.find('.credit-card').removeClass('selected');
    form.find('.validation-error').remove();
    $.post(url, data, function(response) {
      var cardType;
      cardType = response.card_type;
      if (cardType !== 'invalid') {
        return $('.' + cardType).addClass('selected');
      } else {
        return $('.card-number-input').addClass('has-error').append('<p class="help-block validation-error">Invalid card number.</div>');
      }
    }).fail(function(response) {
      var errors;
      errors = response.responseJSON.card_number;
      return $('.card-number-input').addClass('has-error').append('<p class="help-block validation-error">' + errors[0] + '</div>');
    });
  });

}).call(this);

//# sourceMappingURL=app.js.map