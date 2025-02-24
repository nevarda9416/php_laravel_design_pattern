<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function fcmToken(Request $request): JsonResponse
    {
        try {
            if (Auth::user()->device_token == $request->get('token')) {
                return response()->json(['success' => true]);
            } else {
                Auth::user()->update(['device_token' => $request->get('token')]);
                return response()->json(['success' => true]);
            }
        } catch (Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        abort(404);
    }
}
