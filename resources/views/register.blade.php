@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                    <h4 class="text-center fw-semibold text-primary">{{ __('Register') }}</h4>
                </div>

                <div class="card-body px-4 py-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label small text-muted">{{ __('Nama') }}</label>
                            <input id="nama" type="text" class="form-control form-control-lg @error('nama') is-invalid @enderror" 
                                   name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required autofocus>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label small text-muted">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" placeholder="contoh@email.com" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label small text-muted">{{ __('Password') }}</label>
                            <input id="password" type="password" 
                                   class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                   name="password" placeholder="Minimal 8 karakter" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label small text-muted">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control form-control-lg" 
                                   name="password_confirmation" placeholder="Masukkan password kembali" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                {{ __('Daftar Sekarang') }}
                            </button>
                        </div>
                        
                        <div class="text-center mt-4">
                            <p class="text-muted small">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Masuk</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection