<?php

namespace App\Libraries\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class CategoryComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $categories = DB::table('categories')->get();
        $view->with('categories', $categories);
    }
}
