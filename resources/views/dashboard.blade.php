<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Belanja Pangan</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        header {
            background: #166534;
            color: white;
            padding: 25px 30px;
        }

        .header-content {
            max-width: 1100px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        header h1 {
            margin: 0 0 8px;
        }

        header p {
            margin: 0;
            color: #dcfce7;
            line-height: 1.5;
        }

        .logout-button {
            background: white;
            color: #166534;
            border: none;
            padding: 12px 22px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        .logout-button:hover {
            background: #dcfce7;
        }

        main {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .menu {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .menu a {
            display: inline-block;
            background: #15803d;
            color: white;
            text-decoration: none;
            padding: 12px 16px;
            border-radius: 8px;
        }

        .menu a:hover {
            background: #166534;
        }

        .menu .wp-button {
            background: #1d4ed8;
        }

        .menu .wp-button:hover {
            background: #1e40af;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 18px;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #0000000a;
        }

        .card p {
            color: #64748b;
            margin: 0 0 12px;
        }

        .card h2 {
            color: #166534;
            margin: 0;
            overflow-wrap: anywhere;
        }

        .table-box {
            margin-top: 28px;
            padding: 22px;
            background: white;
            border-radius: 12px;
            overflow-x: auto;
        }

        .table-box h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #f8fafc;
        }

        @media (max-width: 600px) {
            header {
                padding: 20px;
            }

            main {
                padding: 0 12px;
            }

            .header-content {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="header-content">
        <div>
            <h1>Dashboard Belanja Pangan</h1>
            <p>
                Sistem Informasi Manajemen Belanja dan
                Pengendalian Biaya Bahan Pangan
            </p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">
                Logout
            </button>
        </form>
    </div>
</header>

<main>
    <nav class="menu">
        <a href="{{ route('bahan-pangan.index') }}">
            Kelola Bahan Pangan
        </a>

        <a href="{{ route('bahan-pangan.create') }}">
            + Tambah Bahan
        </a>

        <a href="{{ route('weighted-product.index') }}"
           class="wp-button">
            Perhitungan WP
        </a>
    </nav>

    <section class="cards">
        <div class="card">
            <p>Jumlah Jenis Bahan</p>
            <h2>{{ $jumlahBahan }} jenis</h2>
        </div>

        <div class="card">
            <p>Total Stok</p>
            <h2>{{ number_format((float) $totalStok, 2, ',', '.') }}</h2>
        </div>

        <div class="card">
            <p>Estimasi Nilai Stok</p>
            <h2>
                Rp {{ number_format((float) $totalNilaiStok, 0, ',', '.') }}
            </h2>
        </div>
    </section>

    <section class="table-box">
        <h2>5 Bahan Pangan Terbaru</h2>

        @if ($bahanPangans->isEmpty())
            <p>
                Belum ada data bahan pangan.
                Silakan tambahkan data terlebih dahulu.
            </p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Bahan</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($bahanPangans as $bahan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bahan->nama_bahan }}</td>
                            <td>{{ $bahan->kategori ?? '-' }}</td>
                            <td>
                                Rp {{ number_format((float) $bahan->harga, 0, ',', '.') }}
                            </td>
                            <td>
                                {{ number_format((float) $bahan->stok, 2, ',', '.') }}
                                {{ $bahan->satuan }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </section>
</main>

</body>
</html>
