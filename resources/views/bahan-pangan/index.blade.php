<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bahan Pangan</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f1f5f9;
            color: #1e293b;
        }

        .navbar {
            background: #14532d;
            color: white;
            padding: 24px 7%;
        }

        .navbar h1 {
            font-size: 26px;
            margin-bottom: 8px;
        }

        .navbar p {
            color: #dcfce7;
            font-size: 14px;
        }

        .container {
            width: 86%;
            max-width: 1200px;
            margin: 35px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .header h2 {
            margin-bottom: 8px;
        }

        .header p {
            color: #64748b;
            font-size: 14px;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 7px;
            padding: 11px 15px;
            text-decoration: none;
            font-weight: bold;
            font-size: 13px;
            cursor: pointer;
        }

        .btn-primary {
            background: #15803d;
            color: white;
        }

        .btn-dashboard {
            background: #e2e8f0;
            color: #334155;
        }

        .btn-logout {
            background: #fee2e2;
            color: #b91c1c;
        }

        .btn-edit {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .btn-delete {
            background: #fee2e2;
            color: #b91c1c;
        }

        .alert {
            background: #dcfce7;
            color: #166534;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .table-card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .05);
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 750px;
            border-collapse: collapse;
        }

        th {
            background: #f0fdf4;
            color: #166534;
            text-align: left;
            padding: 14px 12px;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
        }

        .badge {
            background: #dcfce7;
            color: #166534;
            padding: 5px 9px;
            border-radius: 20px;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #64748b;
        }

        .footer {
            text-align: center;
            padding: 25px;
            color: #64748b;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .container {
                width: 94%;
            }

            .navbar {
                padding: 20px 4%;
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

        <div class="header">
            <div>
                <h2>Data Bahan Pangan</h2>
                <p>Kelola nama bahan, kategori, harga, dan stok pangan.</p>
            </div>

            <div class="menu">
                <a href="{{ route('dashboard') }}"
                   class="btn btn-dashboard">
                    Dashboard
                </a>

                <a href="{{ route('bahan-pangan.create') }}"
                   class="btn btn-primary">
                    + Tambah Bahan
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-logout">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Bahan</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($bahanPangans as $bahan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bahan->nama_bahan }}</td>
                            <td>{{ $bahan->kategori ?? '-' }}</td>
                            <td>{{ $bahan->satuan }}</td>
                            <td>
                                Rp {{ number_format($bahan->harga, 0, ',', '.') }}
                            </td>
                            <td>
                                <span class="badge">
                                    {{ number_format($bahan->stok, 2, ',', '.') }}
                                    {{ $bahan->satuan }}
                                </span>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('bahan-pangan.edit', $bahan->id) }}"
                                       class="btn btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('bahan-pangan.destroy', $bahan->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty">
                                Belum ada data bahan pangan.<br><br>
                                Silakan tambahkan data bahan pangan pertama kamu.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        © {{ date('Y') }} Belanja Pangan
    </div>

</body>
</html>
