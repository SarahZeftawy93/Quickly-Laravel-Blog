<!-- CRUD -->
<div class="row">
	<a href='/newUser' type='submit' style='margin-right:10px;' class='btn btn-primary' value='Remove'>Add User</a>
	{!! Form::open(array('method' => 'post','url'=>'addUser') ) !!}

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			{{-- display users links --}}
			<tr>
				<td><a href="/profile/{{$user->username}}">{{$user->id}}</a></td>
				<td><a href="/profile/{{$user->username}}">{{$user->username}}</a></td>
				<td>
					<a href='/blockUser/{{$user->id}}' type='submit' style='margin-right:10px;' class='btn btn-danger' value='Remove'>Block User</a>
					@if($user->isAdmin)
						<a href='/updateAdmin/{{$user->id}}/0' type='submit' style='margin-right:10px;' class='btn btn-primary' value='updateAdmin'>Remove Admin</a>
					@endif
					@if(!$user->isAdmin)
						<a href='/updateAdmin/{{$user->id}}/1' type='submit' style='margin-right:10px;' class='btn btn-info' value='updateAdmin'>Make Admin</a>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</div>