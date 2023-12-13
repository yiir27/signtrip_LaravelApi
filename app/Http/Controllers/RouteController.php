<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoutePostRequest;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $route = Route::all();
        return response() -> json($route);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Route $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Route $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route $route)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Route $route)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        //
    }
}
