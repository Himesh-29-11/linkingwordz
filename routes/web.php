<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::view('/about', 'pages.placeholder', ['title' => 'About', 'description' => 'The founder and editorial approach behind LinkingWordz.'])->name('about');
Route::view('/services', 'pages.placeholder', ['title' => 'Services', 'description' => 'Content and editorial services for authors and service businesses.'])->name('services');
Route::view('/services/authors', 'pages.authors')->name('services.authors');
Route::view('/services/brands', 'pages.brands')->name('services.brands');
Route::view('/work', 'pages.placeholder', ['title' => 'Work', 'description' => 'Selected case studies and editorial projects.'])->name('work');
Route::get('/work/{slug}', fn (string $slug) => view('pages.placeholder', ['title' => str($slug)->replace('-', ' ')->title(), 'description' => 'This case study page is ready for its project content.']))->name('work.show');
Route::view('/insights', 'pages.placeholder', ['title' => 'Insights', 'description' => 'Research-backed writing, editorial thinking, and useful ideas.'])->name('insights');
Route::get('/insights/{slug}', fn (string $slug) => view('pages.placeholder', ['title' => str($slug)->replace('-', ' ')->title(), 'description' => 'This insight page is ready for its article content.']))->name('insights.show');
Route::view('/contact', 'pages.placeholder', ['title' => 'Contact', 'description' => 'Book a free discovery call with LinkingWordz.'])->name('contact');
Route::view('/privacy-policy', 'pages.placeholder', ['title' => 'Privacy Policy', 'description' => 'Our privacy policy will be published here.'])->name('privacy');
Route::view('/terms-and-conditions', 'pages.placeholder', ['title' => 'Terms & Conditions', 'description' => 'Our terms and conditions will be published here.'])->name('terms');
Route::view('/404', 'pages.placeholder', ['title' => '404 Page', 'description' => 'The page you are looking for could not be found.'])->name('page404');
