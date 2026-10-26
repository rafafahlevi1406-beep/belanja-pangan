<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Belanja Pangan</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            padding: 20px;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px #00000040;
        }

        h1 {
            text-align: center;
            color: #203a43;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #666;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 7px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: normal;
            font-size: 14px;
            margin-bottom: 20px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #203a43;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #2c5364;
        }

        .error {
            color: #b91c1c;
            background: #fee2e2;
            padding: 10px;
            border-radius: 7px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .success {
            color: #166534;
            background: #dcfce7;
            padding: 10px;
            border-radius: 7px;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h1>🛒 Belanja Pangan</h1>

        <p class="subtitle">
            Sistem Informasi Manajemen Belanja dan
            Pengendalian Biaya Bahan Pangan
        </p>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <label for="email">Email Admin</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Masukkan email admin"
                value="{{ old('email') }}"
                required
            >

            <label for="password">Kata Sandi</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Masukkan kata sandi"
                required
            >

            <label class="remember">
                <input type="checkbox" name="remember" value="1">
                Ingat saya
            </label>

            <button type="submit">Masuk ke Sistem</button>
        </form>
    </div>
</body>
</html>
