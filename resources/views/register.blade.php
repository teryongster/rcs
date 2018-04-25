@extends('template')
@section('content')
<header class="masthead text-center text-white d-flex smallmast">
	<div class="container my-auto">
		<div class="row">
			<div class="col-lg-10 mx-auto">
				<h1 class="text-uppercase">
				<strong>Register Your Restaurant</strong>
				</h1>
			</div>
		</div>
	</div>
</header>
<div class="container padding50">
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			@include('errors.validation_errors')
			<form action="/register" method="post">
				@csrf
				<div class="form-group">
					<label for="username">Username:</label>
					<input type="text" name="username" class="form-control" id="username">
				</div>
				<div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" name="email" class="form-control" id="email">
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" name="password" class="form-control" id="pwd">
				</div>
				<div class="form-group">
					<label for="pwd2">Retype Password:</label>
					<input type="password" name="password_confirmation" class="form-control" id="pwd2">
				</div>
				<hr>
				<div class="form-group">
					<label for="name">Restaurant Name:</label>
					<input type="text" name="name" class="form-control" id="name">
				</div>
				<div class="form-group">
					<label for="image">Image:</label>
					<input type="file" name="image" class="form-control" id="image">
				</div>
				<div class="form-group">
					<label for="category">Category:</label>
					<select name="category" id="category" class="form-control">
						<option value="">Fastfood Chain</option>
						<option value="">Eatery</option>
						<option value="">Restaurant</option>
					</select>
				</div>
				<div class="form-group">
					<label for="address">Complete Address:</label>
					<input type="text" name="address" class="form-control" id="address">
				</div>
				<div class="form-group">
					<label for="longitude">Location (Longitude):</label>
					<input type="text" name="longitude" class="form-control" id="longitude">
				</div>
				<div class="form-group">
					<label for="latitude">Location (Latitude):</label>
					<input type="text" name="latitude" class="form-control" id="latitude">
				</div>
				<div class="form-group">
					<label for="description">Brief Description:</label>
					<textarea name="description" id="description" class="form-control" rows="6" style="resize: none;"></textarea>
				</div>
				<button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 5px;">Submit</button>
			</form>
		</div>
		<div class="col-lg-2"></div>
	</div>
</div>
@stop