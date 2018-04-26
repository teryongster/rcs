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
		@include('includes.admin-side')
		<div class="col-lg-9">
			<h3>Registration Requests</h3>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Username</th>
						<th>Email</th>
						<th>Restaurant Name</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{ $user->username }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->restaurant->name }}</td>
						<td>
							<button class="userAction btn btn-success" data-url="/approve-user/{{ $user->id }}">Approve</button>
							<button class="userAction btn btn-danger" data-url="/decline-user/{{ $user->id }}">Decline</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<form id="action-form" action="" method="post">
	@csrf
</form>
@stop