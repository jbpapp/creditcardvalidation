<?php

if ( ! function_exists('determineCardType'))
{
	/**
	 * This function determines the card type based on the card number.
	 * We validate the Luhn number first, if the card number passes
	 * this validation, we determine the type with some simple regex.
	 * 
	 * @param  string $card_number
	 * @return string
	 */
	function determineCardType($card_number)
	{
		if ( ! validLuhn($card_number)) return 'invalid';

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

if ( ! function_exists('validLuhn'))
{
	/**
	 * Validate the card number. If the number passes this validation, it only means that 
	 * it can be a valid credit card number, but doesn't mean that a card with this number exists.
	 * 
	 * @param  string $card_number
	 * @return bool
	 */
	function validLuhn($card_number)
	{
	    $card_number = str_replace('-', '', $card_number);
    
    	$length = strlen($card_number);
    
    	$card_check = $length % 2;
    
    	$sum = $i = 0;
    	foreach (str_split($card_number) as $digit)
    	{
        	if ($i % 2 == $card_check) 
        	{
            	$digit *= 2;
            	if ($digit > 9) $digit -= 9;
            }
    
        	$sum += $digit;
        	$i++;
        }

	    return ($sum % 10 == 0) ? true : false;
	}
}