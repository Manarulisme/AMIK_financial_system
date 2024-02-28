<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\pemasukan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $pemasukans = pemasukan::orderBy('id', 'desc')->get();
        $kategoris =kategori::all();
        $i=0;
        return view('Pages.data_transaksi.transaksi_masuk.index', compact('pemasukans', 'kategoris','i'));
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
        $this->validate($request,[
            'name' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
            'kategori_id' => 'required'
        ]);

        $fixnominal = str_replace(".", "", $request->nominal);

        if ($request->hasFile('bukti_pembayaran')) {
            $bukti_pembayaran = $request->file('bukti_pembayaran');
            $bukti_pembayaran->storeAs('public/bukti_pemasukan', $bukti_pembayaran->hashName());

            pemasukan::create([
                'bukti_pembayaran' => $bukti_pembayaran->hashName(),
                'tanggal' => $request->tanggal,
                'name' => $request->name,
                'nominal' => $fixnominal,
                'keterangan' => $request-> keterangan,
                'kategori_id' => $request->kategori_id,
                'keterangan' => $request->keterangan
            ]);

        }
        else{
            pemasukan::create([
                'tanggal' => $request->tanggal,
                'name' => $request->name,
                'nominal' => $fixnominal,
                'keterangan' => $request-> keterangan,
                'kategori_id' => $request->kategori_id,
                'keterangan' => $request->keterangan
            ]);
        }

        return redirect()->route('pemasukan.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $pemasukan = pemasukan::findOrFail($id);
        return view('Pages.data_transaksi.transaksi_masuk.show', compact('pemasukan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {   $kategoris = kategori::all();
        $pemasukan = pemasukan::findOrFail($id);
        return view('Pages.data_transaksi.transaksi_masuk.edit', compact('pemasukan','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request,[
            'name' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
            'kategori_id' => 'required'
        ]);

        $pemasukan = pemasukan::findOrFail($id);

        $fixnominal = str_replace(".", "", $request->nominal);

        if ($request->hasFile('bukti_pembayaran')) {
            $bukti_pembayaran = $request->file('bukti_pembayaran');
            $bukti_pembayaran->storeAs('public/bukti_pemasukan', $bukti_pembayaran->hashName());

            Storage::delete('public/bukti_pemasukan'.$pemasukan->bukti_pembayaran);

            $pemasukan->update([
                'bukti_pembayaran' => $bukti_pembayaran->hashName(),
                'tanggal' => $request->tanggal,
                'name' => $request->name,
                'nominal' => $fixnominal,
                'keterangan' => $request-> keterangan,
                'kategori_id' => $request->kategori_id,
                'keterangan' => $request->keterangan
            ]);

        }
        else{
            $pemasukan->update([
                'tanggal' => $request->tanggal,
                'name' => $request->name,
                'nominal' => $fixnominal,
                'keterangan' => $request-> keterangan,
                'kategori_id' => $request->kategori_id,
                'keterangan' => $request->keterangan
            ]);
        }

        return redirect()->route('pemasukan.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id):RedirectResponse
    {
        $pemasukan = pemasukan::findOrfail($id);
        $pemasukan->delete();

        return redirect()->route('pemasukan.index')->with(['success' => 'Data Berhasil dihapus']);
    }
}
