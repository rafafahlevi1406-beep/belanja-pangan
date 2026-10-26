<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Bahan Pangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 4px 15px #00000012;
        }

        h1 { color: #166534; }

        label {
            display: block;
            margin-top: 16px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            box-sizing: border-box;
            padding: 11px;
            margin-top: 7px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
        }

        button, .back {
            display: inline-block;
            margin-top: 22px;
            padding: 11px 16px;
            border: none;
            border-radius: 7px;
            background: #15803d;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .back { background: #64748b; }
        .error { color: #dc2626; }

        .info {
            background: #f0fdf4;
            border-left: 4px solid #16a34a;
            padding: 12px;
            border-radius: 5px;
            color: #166534;
            font-size: 14px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Tambah Bahan Pangan</h1>
    <p>Masukkan data bahan pangan yang ingin dicatat.</p>

    <div class="info">
        <strong>Petunjuk:</strong> Isi kebutuhan dengan jumlah bahan
        pangan yang diperlukan. Contoh: stok 5 kg dan kebutuhan 10 kg.
        Data ini akan digunakan untuk membantu menentukan prioritas belanja.
    </div>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bahan-pangan.store') }}" method="POST">
        @csrf

        <label>Nama Bahan Pangan</label>
        <input type="text" name="nama_bahan"
               value="{{ old('nama_bahan') }}" required>

        <label>Kategori</label>
        <select name="kategori">
            <option value="">Pilih kategori</option>
            @foreach (['Beras', 'Sayuran', 'Buah-buahan', 'Daging', 'Ikan', 'Bumbu', 'Lainnya'] as $kategori)
                <option value="{{ $kategori }}"
                    {{ old('kategori') == $kategori ? 'selected' : '' }}>
                    {{ $kategori }}
                </option>
            @endforeach
        </select>

        <label>Satuan</label>
        <select name="satuan" required>
            @foreach (['kg', 'gram', 'liter', 'ml', 'ikat', 'buah', 'butir', 'bungkus', 'karung'] as $satuan)
                <option value="{{ $satuan }}"
                    {{ old('satuan', 'kg') == $satuan ? 'selected' : '' }}>
                    {{ $satuan }}
                </option>
            @endforeach
        </select>

        <label>Harga per Satuan (Rp)</label>
        <input type="number" name="harga"
               min="0.01" step="0.01"
               value="{{ old('harga') }}" required>

        <label>Stok Tersedia</label>
        <input type="number" name="stok"
               min="0" step="0.01"
               value="{{ old('stok', 0) }}" required>

        <label>Kebutuhan Belanja</label>
        <input type="number" name="kebutuhan"
               min="0" step="0.01"
               value="{{ old('kebutuhan', 0) }}" required>

        <button type="submit">Simpan Data</button>
        <a href="{{ route('bahan-pangan.index') }}" class="back">Kembali</a>
    </form>
</div>
</body>
</html>
