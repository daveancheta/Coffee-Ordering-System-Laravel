<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\OrderDone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetController extends Controller
{
    public function coffee()
    {

        $coffee = Coffee::all();

        return view('admin.create-coffee', compact('coffee'));
    }

    public function display_coffee()
    {

        $coffee = Coffee::all();

        return view('display-coffee', compact('coffee'));
    }



    public function coffeeDone()
    {

        $userId = Auth::id();
        $coffeeDone = OrderDone::latest()
            ->where('user_id', $userId)
            ->get();

        foreach ($coffeeDone as $item) {
            $item->time_ago = Carbon::parse($item->created_at)->diffForHumans();

            $item->price = $item->quantity * $item->price;
        }

        return response()->json($coffeeDone);
    }

    public function notifCount()
    {
        $userId = Auth::id();

        $coffeeDoneCount = OrderDone::where('user_id', $userId)
            ->where('status', 'done')
            ->get()
            ->count();

        return response()->json(['count' => $coffeeDoneCount]);
    }
}
