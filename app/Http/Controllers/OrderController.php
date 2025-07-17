<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
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
            'user_id' => ['required'],
            'table' => ['required'],
            'coffee_id' => ['required'],
            'coffee' => ['required'],
            'quantity' => ['required'],
            'price' => ['required'],
        ]);

        Order::create($validated);

        $coffeeId = $request->input('coffee_id'); // get the id from the input
        $coffee = Coffee::find($coffeeId); // getting the id from coffee table - ggs guys next commit

        $currentStock = Coffee::where('id', $coffeeId)->first();
        $quantity = $request->input('quantity');
        $newStock = (float)$currentStock->stock - (float)$quantity; // subtracting the quantity to the current stock 

        $coffee->update(['stock' => $newStock]); // updating the stock with the value of the new stock - nice game!

        return redirect('/display-coffee');
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
