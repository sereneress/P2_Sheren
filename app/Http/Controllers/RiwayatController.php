<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = DB::table('t_riwayat')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('Riwayat.riwayat', compact('riwayat'));
    }

    // ambil detail untuk popup (AJAX)
    public function detail($kode_pasien)
    {
        $detail = DB::table('t_detail')
            ->where('kode_pasien', $kode_pasien)
            ->first();

        return response()->json($detail);
    }
}