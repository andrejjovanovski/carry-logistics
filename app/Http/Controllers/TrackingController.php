<?php

namespace App\Http\Controllers;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tracking.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}
