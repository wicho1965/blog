<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;


Route::get('/', HomeController::class);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}', [PostController::class, 'show']);


/*Route::get('/posts/{post}', function($post){
   return "Aqui se mostrara el post {$post}";
}); */

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
