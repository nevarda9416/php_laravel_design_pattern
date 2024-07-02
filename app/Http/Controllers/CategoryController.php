<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 3/27/2024
 * Time: 10:14 PM
 */

namespace App\Http\Controllers;

use App\Helpers\HttpHelper\Response;
use Jenssegers\Agent\Agent;

class CategoryController
{
    public function getProduct($slug)
    {
        $listProducts = app(Response::class)->responseData('/products/category/slug/'.$slug);
        $countProducts = count($listProducts['data']);
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('category/mobile/index', ['listProducts' => $listProducts['data'], 'countProducts' => $countProducts]);
        } else {
            return view('category/index', ['listProducts' => $listProducts['data'], 'countProducts' => $countProducts]);
        }
    }
}
