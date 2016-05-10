<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//home page
Route::get('/', 'HomeController@index');

//home page
Route::get('/home', 'HomeController@index');

//action to add method in user controller
Route::post('/addUser', 'UserController@add');

//addUserByAdmin
Route::get('/newUser', 'UserController@addUserByAdmin');

//remove admin
Route::get('/updateAdmin/{id}/{admin}', 'UserController@updateAdmin');

//action to add method in Article controller
Route::post('/addArticle', 'ArticleController@addArticle');

//action to log user
Route::post('/logUser', 'UserController@login');

//login
Route::get('/login', 'LogController@login');

//register
Route::get('/register', 'LogController@register');

//add article
Route::get("/addArticle", 'ArticleController@add');

//action to logout user
Route::get('/logout', "UserController@logout");


//user profile
Route::get('/profile/{username}', 'UserController@showArticles');

//view admin panel
Route::get('/admin', 'UserController@admin');

//remove user
Route::get('/blockUser/{id}', 'UserController@block');

//approve article
Route::get('/approve/{title}', 'ArticleController@approve');

//remove article
Route::get('/remove/{title}', 'ArticleController@remove');

//action to go to single article page
Route::get('/{title}', 'ArticleController@show');

//action addComment to store comment in the DB
Route::post('/{title}/addComment', 'CommentController@add');

