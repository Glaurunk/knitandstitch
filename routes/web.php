<?php
use App\Http\Controllers\CommentController;

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


// MAIN PAGES
Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/policy', 'PagesController@policy');
Route::get('/tou', 'PagesController@tou');

// RESOURCES
Route::resource('posts', 'PostController');
Route::resource('comments', 'CommentController');
Route::resource('photos', 'PhotoController');
Route::resource('alboums', 'AlboumController');
Route::resource('users', 'UserController');

// POSTS specific queries
Route::get('/fashion', 'PagesController@fashion')->name('fashion');
Route::get('/self_care', 'PagesController@self_care')->name('self_care');
Route::get('/my house', 'PagesController@my_house')->name('my_house');
Route::get('/inspiration', 'PagesController@inspiration')->name('inspiration');

//SEARCH
Route::get('/search', 'PagesController@display_search' );
Route::post('/search', 'PagesController@search');

//DASHBOARD
Route::get('/admin', 'AdminController@dashboard')->name('dashboard');
Route::get('/admin/posts', 'AdminController@posts');
Route::get('/carousel', 'AdminController@carousel');
Route::post('/addtocarousel', 'AdminController@addToCarousel');
Route::post('/removefromcarousel', 'AdminController@removeFromCarousel');

// AUTHENTICATION
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
