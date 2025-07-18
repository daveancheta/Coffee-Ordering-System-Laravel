<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Order;
use App\Models\OrderDone;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QueueOrder extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.queue-order');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $coffeeOrders = Order::latest()
            ->where('status', NULL)
            ->get();

        foreach ($coffeeOrders as $order) {
            $order->price = $order->price * $order->quantity;
            $order->image = asset('storage/' . $order->image);
            $order->time_ago = Carbon::parse($order->created_at)->diffForHumans();
        }
        return response()->json($coffeeOrders);
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

    public function submit(Request $request)
    {
        $validated = request()->validate([
            'order_id' => ['required'],
            'user_id' => ['required'],
            'table' => ['required'],
            'coffee_id' => ['required'],
            'coffee' => ['required'],
            'quantity' => ['required'],
            'price' => ['required'],
            'status' => ['required'],
        ]);

        OrderDone::create($validated);

        $coffeeId = $request->input('order_id');
        // $coffee = Order::where('id', $coffeeId)->first(); get by specific column
        $coffee = Order::find($coffeeId);
        $coffee->update(['status' => 'done']);

        return response()->json(['message' => 'Order marked as done']);
    }

    public function updatenotif(Request $request)
    {
        request()->validate([
            'user_id' => ['required'],
        ]);

        $userId = $request->input('user_id');
        OrderDone::where('user_id', $userId)->update(['status' => 'draft']); // Change all the status of the user

    }
}
