@extends('master')

@section('header_links')
	@include('partials.header_links')
@endsection

@section('admin_button')
	@include('partials.admin_button')
@endsection

@section('log')
	@include('partials.logout')
@endsection

@section('addArticleButton')
	@include('partials.add_article_button')
@endsection

@section('contents')
	@include('partials.adminPanel')
@endsection
