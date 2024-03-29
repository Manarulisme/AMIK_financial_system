<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\pengeluaran;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengeluarans = pengeluaran::orderBy('id', 'desc')->get();
        $kategoris =kategori::all();
        $i=0;
        return view('Pages.data_transaksi.transaksi_keluar.index', compact('pengeluarans', 'kategoris', 'i'));
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
            'nominal' => 'required',
            'tanggal' => 'required',
            'kategori_id' => 'required'
        ]);

        $fixnominal = str_replace(".", "", $request->nominal);

        if ($request->hasFile('bukti_pembayaran')) {
            $bukti_pembayaran = $request->file('bukti_pembayaran');
            $bukti_pembayaran->storeAs('public/bukti_pengeluaran', $bukti_pembayaran->hashName());

            pengeluaran::create([
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
            pengeluaran::create([
                'tanggal' => $request->tanggal,
                'name' => $request->name,
                'nominal' => $fixnominal,
                'keterangan' => $request-> keterangan,
                'kategori_id' => $request->kategori_id,
                'keterangan' => $request->keterangan
            ]);
        }

        return redirect()->route('pengeluaran.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $pengeluaran = pengeluaran::findOrFail($id);
        return view('Pages.data_transaksi.transaksi_keluar.show', compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $kategoris = kategori::all();
        $pengeluaran = pengeluaran::findOrFail($id);
        return view('Pages.data_transaksi.transaksi_keluar.edit', compact('pengeluaran','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id): RedirectResponse
    {
        $this->validate($request,[
            'name' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
            'kategori_id' => 'required'
        ]);

        $pengeluaran = pengeluaran::findOrFail($id);

        $fixnominal = str_replace(".", "", $request->nominal);

        if ($request->hasFile('bukti_pembayaran')) {
            $bukti_pembayaran = $request->file('bukti_pembayaran');
            $bukti_pembayaran->storeAs('public/bukti_pengeluaran', $bukti_pembayaran->hashName());

            Storage::delete('public/bukti_pengeluran'.$pengeluaran->bukti_pembayaran);

            $pengeluaran->update([
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
            $pengeluaran->update([
                'tanggal' => $request->tanggal,
                'name' => $request->name,
                'nominal' => $fixnominal,
                'keterangan' => $request-> keterangan,
                'kategori_id' => $request->kategori_id,
                'keterangan' => $request->keterangan
            ]);
        }

        return redirect()->route('pengeluaran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $pengeluaran = pengeluaran::findOrfail($id);
        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')->with(['success' => 'Data Berhasil dihapus']);
    }
}
