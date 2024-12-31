<?php

namespace App\Http\Controllers;

use App\Charts\AsetChart;
use App\Http\Controllers\Controller;
use App\Models\Assets;
use App\Models\Riwayat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;


class DashboardController extends Controller
{
    public function index(AsetChart $chart)
    {
        $borrowingsPerWeek = $this->getBorrowingsPerWeek();
        $data = [
            'chart' => $chart->build($borrowingsPerWeek),
            'totalUsers' => User::count(),
            'totalAsets' => Assets::count(),
            'totalRiwayatsA' => Riwayat::count(),
            'totalRiwayats' => Riwayat::where('created_by', auth()->id())->count(),
        ];
    
        return view('dashboard', $data);
    }
    
    private function getBorrowingsPerWeek()
    {
        // Dapatkan bulan dan tahun saat ini
        $currentMonth = now()->format('m');
        $currentYear = now()->format('Y');

        $weekLabels = ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'];
        $totalBorrowings = [0, 0, 0, 0];
        $totalReturns = [0, 0, 0, 0];
    
        // Loop melalui setiap minggu dan hitung total peminjaman
        foreach ($weekLabels as $weekIndex => $weekLabel) {
            // Tentukan rentang tanggal untuk setiap minggu
            $startDay = ($weekIndex * 7) + 1; // Awal minggu
            $endDay = min(($weekIndex + 1) * 7, now()->endOfMonth()->day); // Akhir minggu
    
            $startDate = now()->setDate($currentYear, $currentMonth, $startDay)->startOfDay();
            $endDate = now()->setDate($currentYear, $currentMonth, $endDay)->endOfDay();
    
            // Query model 'Riwayat' untuk menghitung jumlah peminjaman dalam minggu ini
            $totalBorrowings[$weekIndex] = Riwayat::whereBetween('created_at', [$startDate, $endDate])
            ->count();
            $totalReturns[$weekIndex] = Riwayat::whereBetween('updated_at', [$startDate, $endDate])
            ->count();
        }
    
        return [
            'weekLabels' => $weekLabels,
            'totalBorrowings' => $totalBorrowings,
            'totalReturns' => $totalReturns,
        ];
    }
    
}
