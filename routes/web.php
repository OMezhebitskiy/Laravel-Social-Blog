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



# Главная страница
Route::get('/', 'IndexController@index')->middleware('auth');

# Роут для авторизации
Route::auth();

# Вывод списка статей для авторизованых пользователей
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

# Поиск статей по названию
Route::post('/home', ['as' => 'home__search', 'uses' => 'HomeController@search']);
Route::post('/home/{category_id}', ['as' => 'home__search', 'uses' => 'HomeController@search']);

# Вывод списка статей по категории
Route::get('/home/{category_id}', ['as' => 'homeCategory', 'uses' => 'HomeController@category']);

# Поиск статей по названию в категории

# Форма создания

Route::get('/article', ['as' => 'formArticle', 'uses' => 'ArticleController@form']);

# Если метод post то создаем статью
Route::post('/article', ['as' => 'create', 'uses' => 'ArticleController@create']);

Route::get('/lk', ['as' => 'Author', 'uses' => 'lkAuthorController@show']);

Route::get('/article/{id}', ['as' => 'article', 'uses' => 'ArticleController@show']);

Route::get('/article/{id}/delete', ['as' => 'deleteArticle', 'uses' => 'ArticleController@delete']);

Route::get('/article/{id}/edit', ['as' => 'editArticle', 'uses' => 'ArticleController@edit']);

Route::post('/article/{id}/edit', ['as' => 'editArticle', 'uses' => 'ArticleController@update']);


# Добавление комментария
Route::post('/article/{id}', ['as' => 'addComment', 'uses' => 'ArticleController@add_comment']);


Route::get('/article/{id}/uprating', ['as' => 'upRating', 'uses' => 'ArticleController@upRating']);

Route::get('/article/{id}/downrating', ['as' => 'downRating', 'uses' => 'ArticleController@downRating']);

Route::get('/article/{id}/resetrating', ['as' => 'resetRating', 'uses' => 'ArticleController@resetRating']);


Route::get('/comment/{id}/upcomment', ['as' => 'upComment', 'uses' => 'ArticleController@upComment']);

Route::get('/comment/{id}/downcomment', ['as' => 'downComment', 'uses' => 'ArticleController@downComment']);

Route::get('/comment/{id}/resetcomment', ['as' => 'resetComment', 'uses' => 'ArticleController@resetComment']);

/*
 * АДМИНКА
 */

Route::get('/admin', ['as' => 'admin', 'uses' => 'IndexController@admin']);
Route::get('/admin/categories', ['as' => 'admin__categories', 'uses' => 'IndexController@a']);

/*
 * Пользователи
 */
Route::get('/user', ['as' => 'user', 'uses' => 'lkAuthorController@user']);

Route::get('/user/{id}', ['as' => 'user__profile', 'uses' => 'lkAuthorController@profile']);

Route::get('/user/{id}/send-friend', ['as' => 'user__send-friend', 'uses' => 'lkAuthorController@friend__send']);

Route::get('/user/{id}/friend-accept', ['as' => 'user__friend-accept', 'uses' => 'lkAuthorController@friend_accept']);

Route::get('/user/{id}/friend-decline', ['as' => 'user__friend-decline', 'uses' => 'lkAuthorController@friend_decline']);

Route::post('/user/{id}', ['as' => 'user__message-send', 'uses' => 'lkAuthorController@message__send']);

#FAQ
Route::get('/faq', ['as' => 'faq', 'uses' => 'IndexController@faq']);