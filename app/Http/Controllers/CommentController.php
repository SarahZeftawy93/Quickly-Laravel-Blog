<?php

namespace Quickly_Blog\Http\Controllers;

// use Illuminate\Http\Request;

use Quickly_Blog\Http\Requests;

use Request;

use Session;

use Quickly_Blog\Comment;

use Image;

use DB;

use View;
/**
* comment controller to display comment page
*/
class CommentController extends Controller
{
	
	function __construct()
	{
	}

	public function add($title) {

		$comment = new Comment;
		//get user id
		$user = DB::table('users')->where('username', Session::get('username'))->pluck('id');
		//add comment to DB
		$comment->comment = Request::get('comment');
		$comment->user_id = $user[0];
		$comment->article_id = Session::get('currentArticle');
		$comment->save();
		// return to the single article after storing comment
		return redirect("/$title");
	}
}