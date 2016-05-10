<?php

namespace Quickly_Blog\Http\Controllers;

use Illuminate\Http\Request;

use Quickly_Blog\Http\Requests;

use Session;

use Quickly_Blog\Article;

use View;

use DB;
/**
* Home controller to display home page
*/
class HomeController extends Controller
{
	
	function __construct()
	{
	}

	public function index() {
		/**
		 * if user is not logged .. log
		 * he can't see home if he is not logged
		 */
		if(!Session::has('username'))
			
			return view('user.login');
		else{
		//display articles
		//get all articles
			
			//get all users and articles edit posts
			$articleInfos = DB::table('users')
            ->join('articles', 'users.id', '=', 'articles.user_id')
            ->select('users.username', 'articles.isApproved', 'articles.contents', 'articles.description', 'articles.title', 'articles.image', 'articles.created_at')
            ->get();


			View::share('articleInfos', $articleInfos);
		//send data to post view
			return View::make('home', compact('articleInfos'));

		}
	}
}