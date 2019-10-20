@extends('layout')
@section('content')
<h2 class="info-wrapper">New customer form</h2>
<form class="new-customer-form" method="post" action="/customers">
	@csrf
	<div class="row">
		<div class="col-md-2">
			Name:
		</div>
		<div class="col-md-4">
			<input class="customer_name" type="text" name="customer_name">
		</div>
		<div class="col-md-6">
			<div class="name_validation"></div>
		</div>
	</div>
	<div class="top-gap row">
		<div class="col-md-2">
			Country:
		</div>
		<div class="col-md-4">
			<input class="customer_country" type="text" name="customer_country">
		</div>
		<div class="col-md-6">
			<div class="country_validation"></div>
		</div>
	</div>
	<div class="top-gap row">
		<div class="col-md-2">
			Email:
		</div>
		<div class="col-md-4">
			<input class="customer_email" type="email" name="customer_email">
		</div>
		<div class="col-md-6">
			<div class="email_validation"></div>
		</div>
	</div>
	<div class="top-gap row">
		<div class="col-md-2">
			Number:
		</div>
		<div class="col-md-4">
			<input class="customer_number" type="text" name="customer_number">
		</div>
		<div class="col-md-6">
			<div class="number_validation"></div>
		</div>
	</div>
	<div class="top-gap row">
		<div class="col-md-2">
			Birthday:
		</div>
		<div class="col-md-4">
			<input class="customer_birthday" type="date" name="customer_birthday">
		</div>
		<div class="col-md-6">
			<div class="birthday_validation"></div>
		</div>
	</div>
	<div class="top-gap row">
		<div class="col-md-12">
			<a class="customer-button delete right-gap" href="/">Back</a><button class="top-gap customer-button update" type="submit">Add new customer</button>
		</div>
	</div>
</form>
@endsection