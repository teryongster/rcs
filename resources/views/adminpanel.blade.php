@extends('template')
@section('content')
<header class="masthead text-center text-white d-flex smallmast">
	<div class="container my-auto">
		<div class="row">
			<div class="col-lg-10 mx-auto">
				<h1 class="text-uppercase">
				<strong>Admin Panel</strong>
				</h1>
			</div>
		</div>
	</div>
</header>
<div class="container admin-panel padding50">
	<div class="row">
		<div class="col-lg-4">
			<div class="list-group">
				<a href="/admin-panel/registration-requests" class="list-group-item">Registration Requests</a>
				<a href="asdd" class="list-group-item">Second item</a>
				<a href="asdd" class="list-group-item">Third item</a>
			</div>
		</div>
		<div class="col-lg-8">
			Welcome to Admin Panel. Please select an action on the left navigation.
		</div>
	</div>
</div>
@stop