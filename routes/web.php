<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GroupNameController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupUserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventUserController;
use App\Http\Controllers\UserManagmentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ErrorsController;

Route::view('/', 'home')->middleware('auth')->name('home');//ruta que muestra la pagina principal


// Restablecimiento de contraseña
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('/password', 'showFormSendCode')->name('forgot-password');
    Route::get('/password/reset/{token}', 'showResetForm')->name('password.reset');
    Route::post('/password/send-passwod-code', 'sendPasswordCode')->name('password.send-password-code');
    Route::post('/password/reset-password', 'reset')->name('password.update');
});
// Ventana que muestra los errores comunes
Route::get('/error', [ErrorsController::class, 'showWindowError'])->name('window.error');

// Rutas de registro y login
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/process-register', [RegisterController::class, 'processRegister'])->name('process-register');
Route::get('/email-verification', [RegisterController::class, 'emailVerification'])->name('email-verification');
Route::post('/check-email-verification', [RegisterController::class, 'checkEmailVerification'])->name('check-email-verification');
Route::post('/send-verification-code', [RegisterController::class, 'sendVerificationCode'])->name('send-verification-code');
Route::post('/signup', [RegisterController::class, 'register'])->name('signup');

// Login y Logout
Route::view('/login', 'auth/login')->name('login');
Route::post('/signin', [LoginController::class, 'login'])->name('signin');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

//cambiarla por / la ruta y que el auth ya no mande a login sino a auth
Route::view('/home', 'home')->middleware('auth')->name('home');//ruta que muestra la pagina principal

Route::view('/app', 'layouts/app');//eliminar luego
Route::view('/auth', 'auth/authentication')->name('auth');//ruta que muestra la vista del login

/* Route::view('/login', 'auth/login')->name('login');//ruta que muestra la vista del login ya no se ocupa
Route::view('/register', 'auth/register')->name('register');//ruta que muestra la vista del register ya no se ocupa

Route::post('/signin',[LoginController::class,'login'] )->name('signin');//ruta que inicia sesion al usr 
Route::post('/signup',[RegisterController::class,'register'] )->name('signup');//ruta que registra al usr
Route::get('/logout',[LogoutController::class,'logout'] )->name('logout');//ruta que cierra sesion al usr
 */
Route::view('/profile', 'profile/show')->name('profile');
Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::Get('/profile/destroy', [ProfileController::class,'destroy'])->name('profile.destroy');

Route::view('/map', 'maps/maps');

Route::resource('major', MajorController::class);
Route::resource('category', CategoryController::class);
Route::resource('group_name', GroupNameController::class);
Route::resource('period', PeriodController::class);
Route::resource('extracurricular', ExtracurricularController::class);
Route::resource('event_type', EventTypeController::class);
Route::resource('role', RoleController::class);
Route::resource('group', GroupController::class);

Route::resource('group-user', GroupUserController::class);

Route::resource('event', EventController::class);

Route::resource('event-user', EventUserController::class);

Route::resource('user-managment', UserManagmentController::class);

