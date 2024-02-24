<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $i=0;
        return view('Pages.data_pengguna.index', compact('users','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $users = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'email' => $request->email,
            'password' =>Hash::make($request->password)
        ]);
        return redirect()->route('datapengguna.index')->with(['success' => 'Anda Berhasil Register']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $user = User::findOrFail($id);
        return view('Pages.data_pengguna.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $user = User::findOrFail($id);
        return view('Pages.data_pengguna.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $this->validate($request,[
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'email' => $request->email,
            'password' =>Hash::make($request->password)
        ]);

        return redirect()->route('datapengguna.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $users = User::findOrFail($id);

        $users->delete();

        return redirect()->route('datapengguna.index')->with(['success' => 'Data Berhasil disimpan']);
    }
}
