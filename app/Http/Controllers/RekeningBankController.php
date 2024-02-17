<?php

namespace App\Http\Controllers;

use App\Models\rekeningBank;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RekeningBankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekenings = rekeningBank::latest()->get();
        $i=0;
        return view('Pages.data_rekening.index', compact('rekenings','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pages.data_rekening.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'foto_rek'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'kode_bank'     => 'required',
            'nama_bank'     => 'required',
            'kcp'     => 'required',
            'nama_pemilik'     => 'required',
            'no_rek'     => 'required',
            'alamat'     => 'required'
        ]);

        // dd($request);
        //upload image
        $foto_rek = $request->file('foto_rek');
        $foto_rek->storeAs('public/fotoRekening', $foto_rek->hashName());

        //create post
        rekeningBank::create([
            'foto_rek'     => $foto_rek->hashName(),
            'kode_bank'     => $request->kode_bank,
            'nama_bank'     => $request->nama_bank,
            'kcp'     => $request->kcp,
            'nama_pemilik'     => $request->nama_pemilik,
            'no_rek'     => $request->no_rek,
            'alamat'     => $request->alamat
        ]);

        //redirect to index
        return redirect()->route('rekeningbank.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $rekening = rekeningBank::findOrFail($id);

        return view('Pages.data_rekening.show', compact('rekening'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $rekening = rekeningBank::findOrFail($id);
        return view('Pages.data_rekening.edit', compact('rekening'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request,[
            'foto_rek'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'kode_bank'     => 'required',
            'nama_bank'     => 'required',
            'kcp'     => 'required',
            'nama_pemilik'     => 'required',
            'no_rek'     => 'required',
            'alamat'     => 'required'
        ]);

        //get post by ID
        $rekening = rekeningBank::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('foto_rek')) {

            //upload new image
            $foto_rek = $request->file('foto_rek');
            $foto_rek->storeAs('public/fotoRekening', $foto_rek->hashName());

            //delete old image
            Storage::delete('public/fotoRekening/'.$rekening->foto_rek);

            //update post with new image
            $rekening->update([
                'foto_rek'     => $foto_rek->hashName(),
                'kode_bank'     => $request->kode_bank,
                'nama_bank'     => $request->nama_bank,
                'kcp'     => $request->kcp,
                'nama_pemilik'     => $request->nama_pemilik,
                'no_rek'     => $request->no_rek,
                'alamat'     => $request->alamat
            ]);

        } else {

            //update post without image
            $rekening->update([
                'kode_bank'     => $request->kode_bank,
                'nama_bank'     => $request->nama_bank,
                'kcp'     => $request->kcp,
                'nama_pemilik'     => $request->nama_pemilik,
                'no_rek'     => $request->no_rek,
                'alamat'     => $request->alamat
            ]);
        }

        //redirect to index
        return redirect()->route('rekeningbank.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) : RedirectResponse
    {
        $rekening = rekeningBank::findOrFail($id);

        Storage::delete('public/fotoRekening/'.$rekening->foto_rek);

        $rekening->delete();

        return redirect()->route('rekeningbank.index')->with(['success' => 'Data Berhasil dihapus']);
    }
}
