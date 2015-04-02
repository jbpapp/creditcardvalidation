@extends('layouts.default')

@section('content')
	<div class="col-sm-12 col-md-4 col-md-offset-4">
		<h1>Credit Card Validation</h1>

		<form action="{{ url('/') }}" method="post" id="credit-card-validator">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<div class="form-group card-number-input {{ (($errors->has('card_number') or Session::get('card_type') == 'invalid') ? 'has-error' : '') }}">
				<label for="card-number" class="sr-only control-label">Card number</label>
				<input type="text" id="card-number" name="card_number" value="{{ old('card_number') }}" class="form-control" placeholder="Enter your credit card">
				{{ $errors->first('card_number', '<p class="help-block validation-error">:message</p>') }}
			</div>
			<div class="form-row credit-cards">
				<div class="credit-card visa {{ (Session::get('card_type') == 'visa' ? 'selected' : '') }}">
					<img src="images/visa.png" alt="Visa">
				</div>
				<div class="credit-card mastercard {{ (Session::get('card_type') == 'mastercard' ? 'selected' : '') }}">
					<img src="images/mastercard.png" alt="Mastercard">
				</div>
				<div class="credit-card maestro {{ (Session::get('card_type') == 'maestro' ? 'selected' : '') }}">
					<img src="images/maestro.png" alt="Maestro">
				</div>								
				<div class="credit-card credit {{ (Session::get('card_type') == 'credit' ? 'selected' : '') }}">
					<img src="images/credit.png" alt="Credit">
				</div>				
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">
					Validate
				</button>
			</div>
		</form>
	</div>
@stop