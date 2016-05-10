<?php
namespace Quickly_Blog\Http\Controllers;


// use Illuminate\Http\Request;

use Quickly_Blog\Http\Requests;

use Quickly_Blog\User;
use Quickly_Blog\Article;

use Request;

use Session;

use DB;

use View;

class UserController extends Controller
{
	function __construct()
	{
	}

	/**
	 * add new user to user table in the DB using registration form
	 */
    public function add() {
    	$user = new User;
        //get all users
        $users = User::all();
        // check if user is exists
        $userExist = DB::table('users')->where('username', Request::get('username'))->first();
        if($userExist != null){
            //user already exist  #error
            return view('errors.503');
        } 
        else {
            //add user

            $user->fname = Request::get('fname');
            $user->lname = Request::get('lname');
            $user->username = Request::get('username');
            $user->email = Request::get('email');
            $user->password = md5(Request::get('password'));
            
            //admin can add user
            if(Session::get('username') == null){
            $user->isLogged = true;
            //add user to session
                Session::put("username", Request::get('username'));
                Session::put("isLogged", true);
            }
            $user->save();
            return redirect('/home');
        }
    }

    // get username and password, user is logged , admin or not
    public function login(){

        //get user
        $user = Request::get('username');        

        /**
         * check if user exist
         */
        //get user from the table
        $userExist = DB::table('users')->where('username', Request::get('username'))->first();
        
        if($userExist == null){

            return redirect('/register');
        }
        else {
            //log user and make sure if user is blocked he can not login
            if($userExist->username == Request::get('username') && $userExist->password == md5(Request::get('password')) &&
                $userExist->isBlocked == 0){
                //user is logged in
                User::where('username', Request::get('username'))->update(['isLogged' => true]);
            $admin = DB::table('users')->where('username', Request::get('username'))->pluck('isAdmin');
                //add user to session
            Session::put("username", Request::get('username'));
            Session::put("isLogged", true);
            Session::put('isAdmin', $admin[0]);
            return redirect('/home');
        }
        else {
                // try to log again #error
            return view('errors.503');
        }

    }

}

    // logout user
public function logout() {
    $user = Session::get('username');
    User::where('username', $user)->update(['isLogged' => false]);
    Session::put("isLogged", false);
    Session::flush();
    return redirect('/login');
}


protected function getUserId($username){
    $user = DB::table('users')->where('username',$username)->first();
    return $user->id;
}


    //admin panel
public function admin() {
    if(Session::has('username')){
        //see if the user is admin or not
        $userAdmin = DB::table('users')->where('username', Session::get('username'))->first();
        if($userAdmin->isAdmin == 1){
        //get all articles
            $users = DB::table("users")->get();

            View::share('users', $users);
            return View::make('admin', compact('users'));
        } else {
        //error
            return view('errors.503');
        }
    } else {
        return view('errors.503');
    }
}

    //block User
public function block($id) {
    $user = DB::table('users')->where('id', '=', $id)->update(['isBlocked' => 1]);
    return redirect('/admin');
}


    //show user articles
public function showArticles($username) {
    if(Session::has('username')){
        
        $userID = DB::table('users')->where('username', $username)->select('id')->get();

        $articles = DB::table('articles')
        ->leftjoin('users', 'articles.user_id', '=', 'users.id')
        ->where('articles.user_id', $userID[0]->id)
        ->select('articles.title', 'articles.id', 'users.isAdmin', 'articles.isApproved')
        ->get();
        $currentUser = DB::table('users')->where('username', Session::get('username'))->select('isAdmin')->get();
    


        View::share('articles', $articles);
        View::share('isAdmin', $currentUser[0]);
        return View::make('profile', compact('articles', 'isAdmin'));
    } else {
        //error
        return view('errors.503');
    }
}

public function addUserByAdmin()
{
    return view('addUser');
}

//update admin
public function updateAdmin($id, $admin)
{
    DB::table('users')->where('id', $id)->update(['isAdmin' => $admin]);
    return redirect('admin');
}
}