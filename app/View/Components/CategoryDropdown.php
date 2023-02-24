<?php

namespace App\View\Components;

use Closure;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CategoryDropdown extends Component
{

    public function render(): View|Closure|string
    {
        return view('components.category-dropdown',
                    [
                        "categories"=>Category::all(),
                        "currentCategory"=>request('category')?Category::firstWhere('name',request('category')):null
                    ]
         );
    }
}
