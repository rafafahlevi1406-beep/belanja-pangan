<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Weighted Product</title>

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

        header {
            background: #14532d;
            color: white;
            padding: 25px 7%;
        }

        header h1 {
            margin: 0 0 8px;
            font-size: 26px;
        }

        header p {
            margin: 0;
            color: #dcfce7;
            line-height: 1.5;
        }

        main {
            width: 90%;
            max-width: 1250px;
            margin: 30px auto;
        }

        .menu {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 22px;
        }

        .btn {
            display: inline-block;
            padding: 11px 15px;
            border: 0;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-green {
            background: #15803d;
            color: white;
        }

        .btn-gray {
            background: #e2e8f0;
            color: #334155;
        }

        .card {
            background: white;
            padding: 22px;
            margin-bottom: 22px;
            border-radius: 12px;
            box-shadow: 0 4px 15px #00000008;
        }

        .card h2 {
            margin-top: 0;
            font-size: 20px;
        }

        .info {
            background: #eff6ff;
            color: #1e40af;
            padding: 14px;
            border-radius: 8px;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .alert {
            background: #fef3c7;
            color: #92400e;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 950px;
            border-collapse: collapse;
        }

        th {
            background: #f0fdf4;
            color: #166534;
            text-align: left;
        }

        th, td {
            padding: 13px 12px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
            white-space: nowrap;
        }

        .rank {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
        }

        .best {
            background: #f0fdf4;
        }

        .empty {
            text-align: center;
            padding: 25px;
            color: #64748b;
            line-height: 1.6;
        }

        .note {
            color: #475569;
            font-size: 14px;
            line-height: 1.7;
        }

        footer {
            text-align: center;
            padding: 25px;
            color: #64748b;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            main {
                width: 94%;
            }

            header {
                padding: 22px 5%;
            }

            header h1 {
                font-size: 22px;
            }

            .card {
                padding: 16px;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Perhitungan Weighted Product (WP)</h1>
    <p>Sistem Informasi Manajemen Belanja dan Pengendalian Biaya Bahan Pangan</p>
</header>

<main>
    <nav class="menu">
        <a href="{{ route('dashboard') }}" class="btn btn-gray">
            Dashboard
        </a>

        <a href="{{ route('bahan-pangan.index') }}" class="btn btn-gray">
            Data Bahan Pangan
        </a>

        <a href="{{ route('weighted-product.index') }}" class="btn btn-green">
            Hitung Ulang WP
        </a>
    </nav>

    <section class="card">
        <h2>Kriteria dan Bobot</h2>

        <div class="info">
            <strong>C1 — Harga (Cost):</strong>
            bobot 40%. Harga lebih rendah memperoleh penilaian lebih baik.<br>

            <strong>C2 — Kebutuhan Belanja (Benefit):</strong>
            bobot 60%. Kebutuhan lebih tinggi memperoleh penilaian lebih baik.<br>

            <strong>Vektor S:</strong>
            S = Harga<sup>-0,40</sup> × Kebutuhan<sup>0,60</sup><br>

            <strong>Nilai Preferensi:</strong>
            V = S / jumlah seluruh nilai S.
        </div>

        <p class="note">
            Bobot ini merupakan bobot awal untuk demonstrasi. Hasil peringkat
            menunjukkan prioritas berdasarkan harga dan kebutuhan yang dimasukkan,
            bukan secara otomatis menunjukkan bahan yang paling mendesak dibeli.
        </p>
    </section>

    @if ($pesan)
        <div class="alert">
            {{ $pesan }}
        </div>
    @endif

    <section class="card">
        <h2>Hasil Perangkingan Bahan Pangan</h2>

        @if (count($hasilWP) > 0)
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Peringkat</th>
                            <th>Nama Bahan</th>
                            <th>Kategori</th>
                            <th>Harga per Satuan</th>
                            <th>Stok Tersedia</th>
                            <th>Kebutuhan Belanja</th>
                            <th>Nilai S</th>
                            <th>Nilai V</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($hasilWP as $hasil)
                            <tr class="{{ $hasil['peringkat'] === 1 ? 'best' : '' }}">
                                <td>
                                    <span class="rank">
                                        {{ $hasil['peringkat'] }}
                                    </span>
                                </td>

                                <td>{{ $hasil['nama_bahan'] }}</td>
                                <td>{{ $hasil['kategori'] ?? '-' }}</td>

                                <td>
                                    Rp {{ number_format($hasil['harga'], 0, ',', '.') }}
                                </td>

                                <td>
                                    {{ number_format($hasil['stok'], 2, ',', '.') }}
                                    {{ $hasil['satuan'] }}
                                </td>

                                <td>
                                    {{ number_format($hasil['kebutuhan'], 2, ',', '.') }}
                                    {{ $hasil['satuan'] }}
                                </td>

                                <td>
                                    {{ number_format($hasil['s'], 6, ',', '.') }}
                                </td>

                                <td>
                                    {{ number_format($hasil['v'], 6, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="info" style="margin-top: 20px; margin-bottom: 0;">
                <strong>Kesimpulan:</strong>
                bahan pangan pada peringkat pertama memiliki nilai preferensi
                terbesar berdasarkan bobot dan data yang digunakan.
            </div>
        @else
            <p class="empty">
                Hasil perhitungan belum tersedia. Pastikan terdapat minimal dua
                data bahan pangan dan setiap data memiliki harga serta kebutuhan
                lebih dari nol. Periksa dan lengkapi data melalui menu Data Bahan Pangan.
            </p>
        @endif
    </section>
</main>

<footer>
    © {{ date('Y') }} Belanja Pangan
</footer>

</body>
</html>
