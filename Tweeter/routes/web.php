<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/dev', 'HomeController@dev');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/username', 'HomeController@username');

//begin routes to tweetsController

Route::get('/tweets', 'tweetsController@showAllFollowed');

Route::post('/tweets/create', 'tweetsController@ajaxCreate');


Route::post('/tweets/update', 'tweetsController@updateTweet');

Route::post('/tweets/destroy', 'tweetsController@destroyTweet');

Route::post('/tweets/profile', 'tweetsController@userTweets');

Route::post('/retweet', 'tweetsController@retweet');

Route::post('/ajax/tweets', 'tweetsController@ajaxTweets');

//Begin Routes to tweetsCommentController

Route::post('/tweets/comment/create', 'tweetCommentsController@createComment');

Route::post('/tweets/comment/delete', 'tweetCommentsController@deleteComment');

Route::post('/tweets/comment/edit', 'tweetCommentsController@editComment');

//Begin Routes to likesController

Route::post('/tweets/likes', 'likesController@addLike');

Route::post('/tweets/unlike', 'likesController@removeLike');

Route::post('/likes', 'likesController@get');

// Begin Routes to ProfileController

Route::get('/user/{user_id}', 'profileController@showUser'); //a better design choise here would be to use /users/{user_id} since this presents fewer conflict scenearios.


Route::post('/user/edit', 'profileController@updateUser');

Route::post('/user/photo', 'profileController@uploadPhoto');

//Begin Routes to profileDestroyController

Route::get('/user/destroy/{user_id}', 'profileDestroyController@beginDestroy');

Route::post('/user/destroy/confirm/{user_id}', 'profileDestroyController@confirmDestroy');

//Begin Routes To FollowsController

Route::get('/users', 'followsController@showAllUsers');

Route::post('/user/follow', 'followsController@followUser');

Route::post('/user/unfollow', 'followsController@unfollowUser');

//AJAX routes

Route::post('/ajax/like', 'likesController@ajaxLike');

Route::post('/ajax/unlike', 'likesController@ajaxUnLike');
