<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bahan Pangan | Belanja Pangan</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f3f6fb;
            color: #1e293b;
        }

        .navbar {
            background: #14532d;
            color: white;
            padding: 22px 7%;
        }

        .navbar h1 {
            font-size: 24px;
            margin-bottom: 6px;
        }

        .navbar p {
            font-size: 14px;
            color: #dcfce7;
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
            font-size: 25px;
            margin-bottom: 8px;
        }

        .header p {
            color: #64748b;
            font-size: 14px;
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 8px;
            padding: 11px 16px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-primary {
            background: #15803d;
            color: white;
        }

        .btn-primary:hover {
            background: #166534;
        }

        .alert {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .table-card {
            background: white;
            border-radius: 12px;
            padding: 22px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            background: #f0fdf4;
            color: #166534;
            text-align: left;
            padding: 14px 12px;
            font-size: 13px;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .badge {
            background: #dcfce7;
            color: #166534;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 12px;
        }

        .actions {
            display: flex;
            gap: 7px;
        }

        .btn-edit {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .btn-delete {
            background: #fee2e2;
            color: #b91c1c;
        }

        .empty {
            text-align: center;
            color: #64748b;
            padding: 35px;
        }

        .footer {
            text-align: center;
            padding: 25px;
            color: #64748b;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .container {
                width: 92%;
            }

            .navbar {
                padding: 20px 4%;
            }

            .header h2 {
                font-size: 21px;
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
                <p>Kelola daftar bahan pangan, harga, kategori, dan stok.</p>
            </div>

            <a href="{{ route('bahan-pangan.create') }}"
               class="btn btn-primary">
                + Tambah Bahan
            </a>
        </div>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert" style="background:#fee2e2;color:#991b1b;border-color:#fca5a5;">
                <ul style="padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
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
                            <td><strong>{{ $bahan->nama_bahan }}</strong></td>
                            <td>{{ $bahan->kategori ?? '-' }}</td>
                            <td>{{ $bahan->satuan }}</td>
                            <td>Rp {{ number_format($bahan->harga, 0, ',', '.') }}</td>
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
                                          onsubmit="return confirm('Yakin ingin menghapus bahan ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty">
                                Belum ada data bahan pangan.<br>
                                Klik tombol Tambah Bahan untuk memulai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        © {{ date('Y') }} Belanja Pangan — Sistem Pengendalian Biaya Bahan Pangan
    </div>

</body>
</html>
