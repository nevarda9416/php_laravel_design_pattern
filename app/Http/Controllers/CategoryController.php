<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 3/27/2024
 * Time: 10:14 PM
 */

namespace App\Http\Controllers;

use Jenssegers\Agent\Agent;
use App\Helpers\HttpHelper\Response;


class CategoryController
{
    public function getProduct($slug)
    {
        $listProducts = app(Response::class)->responseData('/api/products/category/slug/' . $slug);
        $countProducts = count($listProducts['data']);
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('category/mobile/index', ['listProducts' => $listProducts['data'], 'countProducts' => $countProducts]);
        } else {
            return view('category/index', ['listProducts' => $listProducts['data'], 'countProducts' => $countProducts]);
        }
    }
}
