<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

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
