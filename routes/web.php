<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/lang/{lang}', [WebController::class, 'lang'])->name('lang.switch');
Route::group(['as' => 'web.'], function () {
    Route::get('/', [WebController::class, 'index'])->name('index');
    Route::get('/events', [WebController::class, 'events'])->name('events');
    Route::get('/features', [WebController::class, 'features'])->name('features');
    Route::get('/about', [WebController::class, 'about'])->name('about');
    Route::get('/contact', [WebController::class, 'contact'])->name('about');
    Route::get('/blog', [WebController::class, 'blog'])->name('about');
    Route::get('/tutorial', [WebController::class, 'tutorial'])->name('about');
});
Route::get('/blog', [WebController::class, 'blog'])->name('blog.index');
Route::get('/blog/{slug}', [WebController::class,'blogshow'])->name('blog.show');
Route::get('/all/blog', [WebController::class,'blogshowall'])->name('blog.all');
Route::get('/blogs/search', [WebController::class,'blogsearch'])->name('blogs.search');
Route::match(['get', 'post'], '/sendcontact', [WebController::class, 'postcontact'])->name('sendcontact');