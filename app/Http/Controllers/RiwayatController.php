<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class RiwayatController extends Controller
{
    public function index()
    {
        $user = auth()->user();
    
        if ($user->is_admin === 1) {
            $riwayats = Riwayat::paginate(10);
        } else {
            $riwayats = Riwayat::where('created_by', $user->username)
                ->paginate(10);
        }
    
        return view('riwayat', ['riwayats' => $riwayats]);
    }
    
    public function pinjam()
    {
        return view('peminjaman');
    }    

    public function pinjamScan(Request $request)
    {
        $user = auth()->user();
    
        $barang = Assets::where('kode', $request->kode)->first();
        if (!$barang || $barang->status !== 'Tersedia') {
            return redirect('/peminjaman')->with('gagal', 'Barang tidak ditemukan atau tidak tersedia');
        }
    
        $cek = Riwayat::where([
            'kode' => $request->kode,
            'status' => $barang->status
        ])->first();
    
        if ($cek) {
            return redirect('/peminjaman')->with('gagal', 'Barang Gagal Dipinjam');
        }
    
        Riwayat::create([
            'kode' => $request->kode,
            'nama' => $barang->nama,
            'created_by' => $user->username,
            'created_at' => Carbon::now(),
            'updated_at' => null, 
            'status' => 'Sedang Dipakai'

        ]);
        
        $barang->update(['status' => 'Sedang Dipinjam']);
    
        return redirect('/peminjaman')->with('sukses', 'Barang Berhasil Dipinjam');
    }

    public function kembali()
    {
        return view('pengembalian');
    }

    public function kembaliScan(Request $request)
    {
        $user = auth()->user();
    
        $barang = Assets::where('kode', $request->kode)->first();
    
        $riwayat = Riwayat::where('kode', $request->kode)->latest()->first();
    
        if (!$riwayat) {
            return redirect('/pengembalian')->with('gagal', 'Barang tidak ditemukan');
        }
    
        if ($riwayat->status !== 'Sedang Dipakai') {
            return redirect('/pengembalian')->with('gagal', 'Barang tidak tersedia untuk dikembalikan');
        }
    
        // Check if the current user is the one who created the history entry
        if ($riwayat->created_by !== $user->username) {
            return redirect('/pengembalian')->with('gagal', 'Anda tidak memiliki izin untuk mengembalikan barang ini');
        }
    
        $riwayat->update([
            'status' => 'selesai',
            'updated_at' => now(),
            'created_by' => $user->username,
        ]);
    
        $barang->update(['status' => 'Tersedia']);
    
        return redirect('/pengembalian')->with('sukses', 'Barang Berhasil Dikembalikan');
    }
    
}
