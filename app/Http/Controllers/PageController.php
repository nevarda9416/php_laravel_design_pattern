<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 6/22/2024
 * Time: 11:14 PM
 */

namespace App\Http\Controllers;

use App\Helpers\HttpHelper\Response;
use Jenssegers\Agent\Agent;

class PageController extends Controller
{
    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detail($slug)
    {
        $page = app(Response::class)->responseData('/pages/slug/' . $slug);
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('page/mobile/index', ['page' => $page['data']]);
        } else {
            return view('page/index', ['page' => $page['data']]);
        }
    }
}
