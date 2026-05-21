<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Protected | Under Construction</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #1a222b 0%, #12181f 100%);
            --accent-color: #f39c12;
            --text-color: #ffffff;
            --input-bg: rgba(255, 255, 255, 0.05);
            --card-glass: rgba(255, 255, 255, 0.03);
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--primary-gradient);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
            color: var(--text-color);
        }

        .background-blob {
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(243, 156, 18, 0.07) 0%, rgba(243, 156, 18, 0) 70%);
            border-radius: 50%;
            z-index: -1;
            filter: blur(50px);
        }

        .blob-1 { top: -100px; left: -100px; }
        .blob-2 { bottom: -100px; right: -100px; }

        .login-card {
            background: var(--card-glass);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 50px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-section h1 {
            font-weight: 700;
            letter-spacing: -1px;
            margin-bottom: 8px;
            font-size: 2.5rem;
        }

        .logo-section span {
            color: var(--accent-color);
        }

        .logo-section p {
            opacity: 0.6;
            font-size: 0.95rem;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.7;
            margin-bottom: 10px;
            display: block;
        }

        .input-group {
            background: var(--input-bg);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            transition: all 0.3s;
            margin-bottom: 25px;
        }

        .input-group:focus-within {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 4px rgba(243, 156, 18, 0.1);
        }

        .input-group-text {
            background: transparent;
            border: none;
            color: var(--accent-color);
            padding-left: 20px;
        }

        .form-control {
            background: transparent;
            border: none;
            color: #fff;
            padding: 15px 15px 15px 10px;
            font-size: 1rem;
        }

        .form-control:focus {
            background: transparent;
            box-shadow: none;
            color: #fff;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        .btn-primary {
            background: var(--accent-color);
            border: none;
            border-radius: 12px;
            padding: 15px;
            font-weight: 700;
            width: 100%;
            margin-top: 10px;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary:hover {
            background: #e67e22;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(243, 156, 18, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .alert-danger {
            background: rgba(231, 76, 60, 0.1);
            border: 1px solid rgba(231, 76, 60, 0.2);
            color: #ff7675;
            border-radius: 12px;
            font-size: 0.9rem;
            margin-bottom: 25px;
        }

        .footer-note {
            text-align: center;
            margin-top: 30px;
            font-size: 0.8rem;
            opacity: 0.4;
        }
    </style>
</head>
<body>
    <div class="background-blob blob-1"></div>
    <div class="background-blob blob-2"></div>

    <div class="login-card">
        <div class="logo-section">
            <h1>Enroll<span>zy</span></h1>
            <p>Our website is coming soon. Please enter access details to preview.</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle me-2"></i> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('site.protection.login.submit') }}" method="POST">
            @csrf
            <div>
                <label class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Enter username" required autocomplete="off">
                </div>
            </div>

            <div>
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                </div>
            </div>

            <button type="submit" class="btn-primary">Verify Access</button>
        </form>

        <div class="footer-note">
            &copy; {{ date('Y') }} Enrollzy. All rights reserved.
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
