<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $i = 0;
        $kategoris = kategori::all();
        return view('Pages.kategori.index', compact('i','kategoris'));
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $kategori = kategori::create([
            'name' => $request->name,
            'subname' => $request->subname
        ]);

        return redirect()->route('kategori.index')->with(['success' => 'Anda berhasil menambahkan Kategori']);
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $kategori =kategori::findOrFail($id);

        return view('Pages.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $kategori = kategori::findOrfail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil dihapus']);
    }
}
