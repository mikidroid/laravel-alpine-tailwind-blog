<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [
        "id"
    ];

    protected $with = ['user','category'];

    protected $fillable = [
        "title","excerpt","body","category_id","user_id","thumnail"];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }


    //Filter methods
    public function scopeFilter($query,array $filters){

        $query->when($filters['search']??false,function($query,$search){
            $query
                    ->where('title','like','%'.$search.'%')
                    ->orWhere('body','like','%'.$search.'%');
        });

        $query->when($filters['category']??false,function($query,$category){
            $query->whereHas('category',fn($query)=>
                $query->where('name',$category)
        );
            /* This method resembles the SQL method, you can use it if you are closer to SQL
            $query
                    ->whereExists(fn($query)=>
                         $query->from('categories')
                        ->whereColumn('categories.id','posts.category_id')
                        ->where('categories.name',$category)
                    ); */
        });

       /* This also works
        if($filters['search']??false){
            $query
                    ->where('title','like','%'.request('search').'%')
                    ->orWhere('body','like','%'.request('search').'%');
        }*/



        //Another author search
        $query->when($filters['author']??false,function($query,$author){
            $query->whereHas('user',fn($query)=>
            $query->where('name',$author));
        });


    }
}
