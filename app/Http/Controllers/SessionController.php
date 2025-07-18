<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use function Laravel\Prompts\table;

class SessionController extends Controller
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
    public function session_one(Request $request)
    {
        $validatedAttributes = request()->validate([
            'table' => ['required'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($validatedAttributes)) {
            throw ValidationException::withMessages([
                'table' => 'Sorry, those credentials do not match.'
            ]);
        }
        request()->session()->regenerate();

        return redirect('/display-coffee');
    }

     public function session_two(Request $request)
    {
        $validatedAttributes = request()->validate([
            'table' => ['required'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($validatedAttributes)) {
            throw ValidationException::withMessages([
                'table' => 'Sorry, those credentials do not match.'
            ]);
        }
        request()->session()->regenerate();

        return redirect('/display-coffee');
    }

      public function session_three(Request $request)
    {
        $validatedAttributes = request()->validate([
            'table' => ['required'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($validatedAttributes)) {
            throw ValidationException::withMessages([
                'table' => 'Sorry, those credentials do not match.'
            ]);
        }
        request()->session()->regenerate();

        return redirect('/display-coffee');
    }

      public function session_four(Request $request)
    {
        $validatedAttributes = request()->validate([
            'table' => ['required'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($validatedAttributes)) {
            throw ValidationException::withMessages([
                'table' => 'Sorry, those credentials do not match.'
            ]);
        }
        request()->session()->regenerate();

        return redirect('/display-coffee');
    }

      public function session_five(Request $request)
    {
        $validatedAttributes = request()->validate([
            'table' => ['required'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($validatedAttributes)) {
            throw ValidationException::withMessages([
                'table' => 'Sorry, those credentials do not match.'
            ]);
        }
        request()->session()->regenerate();

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
