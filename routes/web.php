<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\Admin;
use App\Http\Middleware\UnderConstruction;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\foodController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
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
//Route::middleware([Authenticate::class])->group(function(){


	//general routes
	Route::get('/',[pagesController::class, 'home']);
	Route::get('/auth',[LoginController::class,'auth']);
	Route::post('/auth',[LoginController::class,'auth']);

Route::group(['middleware' => ['underConstruction']], function (){


	Route::get('/contact',[pagesController::class,'contact']);
	Route::get('/about',[pagesController::class,'about']);
	Route::get('/registration',[LoginController::class,'registration']);
	Route::post('/registration',[RegisterController::class,'create']);
	Route::get('/user',[UserController::class,'user']);
	Route::get('/logout', [LoginController::class,'logout']);
	Route::get('/login', [LoginController::class,'login']);

	//post routes
	Route::get('/post',[PostController::class,'index']);
	Route::post('/post',[PostController::class,'store']);
	Route::get('/post/{post}', [PostController::class,'show']);
	Route::get('/post/edit/{post}', [PostController::class,'edit']);
	Route::put('/post/{post}', [PostController::class,'update']);
	Route::post('/post/{post}', [CommentController::class,'store']);
	Route::get('/create',[PostController::class,'create']);

	//donate routes
	Route::get('/donate', [DonateController::class,'index']);
	Route::post('/donate', [DonateController::class,'store']);
	Route::get('/donate/create', [DonateController::class,'create']);
	Route::get('/donate/gallery/{id}',[DonateController::class,'gallery']);
	Route::get('/donateFilter', [DonateController::class,'donateFilter']);


	//sell routes
	Route::get('/sell', [SellController::class,'index']);
	Route::post('/sell', [SellController::class,'store']);
	Route::get('/sell/create', [SellController::class,'create']);
	Route::get('/sell/gallery/{id}',[SellController::class,'gallery']);
	Route::get('/sellFilter', [SellController::class,'sellFilter']);

	//discussion routes
	Route::get('/discussion',[DiscussionController::class,'index']);
	Route::get('/discussion/{id}',[DiscussionController::class,'discussion']);
	Route::get('/discussion/create',[DiscussionController::class,'create']);
	Route::post('/discussion/create',[DiscussionController::class,'store']);
	Route::post('/discussion/{id}', [CommentController::class,'store']);

	//question routes
	Route::get('/question',[pagesController::class,'question']);
	Route::post('/question/create',[QuestionController::class,'create']);
	Route::get('/survey',[pagesController::class,'survey']);

	//food routes
	Route::get('/food',[foodController::class,'index']);
	Route::get('/food/{section}',[foodController::class,'section']);
	Route::get('/food/product/{product}',[foodController::class,'product']);
	Route::post('/food/product/{product}',[foodController::class,'product']);
	Route::get('/food/product/create/new',[foodController::class,'productCreate'])->middleware('admin');
	Route::get('/recipes',[foodController::class,'recipes']);
	Route::get('/recipes/{id}',[foodController::class,'showRecipe']);
	Route::get('/recipes/create/new',[foodController::class,'recipeCreate']);
	Route::post('/recipes/create/new',[foodController::class,'recipeInsert']);
	Route::post('/recipes/create/new/product',[foodController::class,'addIngredient']);
	Route::get('/recipes/edit/{recipeId}',[foodController::class,'editRecipe']);
	Route::post('/recipes/update/{recipeId}',[foodController::class,'updateRecipe']);
	Route::post('/recipes/edit/del',[foodController::class,'delFromRecipe']);

	//poker test
	Route::get('/cards',[foodController::class,'shuffle']);

	//cart routes
	Route::get('/cart',[cartController::class,'cart']);
	Route::post('/cart/toWarehouse',[cartController::class,'toWarehouse']);
	Route::get('/cart/toWarehouse',[cartController::class,'toWarehouse']);
	Route::post('/cart/del/{product}',[cartController::class,'delFromCart']);
	Route::post('/cart/add/linethrough',[cartController::class,'addLinethrough']);

	//store routes
	Route::get('/store',[foodController::class,'store']);
	Route::post('/store/del/{product}',[foodController::class,'delStoreProduct']);
	Route::post('/store/update/expiration', [foodController::class,'storeDatailsUpdate']);

});