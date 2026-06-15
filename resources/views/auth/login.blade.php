<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - Alfamart Co-Profile</title>
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-container {
            width: 100%;
            max-width: 850px;
            padding: 20px;
        }
        .login-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            overflow: hidden;
            background: #ffffff;
            display: flex;
            flex-wrap: wrap;
        }
        .brand-section {
            background: linear-gradient(135deg, #dc3545, #b21f2d); /* Merah Alfamart Gradasi */
            color: #ffffff;
            padding: 50px 40px;
            flex: 1 1 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 320px;
        }
        .form-section {
            padding: 50px 40px;
            flex: 1 1 50%;
            background: #ffffff;
        }
        .brand-section h2 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }
        .brand-section p {
            font-size: 14px;
            color: rgba(255,255,255,0.8);
            margin: 0;
        }
        .form-section h4 {
            font-size: 24px;
            color: #212529;
            margin-bottom: 25px;
        }
        /* Style input agar tetap cantik & modern */
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .form-control {
            display: block;
            width: 100%;
            padding: 12px 16px;
            font-size: 15px;
            color: #212529;
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 8px;
            transition: all 0.2s ease-in-out;
            box-sizing: border-box;
            margin-bottom: 5px;
        }
        .form-control:focus {
            border-color: #dc3545;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.15);
        }
        /* Style Tombol Merah Khas Alfamart */
        .btn-alfamart {
            display: block;
            width: 100%;
            padding: 14px;
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
            background-color: #dc3545;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            text-align: center;
            box-sizing: border-box;
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
        }
        .btn-alfamart:hover {
            background-color: #b21f2d;
        }
        /* Style Notifikasi */
        .alert {
            padding: 12px 16px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-size: 14px;
        }
        .alert-danger {
            color: #842029;
            background-color: #f8d7da;
            border-color: #f5c2c7;
        }
        .alert-success {
            color: #0f5132;
            background-color: #d1e7dd;
            border-color: #badbcc;
        }
        .mb-3 { margin-bottom: 20px; }
        .mb-4 { margin-bottom: 25px; }
        .invalid-feedback {
            color: #dc3545;
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-card">
        <div class="brand-section">
            <h2>Alfamart</h2>
            <p>Halaman Administrator</p>
        </div>
        
        <div class="form-section">
            <h4>Silakan Login</h4>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->has('login_error'))
                <div class="alert alert-danger">
                    {{ $errors->first('login_error') }}
                </div>
            @endif

            <form action="{{ route('login.proses') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="admin@gmail.com" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-alfamart">Masuk Ke Sistem</button>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>