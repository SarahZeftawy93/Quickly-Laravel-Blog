<!-- blog -->
@foreach($articleInfos as $articleInfo)
@if($articleInfo->isApproved == 1)
<div class="blog">
	<div class="blog-left">
		<div class="blog-left-grid" style="margin-bottom: 25px;">
			<div class="blog-left-grid-left">
				<h3><a href="{{$articleInfo->title}}">{{$articleInfo->title}}</a></h3>
				<p>by <a href="/profile/{{$articleInfo->username}}"><span>{{$articleInfo->username}}</span></a> | {{date('F d, Y', strtotime($articleInfo->created_at))}} | <span>Sint</span></p>
			</div>
			{{-- <div class="blog-left-grid-right">
				<a href="{{$articleInfo->title}}" class="hvr-bounce-to-bottom non">20 Comments</a>
			</div> --}}
			<div class="clearfix"> </div>
			{{-- single with title  --}}
			<a href="{{$articleInfo->title}}"><img src="images/4.jpg" alt=" " class="img-responsive" /></a>
			{{-- article image --}}
			<img src="/Images/ArticleIMG/home/{{$articleInfo->image}}" alt="{{$articleInfo->image}}"/>
			<p class="para"><?php echo $articleInfo->description ?></p>
			<div class="rd-mre">
				<a href="{{$articleInfo->title}}" class="hvr-bounce-to-bottom quod">Read More</a>
			</div>
		</div>
		{{-- social --}}
		@include('partials.social')

	</div>
	<div class="clearfix"> </div>
</div>
@endif
@endforeach
<!-- //blog -->