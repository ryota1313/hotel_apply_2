<?php

namespace App\Http\Controllers;

use App\Models\Top;
use Illuminate\Http\Request;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('top.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Top $top)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Top $top)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Top $top)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Top $top)
    {
        //
    }
}
