<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SitePageController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WorkItemController;
use App\Http\Controllers\BlogEngageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitePagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/about', [SitePagesController::class, 'about'])->name('about');
Route::get('/services', [SitePagesController::class, 'services'])->name('services');
Route::get('/services/authors', [SitePagesController::class, 'servicesAuthors'])->name('services.authors');
Route::get('/services/brands', [SitePagesController::class, 'servicesBrands'])->name('services.brands');
Route::get('/services/work-with-me', [SitePagesController::class, 'servicesWork'])->name('services.work');

Route::get('/portfolio', [SitePagesController::class, 'portfolio'])->name('portfolio');

Route::get('/work', [SitePagesController::class, 'work'])->name('work');
Route::get('/work/{slug}', [SitePagesController::class, 'workShow'])->name('work.show');

Route::get('/insights', [SitePagesController::class, 'insights'])->name('insights');
Route::get('/insights/{slug}', [SitePagesController::class, 'insightShow'])->name('insights.show');
Route::get('/blog', [SitePagesController::class, 'insights'])->name('blog');
Route::get('/blog/{slug}', [SitePagesController::class, 'insightShow'])->name('blog.show');

Route::get('/contact', [SitePagesController::class, 'contact'])->name('contact');
Route::post('/contact', [SitePagesController::class, 'contactSubmit'])->name('contact.submit');

Route::post('/blog/{slug}/like', [BlogEngageController::class, 'like'])->name('blog.like');
Route::get('/blog/{slug}/comments', [BlogEngageController::class, 'comments'])->name('blog.comments');
Route::post('/blog/{slug}/comments', [BlogEngageController::class, 'comment'])->name('blog.comment');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::resource('posts', PostController::class)->except(['show']);
        Route::resource('testimonials', TestimonialController::class)->except(['show']);
        Route::resource('services', ServiceController::class)->except(['show']);
        Route::resource('work', WorkItemController::class)->except(['show']);
        Route::resource('portfolio', PortfolioItemController::class)->except(['show'])->parameters(['portfolio' => 'portfolioItem']);
        Route::get('pages', [SitePageController::class, 'index'])->name('pages.index');
        Route::get('pages/{page}/edit', [SitePageController::class, 'edit'])->name('pages.edit');
        Route::put('pages/{page}', [SitePageController::class, 'update'])->name('pages.update');
        Route::get('settings', [SiteSettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SiteSettingController::class, 'update'])->name('settings.update');
        Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
        Route::patch('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
        Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
        Route::get('inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
        Route::get('inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
        Route::patch('inquiries/{inquiry}', [InquiryController::class, 'update'])->name('inquiries.update');
        Route::delete('inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');
    });
});

Route::get('/privacy-policy', [SitePagesController::class, 'legal'])->defaults('page', 'privacy-policy')->name('privacy');
Route::get('/terms-and-conditions', [SitePagesController::class, 'legal'])->defaults('page', 'terms-and-conditions')->name('terms');
Route::view('/404', 'pages.placeholder', ['title' => '404 Page', 'description' => 'The page you are looking for could not be found.'])->name('page404');
