<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Services\Newsletter;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;

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

Route::get('/',[PostController::class,'index'])->name('home');
Route::get('/register',[RegisterController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);

//$post by default is the Id from the route attached to the Model class
//The semicolon is important when you want to reference another variable as the default instance for example {post:email} for instancing a model using its unique email
Route::get('/post/{post:id}', [PostController::class,'view']);

Route::post('/post/{post:id}/comment', [CommentController::class,'store'])->middleware('auth');

//Author blog route
Route::get('/{user:name}/posts', function(User $user){
    return view('user-posts',[
       "posts"=>$user->post->load(['category'])]);
});


//User session route
Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');
Route::get('/login',[SessionController::class,'create'])->middleware('guest');
Route::post('/login',[SessionController::class,'store'])->middleware('guest');


//mailchimp test
Route::post('/newsletter',NewsletterController::class);

//ADMIN
Route::get('/admin/post/create', [PostController::class,'create'])->middleware('admin');
Route::post('/admin/post', [PostController::class,'store'])->middleware('admin');


Route::get('/check', function(User $user){
    if(request()->user()->can('admin')){

    }
});
