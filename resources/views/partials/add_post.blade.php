<div class="artical-commentbox">
	<h3>leave a post</h3>
	<div class="table-form">
		{!! Form::open(array('method' => 'post','url'=>'addArticle', 'files'=>true) ) !!}
		<input type="text" class="textbox" value="Title" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Title';}" name="title"/>

		{{-- add publish date --}}
		<h3>Add publish date</h3>
		<?php $today=date("Y-m-d h:m:s") ?>

		<input type="text" id="datepicker" name="publishDate" value="{{ $today }}"/>
		
		<script>
		$(function() {
			$('#datepicker').datepicker({
				format: 'yy-mm-dd hh:mm:ss',
				onSelect: function(datetext){
        var d = new Date(); // for now
        datetext=datetext+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
        $('#datepicker').val(datetext);
    }
});

		});
		</script>

		{{-- image --}}
		<h3 style='margin-bottom:20px;'>Add Image </h3>
		{!! Form::file('image') !!}

		{{-- Add Tags --}}
		<h3>Add Tags separated by ,</h3>
		<input style='width:300px;' data-role="tagsinput" type='text' class="textbox" name="tags"/>


		<h3 style='margin-top:20px; margin-bottom:20px;'>Content</h3>
		<textarea name="content"></textarea>
		<script>
		CKEDITOR.replace('content');
		</script>

		<h3 style='margin-top:20px; margin-bottom:20px;'>Description</h3>
		<textarea name="description"></textarea>
		<script>
		CKEDITOR.replace('description');
		</script>

		
		<input type="submit" value="Article" style="margin-top: 20px; margin-bottom: 20px;">
		{!! Form::close() !!}
	</div>
</div>	