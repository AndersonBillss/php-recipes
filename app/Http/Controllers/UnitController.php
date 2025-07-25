<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Inertia::render('Unit', [
            'user' => $request->user(),
            'units' => Unit::all()
        ]);
        return response()->json([
            'units' => Unit::all()

        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'name' => trim(strtolower($request->input('name')))
        ]);

        $validated = $request->validate([
            "name" => "required|string|max:255|unique:units",
            "abbreviation" => "required|string|max:255|unique:units"
        ]);

        Unit::create([
            'name' => $validated['name'],
            'abbreviation' => $validated['abbreviation'],
            'user_id' => $request->user()->id
        ]);

        return response(null, 204);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
