<?php

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
use App\Models\Image;
Route::get('/', function () {
    /*
    $images = Image::all();
    foreach($images as $image){
        echo $image->image_path."<br/>";
        echo $image->description."<br/>";
        echo $image->user->name.' '. $image->user->surname;
        
        echo '<h4>Comentarios</h4>';
        foreach($image->comments as $comment){
            echo $comment->user->name.' '.$comment->user->surname.': ';
            echo $comment->content.'<br/>';
        }
        
        echo 'LIKES: '.count($image->likes);
        echo "<hr/>";
    }
    die();*/
    return view('auth.register');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/configuracion', [App\Http\Controllers\UserController::class, 'config'])->name('config');

Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::get('/users/avatar/{filename}', [App\Http\Controllers\UserController::class, 'getImage'])->name('user.avatar');

//Route::get('/configuracion', 'UserController@config')->name('config'); con esta ruta te comes un buen mojon

Route::get('/subir-imagen', [App\Http\Controllers\ImageController::class, 'create'])->name('image.create');

Route::post('/image/save', [App\Http\Controllers\ImageController::class, 'save'])->name('image.save');

