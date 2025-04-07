<?php
namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Jobs\ItemCSVUploadJob;

class ItemController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        return view('item.index');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function upload(Request $request)
    {
        if ($request->has('csv')) {
            $csv = file($request->csv, FILE_SKIP_EMPTY_LINES);
            $chunks = array_chunk($csv, 1000);
            $header = [];
            if (!empty($chunks)) {
                foreach ($chunks as $key => $chunk) {
                    $data = array_map('str_getcsv', $chunk);
                    if ($key == 0) {
                        $header = $data[0];
                        unset($data[0]);
                    }
                    dispatch(new ItemCSVUploadJob($header, $data));
                }
            }
        }
        return 'Please upload CSV file';
    }
}
