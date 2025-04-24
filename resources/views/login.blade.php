<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <div class="register-link">
                    <a href="{{ route('register') }}">Belum punya akun? Register di sini!!</a>
                </div>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <i class="input-icon fas fa-envelope"></i>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Masukkan email Anda">
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <i class="input-icon fas fa-lock"></i>
                            <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password" 
                                    placeholder="Masukkan password Anda">
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>
                    
                    <div class="forgot-password">
                        <a href="#">Lupa password?</a>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>