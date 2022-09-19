<?php

namespace App\Http\Controllers\Error;

use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    /**
     * Display a custom 401 error view.
     *
     * @return \Illuminate\Http\Response
     */
    public function custom401(): \Illuminate\Http\Response
    {
        return response()->view('errors.401', [], 401);
    }

    /**
     * Display a custom 403 error view.
     *
     * @return \Illuminate\Http\Response
     */
    public function custom403(): \Illuminate\Http\Response
    {
        return response()->view('errors.403', [], 403);
    }

    /**
     * Display a custom 404 error view.
     *
     * @return \Illuminate\Http\Response
     */
    public function custom404(): \Illuminate\Http\Response
    {
        return response()->view('errors.404', [], 404);
    }

    /**
     * Display a custom 419 error view.
     *
     * @return \Illuminate\Http\Response
     */
    public function custom419(): \Illuminate\Http\Response
    {
        return response()->view('errors.419', [], 419);
    }

    /**
     * Display a custom 429 error view.
     *
     * @return \Illuminate\Http\Response
     */
    public function custom429(): \Illuminate\Http\Response
    {
        return response()->view('errors.429', [], 429);
    }

    /**
     * Display a custom 500 error view.
     *
     * @return \Illuminate\Http\Response
     */
    public function custom500(): \Illuminate\Http\Response
    {
        return response()->view('errors.500', [], 500);
    }

    /**
     * Display a custom 503 error view.
     *
     * @return \Illuminate\Http\Response
     */
    public function custom503(): \Illuminate\Http\Response
    {
        return response()->view('errors.503', [], 503);
    }
}
