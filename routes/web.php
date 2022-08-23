<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
});

// Route::get('/adminHome', function () {
//     return view('adminHome');
// })->name('admin.home');

// Route::get('/userHome', function () {
//     return view('users.home');
// })->name('user.home');

Route::get('register', [AuthController::class, 'registerView'])->name('register');
Route::post('register', [AuthController::class, 'registerStore'])->name('register.store');

Route::get('login', [AuthController::class, 'loginView'])->name('login');
Route::post('login', [AuthController::class, 'loginStore'])->name('login.store');

Route::get('/logout', function () {
    Auth::logout();
    session()->flush();
    return redirect()->route('login');
})->name('logout');


//Admin Route
Route::group(['prefix' => 'admin','middleware' => ['is_admin']], function() {
    Route::get('dashboard',[AdminController::class,'adminHome'])->name('admin.home');
    Route::get('welcome', function () {
        return view('welcome');
    });
});

Route::group(['prefix' => 'user','middleware' => ['auth']], function() {
    Route::get('dashboard',[UserController::class,'userHome'])->name('user.home');

    Route::get('addPost',[PostController::class,'addPostView'])->name('user.addPostView');
    Route::post('addPost',[PostController::class,'addPost'])->name('user.addPost');

    Route::post('savecomment',[CommentController::class,'store'])->name('store.comment');
    Route::get('get-comments/{post_id}',[CommentController::class,'getComment'])->name('getComment');

    Route::post('like',[LikeController::class,'like'])->name('like');
    Route::get('get-user-like/{post_id}',[LikeController::class,'getUser'])->name('getUser');

    Route::get('postView',[PostController::class,'postView'])->name('user.postView');
    Route::get('postEdit/{id}',[PostController::class,'postEditView'])->name('user.postEditView');
    Route::post('postEdit',[PostController::class,'postUserUpdate'])->name('user.postUserUpdate');

    Route::get('delete-post/{id}',[PostController::class,'postUserDelete'])->name('postUserDelete');

    // Profile Update
    Route::get('profile-update',[UserController::class,'userProfileUpdate'])->name('user.profileUpdate');
    Route::post('profile-update',[UserController::class,'profileUpdate'])->name('user.updateProfile');

    //Change password
    Route::post('change-password',[UserController::class,'changePassword'])->name('user.changePassword');
});
