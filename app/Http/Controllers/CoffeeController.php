<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validated = request()->validate([
            'coffee' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
            'image' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->image->store('coffee', 'public');
        }

        Coffee::create($validated);

        return redirect('/create-coffee');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coffee $coffee)
    {
        $validated = $request->validate([
            'coffee' => 'nullable',
            'description' => 'nullable',
            'price' => 'nullable',
            'stock' => 'nullable',
            'image' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->image->store('coffee', 'public');
        }

        $coffee->update($validated);

        return redirect('/create-coffee');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
