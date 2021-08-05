<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrariesController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BuyersController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReviewersController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UsersController;
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
//UX Controllers
Route::get('/getuxmeta/{id}',[App\Http\Controllers\UxController::class,'getUxContents']);
Route::get('/getuxmenu/{id}',[App\Http\Controllers\UxController::class,'getUxMenus']);


Route::get('/login/{social}',[App\Http\Controllers\Auth\LoginController::class,'socialLogin'])->where('social','twitter|facebook|linkedin|google|github|bitbucket');
//spcail LoginController
Route::get('/login/{social}/callback',[App\Http\Controllers\Auth\LoginController::class,'handleProviderCallback'])->where('social','twitter|facebook|linkedin|google');

//common services
Route::get('/resources/',[App\Http\Controllers\Controller::class,'getResources']);

//mobile services
Route::get('mbooks/hsc/{id}',[App\Http\Controllers\BooksController::class,'getHSC']);
Route::get('mbooks/libraries/register',[App\Http\Controllers\Auth\Library\RegisterController::class,'simpleRegistrationForm']);

Route::get('mbooks/',[App\Http\Controllers\BooksController::class,'getForyou']);

Route::get('mbooks/newarrivals',[App\Http\Controllers\BooksController::class,'getNewArrivals']);
Route::get('mbooks/search/',[App\Http\Controllers\BooksController::class,'getSearchResultAll']);
Route::get('mbooks/search/{keywords}',[App\Http\Controllers\BooksController::class,'getSearchResult']);

Route::get('mbooks/foryou',[App\Http\Controllers\BooksController::class,'getForyou']);
Route::get('mbooks/toprated',[App\Http\Controllers\BooksController::class,'getToprated']);
Route::get('mbooks/editorschoice',[App\Http\Controllers\BooksController::class,'getEditorschoice']);
Route::get('mbooks/favourites',[App\Http\Controllers\BooksController::class,'getFavourites']);
Route::get('mbooks/newbooks',[App\Http\Controllers\BooksController::class,'getNewBooks']);
Route::get('mbooks/upcoming',[App\Http\Controllers\BooksController::class,'getUpcoming']);

Route::get('mcategories/',[App\Http\Controllers\CategoriesController::class,'getmCategories']);

//web services
Route::get('authors/all',[App\Http\Controllers\AuthorsController::class,'allListedAuthors']);

Route::get('books/totalbooks',[App\Http\Controllers\BooksController::class,'totalbooks']);
Route::get('books/allbooks',[App\Http\Controllers\BooksController::class,'allListedBooks']);
Route::get('books/popularbooks',[App\Http\Controllers\BooksController::class,'allPopularBooks']);
Route::get('books/favoritebooks',[App\Http\Controllers\BooksController::class,'allFavoriteBooks']);
Route::get('books/author/{id}',[App\Http\Controllers\BooksController::class,'booksByAuthor']);
Route::get('books/category/{id}',[App\Http\Controllers\BooksController::class,'booksByCategory']);


Route::get('books/alls/{category}/{offset}/{limit}',[App\Http\Controllers\BooksController::class,'allbooks']);

Route::get('books/totalnewarrivals',[App\Http\Controllers\BooksController::class,'totalnewarrivals']);
Route::get('books/newarrivals/{offset}/{limit}',[App\Http\Controllers\BooksController::class,'newarrivals']);
Route::get('books/favorite',[App\Http\Controllers\BooksController::class,'favorite']);
Route::get('library/preferences',[App\Http\Controllers\LibrariesController::class,'booksCategories']);
Route::get('books/categories/{id}',[App\Http\Controllers\BooksController::class,'categories']);

Route::get('books/offers',[App\Http\Controllers\BooksController::class,'offers']);
Route::get('books/publishers',[App\Http\Controllers\BooksController::class,'publishers']);
Route::get('contactus',[App\Http\Controllers\HomeController::class,'contactus']);



Route::get('libraries/register',[App\Http\Controllers\Auth\Library\RegisterController::class,'showRegistrationForm'])->name('libregisterform');
Route::get('libraries/home',[App\Http\Controllers\LibrariesController::class,'welcomePage']);
Route::post('libraries/register',[App\Http\Controllers\Auth\Library\RegisterController::class,'register']);




Route::get('/', [App\Http\Controllers\BooksController::class,'welcomePage']);

Auth::routes(['verify' => true]);

Route::get('/home',[App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::resource('libraries', LibrariesController::class);
Route::resource('authors', AuthorsController::class)->middleware('verified');
Route::resource('books', BooksController::class)->middleware('verified');
Route::resource('buyers', BuyersController::class)->middleware('verified');
Route::resource('orders', OrdersController::class)->middleware('verified');
Route::resource('reviewers', ReviewersController::class)->middleware('verified');
Route::resource('publishers', PublishersController::class)->middleware('verified');
Route::resource('categories', CategoriesController::class)->middleware('verified' );
Route::resource('users', UsersController::class)->middleware('verified');


Route::get('super_register',[App\Http\Controllers\Auth\Super\RegisterController::class,'showRegistrationForm']);
Route::post('super_register',[App\Http\Controllers\Auth\Super\RegisterController::class,'register']);
Route::get('/super_home', function(){
  return view('super.home');
});


Route::get('createcaptcha',[App\Http\Controllers\CaptchaController::class,'create']);
Route::post('captcha',[App\Http\Controllers\CaptchaController::class,'captchaValidate']);
Route::get('refreshcaptcha',[App\Http\Controllers\CaptchaController::class,'refreshCaptcha']);
