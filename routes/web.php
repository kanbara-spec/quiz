<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', [PostController::class, 'index'])->name('index')->middleware('auth');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/', [PostController::class, 'index']);

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/posts/mypage','mypage')->name('mypage');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/create2', 'create2')->name('create2');
    Route::get('/posts/create3', 'create3')->name('create3');
    Route::get('/posts/show', 'show')->name('show');
    Route::get('/posts/{post}', 'detail')->name('detail');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
    Route::post('/posts', 'store')->name('store');
    Route::delete('/posts/{post}/delete', 'delete')->name('delete');
});

Route::controller(Commentcontroller::class)->middleware(['auth'])->group(function(){
    Route::post('/{post}/comments', 'store')->name('store');
});

Route::controller(Answercontroller::class)->middleware(['auth'])->group(function(){
    Route::post('/{post}/answers', 'store')->name('store');
});


Route::group(['middleware'=>'auth'],function(){
    Route::group(['prefix'=>'posts/{id}'],function(){
       Route::post('like', [LikeController::class, 'store'])->name('likes.like');
       Route::delete('unlike', [LikeController::class, 'destroy'])->name('likes.unlike');
    });
});

Route::get('/sample', 'App\Http\Controllers\SampleController@showPage');
Route::get('/sample', [SampleController::class, 'showPage']);

require __DIR__.'/auth.php';
