<?php

namespace App\Http\Controllers;

use App\Models\pemasukan;
use App\Models\pengeluaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemasukan_today = pemasukan::whereDate('tanggal', now())->orderBy('id', 'desc')->get();
        $pemasukan_current_month = pemasukan::select('*')->whereYear('tanggal', Carbon::now()->year)->whereMonth('tanggal', Carbon::now()->month)->get();
        $pemasukan_current_year = pemasukan::select('*')->whereYear('tanggal', Carbon::now()->year)->get();
        $pemasukan_semua = pemasukan::all();

        $pengeluaran_today = pengeluaran::whereDate('tanggal', now())->orderBy('id', 'desc')->get();
        $pengeluaran_current_month = pengeluaran::select('*')->whereYear('tanggal', Carbon::now()->year)->whereMonth('tanggal', Carbon::now()->month)->get();
        $pengeluaran_current_year = pengeluaran::select('*')->whereYear('tanggal', Carbon::now()->year)->get();
        $pengeluaran_semua = pengeluaran::all();

        return view('Pages.dashboard', compact('pemasukan_today', 'pemasukan_current_month', 'pemasukan_current_year', 'pemasukan_semua', 'pengeluaran_today', 'pengeluaran_current_month', 'pengeluaran_current_year', 'pengeluaran_semua'));
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
        //
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
