
<?php
 
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\PhotographController;
use App\Http\Controllers\admin\PhotographerController;
use App\Http\Controllers\admin\AdminController as AdminController;
use App\Http\Controllers\admin\UserController as UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebController;
use Laravel\Socialite\Facades\Socialite;
/*
|--------------------------------------------------------------------------
| Admin Routes
|-------------------------------------------------------------------------- 
*/ 
Route::get('/', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::middleware('auth:admin','prevent-back-history')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/photographs/{type?}', [PhotographController::class, 'index'])->name('admin.photographs');
    Route::get('/photographers/{photographer?}/{type?}', [PhotographerController::class, 'index'])->name('admin.photographers');
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});  