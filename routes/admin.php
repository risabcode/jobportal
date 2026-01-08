<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ContentController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Prefix "/admin" is applied in RouteServiceProvider
| Route names use admin.*
|--------------------------------------------------------------------------
*/

Route::name('admin.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    */
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('login', [AdminAuthController::class, 'login'])
        ->name('login.submit');

    Route::post('logout', [AdminAuthController::class, 'logout'])
        ->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Protected Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth', 'ensure.admin'])->group(function () {

        /*
        | Dashboard
        */
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        /*
        | Candidates
        */
        Route::resource('candidates', CandidateController::class)
            ->only(['index', 'show', 'destroy']);

        /*
        | Resume Download
        */
        Route::get(
            'resumes/{resume}/download',
            [CandidateController::class, 'downloadResume']
        )->name('resumes.download');

        /*
        | Jobs
        */
        Route::resource('jobs', JobController::class);

        /*
        | Applications
        */
        Route::resource('applications', ApplicationController::class)
            ->only(['index', 'show', 'update', 'destroy']);

        /*
        | Inquiries
        */
        Route::resource('inquiries', InquiryController::class)
            ->only(['index', 'show', 'update']);

        /*
        | Testimonials
        */
        Route::resource('testimonials', TestimonialController::class)
            ->except(['show', 'edit', 'update']);

        /*
        | CMS Content
        */
        Route::resource('content', ContentController::class)
            ->only(['index', 'update']);
    });
});
