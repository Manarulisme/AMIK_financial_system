<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Piutang;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PiutangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $piutangs = Piutang::orderBy('id', 'desc')->get();
        $kategoris =kategori::all();
        $i=0;
        return view('Pages.data_piutang.index', compact('piutangs', 'kategoris', 'i'));
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
            $bukti_pembayaran->storeAs('public/bukti_piutang', $bukti_pembayaran->hashName());

            Piutang::create([
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
            Piutang::create([
                'tanggal' => $request->tanggal,
                'name' => $request->name,
                'kepada' => $request->kepada,
                'nominal' => $fixnominal,
                'keterangan' => $request-> keterangan,
                'kategori_id' => $request->kategori_id,
                'keterangan' => $request->keterangan
            ]);
        }

        return redirect()->route('piutang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id): View
    {
        $piutang = Piutang::findOrFail($id);
        return view('Pages.data_piutang.show', compact('piutang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id): View
    {
        $kategoris = kategori::all();
        $piutang = Piutang::findOrFail($id);
        return view('Pages.data_piutang.edit', compact('piutang','kategoris'));
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

        $piutang = Piutang::findOrFail($id);

        $fixnominal = str_replace(".", "", $request->nominal);

        if ($request->hasFile('bukti_pembayaran')) {
            $bukti_piutang = $request->file('bukti_pembayaran');
            $bukti_piutang->storeAs('public/bukti_piutang', $bukti_piutang->hashName());

            Storage::delete('public/bukti_piutang'.$piutang->bukti_pembayaran);

            $piutang->update([
                'bukti_pembayaran' => $bukti_piutang->hashName(),
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
            $piutang->update([
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
        $hutang = Piutang::findOrfail($id);
        $hutang->delete();

        return redirect()->route('piutang.index')->with(['success' => 'Data Berhasil dihapus']);
    }
}
