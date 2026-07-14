<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In — Learner</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #2f6feb 0%, #4d8dfd 100%);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        .auth-card {
            width: 100%;
            max-width: 400px;
            background: #fff;
            border-radius: 16px;
            padding: 40px 36px;
            box-shadow: 0 20px 50px rgba(0,0,0,.25);
        }
        .auth-logo {
            font-weight: 700;
            font-size: 1.6rem;
            color: #1c2b4a;
            text-align: center;
            display: block;
            margin-bottom: 6px;
            text-decoration: none;
        }
        .auth-logo span { color: #2f6feb; }
        .auth-sub {
            text-align: center;
            color: #7a8699;
            margin-bottom: 28px;
            font-size: .9rem;
        }
        .btn-primary {
            background: #2f6feb;
            border: none;
            padding: 10px;
            font-weight: 600;
        }
        .btn-primary:hover { background: #1e5bd6; }
        .auth-footer {
            text-align: center;
            margin-top: 20px;
            font-size: .9rem;
        }
        .auth-footer a { color: #2f6feb; text-decoration: none; font-weight: 600; }
    </style>
</head>

<body>
    <div class="auth-card">
        <a href="{{ route('home.page') }}" class="auth-logo">Learner<span>.</span></a>
        <p class="auth-sub">Admin panelga kirish</p>

        @if ($errors->any())
            <div class="alert alert-danger py-2">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.chek') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Parol</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Kirish</button>
        </form>

        <p class="auth-footer">Akkountingiz yo'qmi? <a href="{{ route('register.page') }}">Ro'yxatdan o'ting</a></p>
    </div>
</body>

</html>
