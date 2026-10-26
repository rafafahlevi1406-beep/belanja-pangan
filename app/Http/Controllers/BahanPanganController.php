<?php

namespace App\Http\Controllers;

use App\Models\BahanPangan;
use Illuminate\Http\Request;

class BahanPanganController extends Controller
{
    public function index()
    {
        $bahanPangans = BahanPangan::latest()->get();

        return view('bahan-pangan.index', compact('bahanPangans'));
    }

    public function create()
    {
        return view('bahan-pangan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_bahan' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0.01',
            'stok' => 'required|numeric|min:0',
            'kebutuhan' => 'required|numeric|min:0',
        ]);

        BahanPangan::create($validated);

        return redirect()
            ->route('bahan-pangan.index')
            ->with('success', 'Data bahan pangan berhasil ditambahkan.');
    }

    public function edit(BahanPangan $bahanPangan)
    {
        return view('bahan-pangan.edit', compact('bahanPangan'));
    }

    public function update(Request $request, BahanPangan $bahanPangan)
    {
        $validated = $request->validate([
            'nama_bahan' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0.01',
            'stok' => 'required|numeric|min:0',
            'kebutuhan' => 'required|numeric|min:0',
        ]);

        $bahanPangan->update($validated);

        return redirect()
            ->route('bahan-pangan.index')
            ->with('success', 'Data bahan pangan berhasil diperbarui.');
    }

    public function destroy(BahanPangan $bahanPangan)
    {
        $bahanPangan->delete();

        return redirect()
            ->route('bahan-pangan.index')
            ->with('success', 'Data bahan pangan berhasil dihapus.');
    }

    public function dashboard()
    {
        $jumlahBahan = BahanPangan::count();

        $totalStok = BahanPangan::sum('stok');

        $totalNilaiStok = BahanPangan::selectRaw(
            'COALESCE(SUM(harga * stok), 0) as total'
        )->value('total');

        $bahanPangans = BahanPangan::latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'jumlahBahan',
            'totalStok',
            'totalNilaiStok',
            'bahanPangans'
        ));
    }
}
