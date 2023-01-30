<?php

use App\Http\Controllers\CertificateAssetController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CertificateUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Models\Certificate;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/certificate/upsert/{certificate?}', [CertificateController::class, 'show'])->middleware(['auth', 'verified'])->name('certificate.upsert');
Route::get('/certificate/{certificate}/builder', [CertificateController::class, 'showBuilder'])->middleware(['auth', 'verified'])->name('certificate.builder');
Route::get('/certificate/{certificate}/preview/{user?}', [CertificateController::class, 'showPreview'])->middleware(['auth', 'verified'])->name('certificate.preview');
Route::get('/certificate/{certificate}/assets', [CertificateAssetController::class, 'show'])->middleware(['auth', 'verified'])->name('certificate.assets');



Route::middleware('auth')->group(function () {
    Route::get('/certificate/{certificate}/users', [CertificateUserController::class, 'show'])->middleware(['auth', 'verified'])->name('certificate.users');
    Route::post('/certificate/{certificate}/users/addcsv', [CertificateUserController::class, 'store'])->name('certificate.users.addcsv');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/certificate/upsert/{certificate?}', [CertificateController::class, 'upsert'])->name('certificate.upsert');
    Route::post('/certificate/{certificate}/builder/', [CertificateController::class, 'builderUpdate'])->name('certificate.builder.update');
    Route::post('/certificate/{certificate}/asset/add', [CertificateAssetController::class, 'store'])->name('certificate.asset.add');
    Route::delete('/certificate/asset/{asset}/delete', [CertificateAssetController::class, 'delete'])->name('certificate.asset.delete');
});

require __DIR__ . '/auth.php';
