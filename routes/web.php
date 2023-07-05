<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\Social\GithubController;
use App\Http\Controllers\Social\GoogleController;
use App\Http\Controllers\Social\TwitterController;
use App\Http\Controllers\Social\FacebookController;
use App\Http\Controllers\Social\LinkedlnController;

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

    /*
    $name = "Code with Stormeur";

    try {
        throw new Exception('Try message exception');
    } catch (Exception $e) {
        DebugBar::addException($e);
    }

    Debugbar::info('Info test log');
    Debugbar::error('error test log');
    Debugbar::warning('warning test log');
    Debugbar::addMessage('message test log');

    Debugbar::startMeasure('Wohoo !', 'Rendering our first message');
    */

    return view('welcome');
});


Route::get('/myblog', [PostController::class, 'index'])->middleware('auth');


/*
    // Route::get('/blog/{id}', [PostsController::class, 'show'])->where('id', '[0-9]+');
    // Route::get('/blog/{id}', [PostsController::class, 'show'])->whereNumber('id');

    // Route::get('/blog/{name}', [PostsController::class, 'show'])
    //     ->where('name', '[A-Za-z]+');
    // Route::get('/blog/{name}', [PostsController::class, 'show'])
    //     ->whereAlpha('name');

    // Route::get('/blog/{name}', [PostsController::class, 'show'])
    //     ->where([
    //         'id', '[0-9]+',
    //         'name', '[A-Za-z]+',
    //     ]);
    // Route::get('/blog/{id}/{name}', [PostsController::class, 'show'])
    //     ->whereNumber('id')
    //     ->whereAlpha('name');

*/

Route::prefix('/blog')->group(function () {
    Route::get('/create', [PostsController::class, 'create'])->name('blog.create');
    //GET
    Route::get('/', [PostsController::class, 'index'])->name('blog.index');
    Route::get('/{id}', [PostsController::class, 'show'])->name('blog.show');
    //POST
    Route::post('/', [PostsController::class, 'store'])->name('blog.store');
    //PUT OR PATCH
    Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('blog.edit');
    Route::patch('/{id}', [PostsController::class, 'update'])->name('blog.update');
    //DELETE
    Route::delete('/{id}', [PostsController::class, 'destroy'])->name('blog.destroy');
}); /* ->middleware('auth'); /* We defined in a __construct function the middeware usage */

Route::prefix('/category')->group(function () {
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    //GET
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('category.show');
    //POST
    Route::post('/', [CategoryController::class, 'store'])->name('category.store');
    //PUT OR PATCH
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/{id}', [CategoryController::class, 'update'])->name('category.update');
    //DELETE
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});
//Route resource
// Route::resource('/blog', PostsController::class);

Route::get('/affect_category_to_post/{post_id}', [PostsController::class, 'affectCategory'])->name('affect_category');
Route::post('/update_affect_category_to_post/{post_id}', [PostsController::class, 'updateAffect'])->name('update_affect_category');

//Route for te invoke method
Route::get('/home', HomeController::class);

//MULTIPLE HTTP VERBS
// Route::match(['get', 'post'], '/blog', [PostsController::class, 'index']);
// Route::any('/blog', [PostsController::class, 'index']);

//Return view
// Route::view('/blog', 'blog.index', ['name' => 'Code with Stormeur']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

Route::controller(GoogleController::class)->group(function() {
    Route::get('social/google', 'redirect')->name('auth.google');
    Route::get('social/google/callback', 'googleCallback');
});
// Route::get('social/google', [GoogleController::class, 'redirect'])->name('auth.google');
// Route::get('social/google/callback', [GoogleController::class, 'googleCallback']);
// OR
// Route::get('social/google', 'GoogleController@redirect')->name('auth.google');
// Route::get('social/google/callback', 'GoogleController@googleCallback');

Route::controller(FacebookController::class)->group(function(){
    Route::get('social/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('social/facebook/callback', 'handleFacebookCallback');
});

Route::controller(GithubController::class)->group(function(){
    Route::get('social/github', 'redirectToGithub')->name('auth.github');
    Route::get('social/github/callback', 'handleGithubCallback');
});

Route::controller(LinkedlnController::class)->group(function(){
    Route::get('social/linkedln', 'redirectToLinkedln')->name('auth.linkedln');
    Route::get('social/linkedln/callback', 'handleLinkedlnCallback');
});

Route::controller(TwitterController::class)->group(function(){
    Route::get('social/twitter', 'redirectToTwitter')->name('auth.twitter');
    Route::get('social/twitter/callback', 'handleTwitterCallback');
});

// Route::get('/admin', 'AdminController@index');
// Route::get('/export/{type}', 'AdminController@export');

Route::fallback(FallbackController::class);

Route::get('send-mail', [MailController::class, 'index']);
Route::get('email/view', [MailController::class, 'displayEmailPage']);

// /*------------------------------------------
// --------------------------------------------
// All Normal Users Routes List
// --------------------------------------------
// --------------------------------------------*/
// Route::middleware(['auth', 'user-access:user'])->group(function () {

//     Route::get('/home', [HomeController::class, 'index'])->name('home');
// });

// /*------------------------------------------
// --------------------------------------------
// All Admin Routes List
// --------------------------------------------
// --------------------------------------------*/
// Route::middleware(['auth', 'user-access:admin'])->group(function () {

//     Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
// });

// /*------------------------------------------
// --------------------------------------------
// All Admin Routes List
// --------------------------------------------
// --------------------------------------------*/
// Route::middleware(['auth', 'user-access:manager'])->group(function () {

//     Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
// });
