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
//認証
Auth::routes();
//ログアウト
Route::group(array('before' => 'auth'), function() {
	Route::get('/account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
	));
});
// カレンダー
Route::get('/', 'CalendarController@index');//トップ画面表示
Route::post('/calendar/post_game', 'CalendarController@post_game');//GAME投稿
Route::get('/calendar/move', 'CalendarController@move_month');//カレンダー移動
Route::get('/calendar/show_game', 'CalendarController@show_game');// GAME一覧表示
Route::get('/calendar/game_detail', 'CalendarController@game_detail');//GAME詳細
Route::post('/calendar/post_comment', 'CalendarController@post_comment');//コメント投稿
// マイページ　フォロー
Route::get('/mypage', 'MypageController@index');
Route::get('/follow', 'MypageController@follow');
Route::get('/user_detail/{user}', 'MypageController@user_detail');
// 設定
Route::get('/config/{user}', 'ConfigController@index');
Route::patch('/config/{user}/update', 'ConfigController@update_user');
// タイムライン
Route::get('/timeline', 'TimelineController@index');
// 場所
Route::get('/place', 'PlaceController@index');
Route::get('/place/{place}/detail', 'PlaceController@place_detail');
// いいね
Route::post('/timeline/like', 'TimelineController@add_remove_like');
// 管理メニュー
Route::get('/admin', 'AdminController@admin_index');
Route::get('/admin/master/place', 'AdminController@place');
Route::post('/admin/master/place/create', 'AdminController@create_place');
Route::patch('/admin/master/place/{place}/update', 'AdminController@update_place');
Route::delete('/admin/master/place/{place}/delete', 'AdminController@delete_place');
Route::get('/admin/master/team', 'AdminController@team');
Route::post('/admin/master/team/create', 'AdminController@create_team');
Route::patch('/admin/master/team/{team}/update', 'AdminController@update_team');
Route::delete('/admin/master/team/{team}/delete', 'AdminController@delete_team');
Route::get('/admin/master/gametype', 'AdminController@gametype');
Route::get('/admin/master/gametype', 'AdminController@gametype');
Route::post('/admin/master/gametype/create', 'AdminController@create_gametype');
Route::patch('/admin/master/gametype/{gametype}/update', 'AdminController@update_gametype');
Route::delete('/admin/master/gametype/{gametype}/delete', 'AdminController@delete_gametype');
Route::get('/admin/master/commenttype', 'AdminController@commenttype');
Route::get('/admin/master/commenttype', 'AdminController@commenttype');
Route::post('/admin/master/commenttype/create', 'AdminController@create_commenttype');
Route::patch('/admin/master/commenttype/{commenttype}/update', 'AdminController@update_commenttype');
Route::delete('/admin/master/commenttype/{commenttype}/delete', 'AdminController@delete_commenttype');
Route::get('/admin/master/user', 'AdminController@user');
Route::get('/admin/master/user', 'AdminController@user');
Route::post('/admin/master/user/create', 'AdminController@create_user');
Route::patch('/admin/master/user/{user}/update', 'AdminController@update_user');
Route::delete('/admin/master/user/{user}/delete', 'AdminController@delete_user');
// 初期
Route::get('/home', 'HomeController@index')->name('home');
// チャット（保留）
Route::get('/chat', 'ChatController@index');
