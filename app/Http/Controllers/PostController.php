<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\TryCatch;

class PostController extends Controller
{
    //
    public function index(){
        return view('posts.index',["posts"=>$this->getPost(),
                             "categories"=>Category::all(),
                             "currentCategory"=>request('category')?Category::firstWhere('name',request('category')):null]);
    }

    public function view(Post $post){
        return view('posts.view',["post"=>$post,
                                  "comments"=>$post->comment]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){

        $credentials = request()->validate([
            'title'=>'required|min:3|max:255',
            'thumbnail'=>'required|image',
            'excerpt'=>'required|min:5|max:255',
            'body'=>'required|min:50',
            'category_id'=>['required',Rule::exists('categories','id')]
        ]);

        $credentials['user_id'] = auth()->id();
        $credentials['thumbnail'] = request('thumbnail')->store('thumbnails');

        try {
            $user = Post::create($credentials);

        } catch (\Throwable $th) {
            return back()->withInput(['title','body','excerpt','category'])->with('error','Unable to create.');
        }

        return redirect('/')->with('message','Post Created!');

    }

    public function getPost(){
        return Post::latest()->filter(request(['search','category','author']))->paginate(3);

    }
}
