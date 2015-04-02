<?php namespace CreditCardValidator\Http\Controllers;

use CreditCardValidator\Http\Requests;
use CreditCardValidator\Http\Controllers\Controller;

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
	public function validateCard()
	{
		
	}

}
