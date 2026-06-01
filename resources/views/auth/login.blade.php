<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Login - Disnakertrans Kab. Banjar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0f172a;
            --accent: #3b82f6;
            --bg: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* Abstract Background Decor */
        body::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.08) 0%, transparent 70%);
            top: -200px;
            left: -200px;
            z-index: -1;
        }

        body::after {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(15, 23, 42, 0.05) 0%, transparent 70%);
            bottom: -200px;
            right: -200px;
            z-index: -1;
        }

        .login-wrapper {
            width: 100%;
            max-width: 440px;
            padding: 20px;
        }

        .login-card {
            background: white;
            padding: 48px;
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.05);
            border: 1px solid rgba(0,0,0,0.02);
            text-align: center;
        }

        .logo-box {
            width: 64px;
            height: 64px;
            background: var(--primary);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            margin: 0 auto 32px;
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.2);
        }

        .login-card h1 {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .login-card p {
            color: #64748b;
            font-size: 0.95rem;
            margin-bottom: 32px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            font-size: 0.85rem;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1rem;
        }

        .form-group input {
            width: 100%;
            padding: 14px 16px 14px 48px;
            border: 2px solid #f1f5f9;
            background: #f8fafc;
            border-radius: 12px;
            font-family: inherit;
            font-size: 1rem;
            transition: 0.3s;
            outline: none;
        }

        .form-group input:focus {
            background: white;
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 12px;
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.1);
        }

        .btn-login:hover {
            background: var(--accent);
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.2);
        }

        .error-box {
            background: #fff1f2;
            color: #be123c;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 24px;
            font-size: 0.85rem;
            font-weight: 600;
            border-left: 4px solid #fb7185;
            text-align: left;
        }

        .footer-links {
            margin-top: 32px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .footer-links a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 600;
            transition: 0.2s;
        }

        .footer-links a:hover {
            color: var(--accent);
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="logo-box">
                <i class="fas fa-shield-halved"></i>
            </div>
            <h1>Portal Admin</h1>
            <p>Silakan masuk ke akun Anda</p>

            @if ($errors->any())
                <div class="error-box">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Alamat Email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@banjarkab.go.id">
                    </div>
                </div>

                <div class="form-group">
                    <label>Kata Sandi</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" required placeholder="••••••••">
                    </div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                    <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; text-transform: none; font-size: 0.875rem; color: #64748b; font-weight: 500;">
                        <input type="checkbox" name="remember" style="width: auto;"> Ingat saya
                    </label>
                    <a href="#" style="font-size: 0.875rem; color: var(--accent); text-decoration: none; font-weight: 600;">Lupa sandi?</a>
                </div>

                <button type="submit" class="btn-login">Masuk Sekarang</button>
            </form>

            <div class="footer-links">
                <a href="/"><i class="fas fa-arrow-left"></i> Beranda</a>
                <a href="#">Bantuan</a>
            </div>
        </div>
    </div>
</body>
</html>
