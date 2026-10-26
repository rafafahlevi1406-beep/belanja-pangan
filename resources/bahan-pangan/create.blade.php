<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Bahan Pangan</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f1f5f9;
            color: #1e293b;
        }

        .navbar {
            background: #14532d;
            color: white;
            padding: 24px 7%;
        }

        .navbar h1 {
            margin: 0 0 8px;
        }

        .navbar p {
            margin: 0;
            color: #dcfce7;
            font-size: 14px;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 35px auto;
        }

        .card {
            background: white;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .05);
        }

        h2 {
            margin-top: 0;
            margin-bottom: 8px;
        }

        .description {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font-size: 14px;
            background: white;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #15803d;
            box-shadow: 0 0 0 2px #dcfce7;
        }

        .error {
            color: #b91c1c;
            font-size: 13px;
            margin-top: 6px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 18px;
            border: none;
            border-radius: 7px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-save {
            background: #15803d;
            color: white;
        }

        .btn-back {
            background: #e2e8f0;
            color: #334155;
        }

        .footer {
            text-align: center;
            padding: 25px;
            color: #64748b;
            font-size: 13px;
        }

        @media (max-width: 500px) {
            .card {
                padding: 20px;
            }

            .navbar {
                padding: 20px 5%;
            }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h1>Belanja Pangan</h1>
        <p>Sistem Manajemen Belanja dan Pengendalian Biaya Bahan Pangan</p>
    </div>

    <div class="container">
        <div class="card">
            <h2>Tambah Bahan Pangan</h2>
            <p class="description">
                Masukkan informasi bahan pangan pada formulir berikut.
            </p>

            <form action="{{ route('bahan-pangan.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama_bahan">Nama Bahan Pangan *</label>
                    <input
                        type="text"
                        id="nama_bahan"
                        name="nama_bahan"
                        value="{{ old('nama_bahan') }}"
                        placeholder="Contoh: Beras"
                        required
                    >
                    @error('nama_bahan')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select id="kategori" name="kategori">
                        <option value="">Pilih kategori</option>
                        @foreach (['Beras dan Biji-bijian', 'Sayuran', 'Buah-buahan', 'Daging dan Ikan', 'Bumbu Dapur', 'Minyak dan Bahan Pokok', 'Lainnya'] as $kategori)
                            <option value="{{ $kategori }}"
                                {{ old('kategori') == $kategori ? 'selected' : '' }}>
                                {{ $kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="satuan">Satuan *</label>
                    <select id="satuan" name="satuan" required>
                        <option value="">Pilih satuan</option>
                        @foreach (['kg', 'gram', 'liter', 'ml', 'ikat', 'buah', 'butir', 'bungkus', 'karung', 'pack'] as $satuan)
                            <option value="{{ $satuan }}"
                                {{ old('satuan') == $satuan ? 'selected' : '' }}>
                                {{ $satuan }}
                            </option>
                        @endforeach
                    </select>
                    @error('satuan')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga">Harga per Satuan (Rp) *</label>
                    <input
                        type="number"
                        id="harga"
                        name="harga"
                        value="{{ old('harga') }}"
                        min="0"
                        step="0.01"
                        placeholder="Contoh: 15000"
                        required
                    >
                    @error('harga')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stok">Stok Awal *</label>
                    <input
                        type="number"
                        id="stok"
                        name="stok"
                        value="{{ old('stok', 0) }}"
                        min="0"
                        step="0.01"
                        placeholder="Contoh: 10"
                        required
                    >
                    @error('stok')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="buttons">
                    <button type="submit" class="btn btn-save">
                        Simpan Bahan
                    </button>

                    <a href="{{ route('bahan-pangan.index') }}"
                       class="btn btn-back">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        © {{ date('Y') }} Belanja Pangan
    </div>

</body>
</html>
