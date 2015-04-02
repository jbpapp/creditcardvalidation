<?php

if ( ! function_exists('determineCardType'))
{
	function determineCardType($card_number)
	{
		$card_type = 'credit';

		if (preg_match('/4[0-9]{3}([\-]?)\d{4}\1\d{4}\1\d{4}/', $card_number))
			$card_type = 'visa';
		elseif (preg_match('/5[1-5]{1}[0-9]{2}([\-]?)\d{4}\1\d{4}\1\d{4}/', $card_number))
			$card_type = 'mastercard';
		elseif (preg_match('/(5[0678]\d\d|6304|6390|67\d\d)([\-]?)\d{4}\2\d{4}\2\d{4}/', $card_number))
			$card_type = 'maestro';

		return $card_type;		
	}
}