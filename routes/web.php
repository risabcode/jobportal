<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Front\IndustryController;
use App\Http\Controllers\Front\CareerController;
use App\Http\Controllers\Front\JobController as FrontJobController;
use App\Http\Controllers\Front\ContactController;

/*
|--------------------------------------------------------------------------
| Public Website Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/who-we-are', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/industries-we-serve', [IndustryController::class, 'index'])->name('industries');

/*
|--------------------------------------------------------------------------
| Career & Jobs
|--------------------------------------------------------------------------
*/

Route::get('/career', [CareerController::class, 'index'])->name('career.index');

Route::post('/career/upload-resume', [CareerController::class, 'upload'])
    ->name('career.upload')
    ->middleware('throttle:10,1');

Route::get('/jobs', [FrontJobController::class, 'index'])->name('jobs.index');

Route::get('/jobs/{slug}', [FrontJobController::class, 'show'])
    ->name('jobs.show');

Route::post('/jobs/{job}/apply', [FrontJobController::class, 'apply'])
    ->name('jobs.apply')
    ->middleware('throttle:10,1');

/*
|--------------------------------------------------------------------------
| Contact
|--------------------------------------------------------------------------
*/

Route::get('/contact-us', [ContactController::class, 'index'])
    ->name('contact.index');

Route::post('/contact-us', [ContactController::class, 'submit'])
    ->name('contact.submit')
    ->middleware('throttle:10,1');

/*
|--------------------------------------------------------------------------
| ONE-TIME Storage Link Creator (Hostinger)
|--------------------------------------------------------------------------
| Visit /make-storage-link once, then DELETE this route
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Storage Link Fallback (Hostinger – No Symlink)
|--------------------------------------------------------------------------
| Copies storage/app/public → public/storage
| Visit ONCE, then REMOVE this route
|--------------------------------------------------------------------------
*/

Route::get('/make-storage-link', function () {

    $source = storage_path('app/public');
    $destination = public_path('storage');

    if (!is_dir($source)) {
        return 'Source directory does not exist.';
    }

    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $item) {
        $targetPath = $destination . DIRECTORY_SEPARATOR . $iterator->getSubPathName();

        if ($item->isDir()) {
            if (!is_dir($targetPath)) {
                mkdir($targetPath, 0755, true);
            }
        } else {
            copy($item, $targetPath);
        }
    }

    return 'Storage files copied successfully. You can now remove this route.';
});
