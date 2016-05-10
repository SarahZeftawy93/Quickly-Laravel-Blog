{{-- replies --}}

<div class="comment-grid-top">
	<h3>Responses</h3>
	{{-- display comments --}}

	@foreach($articleInfos as $articleInfo)
	@if($comment)
	<div class="comments-top-top">
		<div class="top-comment-left">
			<a href="#"><img class="img-responsive" src="assets/images/co.png" alt=""></a>
		</div>
		<div class="top-comment-right">
			<ul>
				<li><span class="left-at"><a href="#">{{$articleInfo->username}}</a></span></li>
				<li><span class="right-at">{{date('F d, Y H:i:s', strtotime($articleInfo->created_at))}}</span></li>
				{{-- <li><a class="reply" href="#">REPLY</a></li> --}}
			</ul>
			<p></p>
		</div>
		<div class="clearfix"><?php echo $articleInfo->comment ?></div>
	</div>
	@endif
	@endforeach
	<div class="artical-commentbox">
		<h3>leave a comment</h3>
		<div class="table-form">
			
			{!! Form::open(array('method' => 'post','url'=>'/'. $articleInfos[0]->title .'/addComment')) !!}

			{{-- <textarea value="Comment:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Comment';}" name='comment'>Comment</textarea> --}}
			<textarea name="comment"></textarea>
			<script>
				CKEDITOR.replace('comment');
			</script>
			<input type="submit" value="Comment">
			{!! Form::close() !!}
		</div>
	</div>	
</div>
<!-- /single -->
{{-- /replies --}}
