$('input[name=card_number]').mask '9999-9999-9999-9999'

$('form'). submit (e) ->
	e.preventDefault();
	form = $(this)
	data = form.serialize()
	url = form.attr 'action'

	form.find('.form-group').removeClass 'has-error'
	form.find('.credit-card').removeClass 'selected'
	form.find('.validation-error').remove()

	$.post url, data, (response) ->
		cardType = response.card_type
		if cardType != 'invalid'
			$('.'+cardType).addClass 'selected'
		else
			$('.card-number-input').addClass('has-error').append '<p class="help-block validation-error">Invalid card number.</div>'
	.fail (response) ->
		errors = response.responseJSON.card_number

		$('.card-number-input').addClass('has-error').append '<p class="help-block validation-error">'+errors[0]+'</div>'
	return