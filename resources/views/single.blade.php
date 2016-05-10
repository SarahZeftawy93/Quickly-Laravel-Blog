@extends('master')

@section('header_links')
@include('partials.header_links')
@endsection

@section('admin_button')
<?php
//if user is admin show admin button
$admin = Session::get('isAdmin');
if($admin == 1){
		?>
		@include('partials.admin_button')
		<?php
}
?>
@endsection

@section('log')
@include('partials.logout')
@endsection

@section('addArticleButton')
@include('partials.add_article_button')
@endsection

@section('contents')
@include('partials.single_article')
@include('partials.reply')
@endsection