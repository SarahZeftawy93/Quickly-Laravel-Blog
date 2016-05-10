<!-- single -->
<div class="single-page-artical">
	<div class="artical-content">
		<h3>{{$articleInfos[0]->title}}</h3>
		<img class="img-responsive" src="/Images/ArticleIMG/single/{{$articleInfos[0]->image}}" alt="{{$articleInfos[0]->image}}" />

{{-- echo contents .. convert html to normal text --}}
		<p><?php echo $articleInfos[0]->contents ?></p>
	</div>
	<div class="artical-links">
		<ul>
			<li><small> </small><span>{{date('F d, Y', strtotime($articleInfos[0]->created_at))}}</span></li>
			<li><a href="/profile/{{$articleInfos[0]->username}}"><small class="admin"> </small><span>{{$articleInfos[0]->username}}</span></a></li>

			{{-- Tags --}}
			<h3>Tags</h3>

			<?php 
			$string=''; 
			for($i=0;$i< count($tags); $i++) 
				$string .= $tags[$i]->name.','; 
			$tag = substr($string, 0, -1); 
			?>
			<input id='idOfTagsInput' style='width:300px;' value="{{ $tag }}" data-role="tagsinput" class="textbox" name="tags"/><br/>

			<style>
			.bootstrap-tagsinput .tag [data-role="remove"] { display: none; }
			.bootstrap-tagsinput input { display: none; }	
			</style>	
			<script>
			var elt = $('input');
			elt.tagsinput({
				tagClass: function(item) {
						return 'label label-warning';
				}
			});
			elt.tagsinput('add', { });
			</script>
			{{-- /tags --}}
			{{-- comments count --}}
			<li><a href="/{{$articleInfos[0]->title}}"><small class="no"> </small><span>{{$commentCount}} comment(s)</span></a></li>
			{{-- seens count --}}
			<li><a href="/{{$articleInfos[0]->title}}"><small class="no"> </small><span>{{$articleInfos[0]->seen}} seen(s)</span></a></li>

			{{-- <li><a href="#"><small class="posts"> </small><span>View posts</span></a></li>
			<li><a href="#"><small class="link"> </small><span>permalink</span></a></li> --}}
		</ul>
	</div>
