<?php

namespace App\Http\Controllers;

use App\Models\Hutang;
use App\Models\kategori;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HutangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hutangs = Hutang::orderBy('id', 'desc')->get();
        $kategoris =kategori::all();
        $i=0;
        return view('Pages.data_hutang.index', compact('hutangs', 'kategoris', 'i'));
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
        $this->validate($request,[
            'name' => 'required',
            'kepada' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
            'kategori_id' => 'required'
        ]);

        $fixnominal = str_replace(".", "", $request->nominal);

        if ($request->hasFile('bukti_pembayaran')) {
            $bukti_pembayaran = $request->file('bukti_pembayaran');
            $bukti_pembayaran->storeAs('public/bukti_hutang', $bukti_pembayaran->hashName());

            Hutang::create([
                'bukti_pembayaran' => $bukti_pembayaran->hashName(),
                'tanggal' => $request->tanggal,
                'name' => $request->name,
                'kepada' => $request->kepada,
                'nominal' => $fixnominal,
                'keterangan' => $request-> keterangan,
                'kategori_id' => $request->kategori_id,
                'keterangan' => $request->keterangan
            ]);

        }
        else{
            Hutang::create([
                'tanggal' => $request->tanggal,
                'name' => $request->name,
                'kepada' => $request->kepada,
                'nominal' => $fixnominal,
                'keterangan' => $request-> keterangan,
                'kategori_id' => $request->kategori_id,
                'keterangan' => $request->keterangan
            ]);
        }

        return redirect()->route('hutang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $hutang = Hutang::findOrFail($id);
        return view('Pages.data_hutang.show', compact('hutang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id): View
    {
        $kategoris = kategori::all();
        $hutang = Hutang::findOrFail($id);
        return view('Pages.data_hutang.edit', compact('hutang','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request,[
            'name' => 'required',
            'kepada' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
            'kategori_id' => 'required'
        ]);

        $hutang = Hutang::findOrFail($id);

        $fixnominal = str_replace(".", "", $request->nominal);

        if ($request->hasFile('bukti_pembayaran')) {
            $bukti_pembayaran = $request->file('bukti_pembayaran');
            $bukti_pembayaran->storeAs('public/bukti_hutang', $bukti_pembayaran->hashName());

            Storage::delete('public/bukti_hutang'.$hutang->bukti_pembayaran);

            $hutang->update([
                'bukti_pembayaran' => $bukti_pembayaran->hashName(),
                'tanggal' => $request->tanggal,
                'name' => $request->name,
                'kepada' => $request->kepada,
                'nominal' => $fixnominal,
                'keterangan' => $request-> keterangan,
                'kategori_id' => $request->kategori_id,
                'keterangan' => $request->keterangan
            ]);

        }
        else{
            $hutang->update([
                'tanggal' => $request->tanggal,
                'name' => $request->name,
                'kepada' => $request->kepada,
                'nominal' => $fixnominal,
                'keterangan' => $request-> keterangan,
                'kategori_id' => $request->kategori_id,
                'keterangan' => $request->keterangan
            ]);
        }

        return redirect()->route('hutang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $hutang = Hutang::findOrfail($id);
        $hutang->delete();

        return redirect()->route('hutang.index')->with(['success' => 'Data Berhasil dihapus']);
    }
}
