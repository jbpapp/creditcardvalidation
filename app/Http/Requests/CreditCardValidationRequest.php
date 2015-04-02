<?php namespace CreditCardValidator\Http\Requests;

use CreditCardValidator\Http\Requests\Request;

class CreditCardValidationRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'card_number' => ['required', 'regex:/([4-6]{1}\d{3})([\-]?)\d{4}\2\d{4}\2\d{4}/']
		];
	}

}
