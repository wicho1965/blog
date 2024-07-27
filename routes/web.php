<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome to the homepage');
});

Route::get('/posts', function(){
    return "Aqui se mostraran todos los posts";
});

Route::get('/posts/create', function(){
    return "Aqui se mostrara un formulario para crear un post";
});


Route::get('/posts/{post}', function($post){
    return "Aqui se mostrara el post {$post}";
});


/* Route::get('/posts/{post}/{category?}', function($post, $category = null){
    if ($category) {
        return "Aqui se mostrara el post {$post} de la categoria {$category}";
}

return "Aqui se mostrara el post {$post}";
}); */



/* Route::get('/posts/{post}/{categoria}', function($post, $category){
    return "Aqui se mostrara el post {$post} de la categoria {$category}";
}); */




//Get
//Post
//Put
//Patch
//Delete


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
