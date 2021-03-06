@extends('template')
@section('content')
<header class="masthead text-center text-white d-flex smallmast">
	<div class="container my-auto">
		<div class="row">
			<div class="col-lg-10 mx-auto">
				<h1 class="text-uppercase">
				<strong>My Restaurant/Account</strong>
				</h1>
			</div>
		</div>
	</div>
</header>
<div class="container padding50">
	@if(session()->has('success-message'))
	<div class="alert alert-success">
		<strong>Success!</strong> {{ session('success-message') }}
	</div>
	@endif
	<div class="row">
		<div class="col-lg-7">
			@include('errors.validation_errors')
			<form action="/my-restaurant" method="post" enctype="multipart/form-data">
				<h2>Restaurant/Account Info</h2><br>
				@csrf
				{{ method_field('patch') }}
				<div class="form-group">
					<label for="username">Username:</label>
					<input type="text" disabled class="form-control" id="username" value="{{ $user->username }}">
				</div>
				<div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
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
					<input type="text" name="name" class="form-control" id="name" value="{{ $user->restaurant->name }}">
				</div>
				<div class="form-group">
					<label for="image">Image:</label>
					<input type="file" name="image" class="form-control" id="image">
				</div>
				<div class="form-group">
					<img class="res-image-view" src="/{{ $user->restaurant->image }}">
				</div>
				<div class="form-group">
					<label for="category">Category:</label>
					<select name="category" id="category" class="form-control">
						<option {{ ($user->restaurant->category == 'Fastfood Chain') ? 'selected' : ''}}>Fastfood Chain</option>
						<option {{ ($user->restaurant->category == 'Eatery') ? 'selected' : ''}}>Eatery</option>
						<option {{ ($user->restaurant->category == 'Restaurant') ? 'selected' : ''}}>Restaurant</option>
					</select>
				</div>
				<div class="form-group">
					<label for="address">Complete Address:</label>
					<input type="text" name="address" class="form-control" id="address" value="{{ $user->restaurant->address }}">
				</div>
				<div class="form-group">
					<label for="longitude">Location (Longitude):</label>
					<input type="text" name="longitude" class="form-control" id="longitude" value="{{ $user->restaurant->long }}">
				</div>
				<div class="form-group">
					<label for="latitude">Location (Latitude):</label>
					<input type="text" name="latitude" class="form-control" id="latitude" value="{{ $user->restaurant->lat }}">
				</div>
				<div class="form-group">
					<label for="description">Brief Description:</label>
					<textarea name="description" id="description" class="form-control" rows="6" style="resize: none;">{{ $user->restaurant->description }}</textarea>
				</div>
				<button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 5px;">Save Changes</button>
			</form>
		</div>
		<div class="col-lg-5">
			<h2>Dishes</h2>
			<br>
			@if(session('approved') == 1)
			<a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#addDish">Add Dish</a>
			<br><br>
			<div class="row myrestaurant-dishes">
				@if($user->restaurant->products->count() > 0)
				@foreach($user->restaurant->products as $product)
				<a href="javascript:void(0);" class="col-lg-4 myrestaurant-dishes-box" data-toggle="modal" data-target="#dishView" style="background-image: url('/{{ $product->image }}');" data-name="{{ $product->name }}" data-description="{{ $product->description }}" data-image="/{{ $product->image }}" data-deleteurl="/delete-dish/{{ $product->id }}" data-price="{{ $product->price }}">
				</a>
				@endforeach
				@endif
			</div>
			@else
				<h5>You cannot use this feature because your account has not been approved by the admin yet.</h5>
			@endif
		</div>
	</div>
</div>
<!-- Dish Modal -->
<div id="dishView" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title dish-name">Add Dish</h4>
				<button class="btn btn-danger delete-dish">Delete</button>
			</div>
			<div class="modal-body">
				<form action="">
					@csrf
					<div class="form-group">
						<label for="dish-name">Dish Name:</label>
						<input type="text" class="form-control" id="dish-name" name="name" disabled>
					</div>
					<div class="form-group">
						<label for="dish-price">Price:</label>
						<input type="text" class="form-control" id="dish-price" name="price" disabled>
					</div>
					<div class="form-group">
						<label for="dish-description">Description:</label>
						<textarea disabled class="form-control" id="dish-description" rows="4" style="resize: none;" name="description"></textarea>
					</div>
					<div class="form-group">
						<img src="" class="res-image-view dish-image-view">
					</div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<!-- Add Dish Modal -->
<div id="addDish" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title dish-name">Add Dish</h4>
			</div>
			<div class="modal-body">
				<form action="/restaurant/{{ $user->restaurant->id }}/add-dish/" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="dish-name">Dish Name:</label>
						<input type="text" class="form-control" id="dish-name" name="name">
					</div>
					<div class="form-group">
						<label for="dish-price">Price:</label>
						<input type="text" class="form-control" id="dish-price" name="price">
					</div>
					<div class="form-group">
						<label for="dish-description">Description:</label>
						<textarea class="form-control" id="dish-description" rows="4" style="resize: none;" name="description"></textarea>
					</div>
					<div class="form-group">
						<label for="dish-image">Photo:</label>
						<input type="file" class="form-control dish-image" name="image">
					</div>
					<div class="form-group">
						<img src="" class="res-image-view dish-image-view">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<form id="delete-form" method="post" action="">
	@csrf
	{{ method_field('delete') }}
</form>
@stop