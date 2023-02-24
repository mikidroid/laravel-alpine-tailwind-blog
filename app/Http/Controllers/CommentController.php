<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function store(Post $post){
        request()->validate([
            'body'=>'required|min:3'
        ]);
        $credentials = [
            'user_id'=>auth()->id(),
            'body'=>request('body')
        ];
        $create = $post->comment()->create($credentials);
        if(!$create){
            return back()->with('error','Unable to add comment!');
        }

        return back()->with('message','Comment added!');
    }
}
