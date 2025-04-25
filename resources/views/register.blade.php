<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset("css/register.css")}}">
</head>
<body>
    <div class="container">
        <div class="row-center">
            <div class="column">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Register</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama</label>
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" 
                                       name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required autofocus>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control" 
                                       name="email" value="" placeholder="contoh@email.com" required>
                                <div class="invalid-feedback" style="display: none;"></div>
                            </div>

                            <div class="blue-divider"></div>

                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" 
                                       class="form-control" 
                                       name="password" placeholder="Minimal 8 karakter" required>
                                <div class="invalid-feedback" style="display: none;"></div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="form-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" 
                                       name="password_confirmation" placeholder="Masukkan password kembali" required>
                            </div>

                            <button type="submit" class="btn">
                                Daftar Sekarang
                            </button>
                            
                            <div class="text-center mt-4">
                                <p class="text-muted text-small">Sudah punya akun? <a href="login" class="text-link">Masuk</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>