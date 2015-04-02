@extends('layouts.default')

@section('content')
	<div class="col-sm-12 col-md-4 col-md-offset-4">
		<h1>Credit Card Validation</h1>

		<form action="{{ url('/') }}" method="post" id="credit-card-validator">
			<div class="form-group">
				<label for="card-number" class="sr-only control-label">Card number</label>
				<input type="text" id="card-number" name="card_number" value="{{ old('card_number') }}" class="form-control" placeholder="Enter your credit card">
				{{ $errors->first('card_number', '<p class="help-block validation-error">:message</p>') }}
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">
					Validate
				</button>
			</div>
		</form>
	</div>
@stop