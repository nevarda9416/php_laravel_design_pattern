<?php

namespace App\Libraries\ViewComposers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view)
    {
        $categories = DB::table('categories')->get();
        $view->with('categories', $categories);
    }
}
