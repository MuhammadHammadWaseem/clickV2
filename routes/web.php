<?php

use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\WebPageController;

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

        // EVENT
        Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
            Route::get('/{id}/general-infos', [PanelController::class, 'generalInfos'])->name('generalInfos');
            Route::post('/updateEvent/{id}', [PanelController::class, 'updateEvent'])->name('updateEvent');
            Route::delete('/delete/{id}', [PanelController::class, 'deleteEvent'])->name('delete');
            Route::post('store', [PanelController::class, 'store'])->name('store');

            Route::get('/{id}/webpage', [WebPageController::class, 'index'])->name('webpage');
            Route::post('/{id}/store/images', [WebPageController::class, 'storeImages'])->name('store.images');
            Route::post('/{id}/delete/images', [WebPageController::class, 'deleteImages'])->name('delete.images');

            // Meals Route
            Route::get('{id}/meals', [MealController::class, 'index'])->name('meals');
            Route::post('/meals/store', [MealController::class, 'store'])->name('meals.store');
           // Edit meal route (fetch meal data)
           Route::get('/meal/edit/{id}', [MealController::class, 'edit'])->name('meals.edit');
           Route::post('/meal/update/{id}', [MealController::class, 'update'])->name('meals.update');
           Route::delete('/meals/delete/{id}', [MealController::class, 'destroy'])->name('meals.destroy');
        });
    });
});
