<?php

use App\Http\Controllers\PanelController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthCheck;

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
    Route::get('/contact', [WebController::class, 'contact'])->name('contact');
    Route::get('/blog', [WebController::class, 'blog'])->name('blog');
    Route::get('/tutorial', [WebController::class, 'tutorial'])->name('tutorial');

    Route::middleware('guest')->group(function () {
        Route::get('/register', [WebController::class, 'register']);
        Route::post('/register', [WebController::class, 'register_store']);
        Route::get('/login', [WebController::class, 'login'])->name('login');
        Route::post('/login', [WebController::class, 'login_success']);
        Route::get('/reset', [WebController::class, 'reset']);
        Route::post('/recoverp', [WebController::class, 'dorecover']);
        Route::get('/new-password/{code}', [WebController::class, 'newPassword']);
        Route::post('/changep', [WebController::class, 'changep']);
    });

    Route::get('/logout', [WebController::class, 'logout'])->name('logout');
    Route::get('/confirm/{code}', [WebController::class, 'confirm']);
    Route::get('/success', [WebController::class, 'success'])->name('success');

    // Blog routes
    Route::get('/blog', [WebController::class, 'blog'])->name('blog.index');
    Route::get('/blog/{slug}', [WebController::class, 'blogshow'])->name('blog.show');
    Route::get('/all/blog', [WebController::class, 'blogshowall'])->name('blog.all');
    Route::get('/blogs/search', [WebController::class, 'blogsearch'])->name('blogs.search');
    Route::match(['get', 'post'], '/sendcontact', [WebController::class, 'postcontact'])->name('sendcontact');
});

// <====================================== PANEL ======================================> \\
Route::group(['as' => 'panel.'], function () {
    Route::middleware([AuthCheck::class])->group(function () {
        Route::get('/panel', [PanelController::class, 'index'])->name('index');
        Route::post('store', [PanelController::class, 'store'])->name('event.store');
    });
});
