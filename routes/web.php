<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitePagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/about', [SitePagesController::class, 'about'])->name('about');
Route::get('/services', [SitePagesController::class, 'services'])->name('services');
Route::view('/services/authors', 'pages.authors')->name('services.authors');
Route::view('/services/brands', 'pages.brands')->name('services.brands');
Route::view('/services/work-with-me', 'pages.work-with-me')->name('services.work');

Route::get('/work', [SitePagesController::class, 'work'])->name('work');
Route::get('/work/{slug}', [SitePagesController::class, 'workShow'])->name('work.show');

Route::get('/insights', [SitePagesController::class, 'insights'])->name('insights');
Route::get('/insights/{slug}', [SitePagesController::class, 'insightShow'])->name('insights.show');
Route::get('/blog', [SitePagesController::class, 'insights'])->name('blog');
Route::get('/blog/{slug}', [SitePagesController::class, 'insightShow'])->name('blog.show');

Route::get('/contact', [SitePagesController::class, 'contact'])->name('contact');
Route::post('/contact', [SitePagesController::class, 'contactSubmit'])->name('contact.submit');

Route::get('/privacy-policy', [SitePagesController::class, 'legal'])->defaults('page', 'privacy-policy')->name('privacy');
Route::get('/terms-and-conditions', [SitePagesController::class, 'legal'])->defaults('page', 'terms-and-conditions')->name('terms');
Route::view('/404', 'pages.placeholder', ['title' => '404 Page', 'description' => 'The page you are looking for could not be found.'])->name('page404');
