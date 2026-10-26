<?php

namespace App\Http\Controllers;

use App\Models\BahanPangan;

class WeightedProductController extends Controller
{
    public function index()
    {
        $bahanPangans = BahanPangan::all();

        $hasilWP = [];
        $pesan = null;

        if ($bahanPangans->isEmpty()) {
            $pesan = 'Belum ada data bahan pangan. Tambahkan data terlebih dahulu.';
        } elseif ($bahanPangans->count() < 2) {
            $pesan = 'Tambahkan minimal dua bahan pangan untuk perbandingan.';
        } else {
            // Bobot kriteria
            $bobotHarga = 0.40;
            $bobotKebutuhan = 0.60;

            // Pastikan semua data valid untuk perhitungan WP
            foreach ($bahanPangans as $bahan) {
                if (
                    (float) $bahan->harga <= 0 ||
                    (float) $bahan->kebutuhan <= 0
                ) {
                    $pesan = 'Harga dan kebutuhan semua bahan yang dihitung harus lebih dari 0. Silakan edit data terlebih dahulu.';
                    break;
                }
            }

            if ($pesan === null) {
                $totalS = 0;

                foreach ($bahanPangans as $bahan) {
                    // Harga adalah cost, kebutuhan adalah benefit
                    $nilaiS = pow((float) $bahan->harga, -$bobotHarga)
                        * pow((float) $bahan->kebutuhan, $bobotKebutuhan);

                    $hasilWP[] = [
                        'id' => $bahan->id,
                        'nama_bahan' => $bahan->nama_bahan,
                        'kategori' => $bahan->kategori,
                        'satuan' => $bahan->satuan,
                        'harga' => (float) $bahan->harga,
                        'stok' => (float) $bahan->stok,
                        'kebutuhan' => (float) $bahan->kebutuhan,
                        's' => $nilaiS,
                    ];

                    $totalS += $nilaiS;
                }

                if ($totalS > 0) {
                    foreach ($hasilWP as &$hasil) {
                        $hasil['v'] = $hasil['s'] / $totalS;
                    }
                    unset($hasil);

                    // Urutkan dari nilai preferensi terbesar
                    usort($hasilWP, function ($a, $b) {
                        return $b['v'] <=> $a['v'];
                    });

                    foreach ($hasilWP as $index => &$hasil) {
                        $hasil['peringkat'] = $index + 1;
                    }
                    unset($hasil);
                } else {
                    $pesan = 'Perhitungan WP tidak dapat dilakukan pada data ini.';
                    $hasilWP = [];
                }
            }
        }

        return view('weighted-product.index', compact(
            'bahanPangans',
            'hasilWP',
            'pesan'
        ));
    }
}
