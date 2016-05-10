<!-- CRUD -->
<div class="row">
	
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Article ID</th>
				<th>Article Title</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($articles as $article)	
			
			{{-- display users links --}}
			<tr>
				<td><a href="/{{$article->title}}">{{$article->id}}</a></td>
				<td><a href="/{{$article->title}}">{{$article->title}}</a></td>
				{{-- remove article --}}
				<td>
					<a href='/remove/{{$article->title}}' type='submit' style='margin-right:10px;' class='btn btn-danger' value='Remove'>Remove Article</a>
					
					@if ($article->isApproved == 0 && $isAdmin->isAdmin == 1) 
					{{-- see approval button --}}
					<a href='/approve/{{$article->title}}' type='submit' style='margin-right:10px;' class='btn btn-warning' value='Approve'>Approve Article</a>
					@endif
				</td>
			</tr>
			
			@endforeach
		</tbody>
	</table>
</div>