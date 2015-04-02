<?php namespace CreditCardValidator\Http\Controllers;

use CreditCardValidator\Http\Controllers\Controller;
use CreditCardValidator\Http\Requests;
use CreditCardValidator\Http\Requests\CreditCardValidationRequest;
use Illuminate\Http\Request;

class FormController extends Controller {

	/**
	 * Show the form for the credit card validation.
	 *
	 * @return Response
	 */
	public function show()
	{
		return view('cards.form');
	}

	/**
	 * Validate the credit card and return the result.
	 *
	 * @return Response
	 */
	public function validateCard(CreditCardValidationRequest $request)
	{
		$card_type = determineCardType($request->get('card_number'));

		if ($request->ajax())
			return response()->json(compact('card_type'));
		else
			return redirect()->back()->withInput()->with('card_type', $card_type);
	}

}
