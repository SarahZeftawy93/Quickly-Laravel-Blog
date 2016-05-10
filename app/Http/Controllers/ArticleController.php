<?php

namespace Quickly_Blog\Http\Controllers;

// use Illuminate\Http\Request;

use Quickly_Blog\Http\Requests;

use Request;

use Session;

use Quickly_Blog\Article;
use Quickly_Blog\Comment;

use Image;
use DateTime;
use DB;
use Quickly_Blog\Tag;

use View;
/**
* Home controller to display home page
*/
class ArticleController extends Controller
{
	
	function __construct()
	{
	}

	public function add() {
		if(Session::has('username'))
			return view('add_article');
		else
			//error
			return view('errors.503');
	}

	//add article to db
	public function addArticle() {
		$article = new Article;
		
		//get user id
		$user = DB::table('users')->where('username', Session::get('username'))->pluck('id');
		//get article exists
		$art = DB::table('articles')->where('title', Request::get('title'))->first();

		//article not already exist
		if($art == null){
			//article not exist so add it
			$article->title = Request::get('title');
			$article->description = Request::get('description');
			$article->contents = Request::get('content');
			$article->user_id = $user[0];
			
			//conver publish date into date type
			$date = date('Y-m-d H:i:s', strtotime(Request::get('publishDate')));
			
			$article->created_at = $date;
			
			if(Request::file())
			{
				
				$image = Request::file('image');

				//img path and name as title
				$pathHome = public_path('Images/ArticleIMG/home/' . Request::get('title') . '.' . $image->getClientOriginalExtension());
				$pathSingle = public_path('Images/ArticleIMG/single/' . Request::get('title') . '.' . $image->getClientOriginalExtension());
				
				//upload image to server
				Image::make($image->getRealPath())->resize(800, 200)->save($pathHome);
				Image::make($image->getRealPath())->resize(800, 578)->save($pathSingle);
				$article->image = Request::get('title') . '.' . $image->getClientOriginalExtension();

				
			}
			//save image path to DB
			$article->save();


			//add tags
			$userTags = Request::get('tags');
			$tagArray = explode(',', $userTags);
			//get article id
			$articleID = DB::table('articles')->where('title', Request::get('title'))->select('id')->get();

			
			for ($i=0; $i < count($tagArray); $i++) { 
				$tag = new Tag;
				$tag->name = $tagArray[$i];
				$tag->article_id = $articleID[0]->id;
				$tag->save();
			}
			
			return redirect('/addArticle');
		}
		else {
			//article exist #error
			return view('errors.503');
		}
		

	}

	protected function getArticleId() {
		$article = DB::table('articles')->pluck('id');
	}

//show single article
	public function show($title) {
		if(Session::has('username')){
			//seens
			$getSeens = DB::table('articles')->where('title', $title)->select('seen')->get();
			$seens = $getSeens[0]->seen + 1;
			//update seens
			DB::table('articles')->where('title', $title)->update(['seen' => $seens]);

		//get all users and articles edit posts
			$info = DB::table('users')
			->join('articles', 'users.id', '=', 'articles.user_id')
			->select('articles.id', 'users.username', 'articles.seen', 'articles.contents', 'articles.description', 'articles.title', 'articles.image', 'articles.created_at')
			->where('articles.title', $title)->get();
        //put single article id into session after opening it in single page
			$articleId = $info[0]->id;
			Session::put('currentArticle', $articleId);

		//get users who commneted on this post
			$articleInfos = DB::table('comments')
			->join('articles', 'articles.id', '=', 'comments.article_id')
			->join('users', 'users.id', '=', 'comments.user_id')
			->where('articles.title', $title)->get();
			$commentCount = 0;
		//check if there is comments on the article
			if(!$articleInfos){
				$articleInfos = $info;
				$comment = false;
			} else {
				$comment = true;
				$commentCount = count($articleInfos);
			}
			Session::put('comments', $commentCount);

			//get article tags
			$tags = DB::table('tags')->where('article_id', $articleInfos[0]->id)->select('name')->get();

			View::share('articleInfos', $articleInfos);
			View::share('articleInfos', $comment);
			View::share('commentCount', $commentCount);
			View::share('tags', $tags);
		//send data to post view
			return View::make('single', compact('articleInfos', 'comment', 'commentCount', 'tags'));
		} else {
			//error
			return view('errors.503');
		}
	}

	public function delete($title) {
		$article = DB::table('articles')->where('title', '=', $title)->delete();
		return redirect('/admin');
	}

	public function approve($title) {
		$article = DB::table('articles')->where('title', '=', $title)->update(['isApproved' => 1]);
		return redirect('/admin');
	}

	public function remove($title)
	{
		DB::table('articles')->where('title', $title)->delete();
		return redirect('/');
	}
}