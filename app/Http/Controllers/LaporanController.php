<?php

namespace App\Http\Controllers;

use App\Models\pemasukan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function Index(){
        return view('Pages.data_laporan.index');
    }

    public function cetakPemasukanPertanggal(Request $tanggalAwal, $tanggalAkhir){
        dd(["tanggal Awal : " .$tanggalAwal , "Tanggal Akhir : " .$tanggalAkhir]);
        // $print_pemasukans = pemasukan::all();
        // $pdf = Pdf::loadView('Pages.data_laporan.cetak_pemasukan' );
        // return $pdf->stream('Cetak Pemasukan.pdf');
    }
    // public function cekCetak(){
    //     $print_pemasukans = pemasukan::all();
    //     $pdf = Pdf::loadView('Pages.data_laporan.cetak_pemasukan', compact('print_pemasukans'))->setPaper('A4', 'landscape');
    //    return $pdf->stream('Cetak Pemasukan.pdf');
    // }
}
