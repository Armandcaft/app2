<?php

use App\Http\Controllers\FallbackController;
use Illuminate\Support\Facades\Route;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
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


Route::get('/myblog', [PostController::class, 'index']);


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
});

//Route resource
// Route::resource('/blog', PostsController::class);

//Route for te invoke method
Route::get('/home', HomeController::class)->middleware('auth');

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


Route::fallback(FallbackController::class);
