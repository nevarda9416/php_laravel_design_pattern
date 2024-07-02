<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateTimeController extends Controller
{
    /**
     * @return mixed
     */
    private function add($a, $b, $c)
    {
        return $a - $b + $c;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operators = [2, 3];
        echo $this->add(1, ...$operators).'<br/>';
        // Format starting time
        $startTime = date('Y-m-d H:i:s');
        // Display the starting time
        echo 'Starting time: '.$startTime.'<br/>';
        // Add 1 hour to starting time
        $convertedTime = date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($startTime)));
        // Display the converted time
        echo 'Converted time (added 1 hour): '.$convertedTime.'<br/>';
        // Add 1 hour and 30 minutes to starting time
        $convertedTime = date('Y-m-d H:i:s', strtotime('+1 hour +30 minutes', strtotime($startTime)));
        // Display the converted time
        echo 'Converted time (added 1 hour & 30 minutes): '.$convertedTime.'<br/>';
        // Add 1 hour, 30 minutes and 45 seconds to time
        $convertedTime = date('Y-m-d H:i:s', strtotime('+1 hour +30 minutes +45 seconds', strtotime($startTime)));
        // Display the converted time
        echo 'Converted time (added 1 hour, 30 minutes & 45 seconds): '.$convertedTime.'<br/>';
        // Add 1 day, 1 hour, 30 minutes and 45 seconds to time
        $convertedTime = date('Y-m-d H:i:s', strtotime('+1 day +1 hour +30 minutes +45 seconds', strtotime($startTime)));
        // Display the converted time
        echo 'Converted time (added 1 day, 1 hour, 30 minutes & 45 seconds): '.$convertedTime.'<br/>';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
