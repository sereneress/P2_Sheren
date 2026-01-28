@extends('auth.auth')

@section('form')
<div class="row vh-100">
    <!-- Left Side: Form -->
    <div class="col-lg-5 d-flex align-items-center justify-content-center bg-light">
        <div class="card shadow-lg rounded-4 p-5 w-100" style="max-width: 420px; border: none;">
            <div class="text-center mb-5">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mb-3" style="height:60px;">
                <h2 class="fw-bold text-primary">Pemantapan 2</h2>
                <p class="text-muted">Sheren Alivia Shalsabila</p>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger rounded-3">{{ $errors->first() }}</div>
            @endif
            @if (session('loginError'))
            <div class="alert alert-danger rounded-3">{{ session('loginError') }}</div>
            @endif

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                <!-- Username -->
                <div class="mb-4">
                    <label for="username" class="form-label fw-semibold">Username</label>
                    <div class="input-group">
                        <input type="text" name="username" id="username"
                            class="form-control rounded-3"
                            placeholder="Masukkan username"
                            value="{{ old('username') }}">
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password"
                            class="form-control rounded-3"
                            placeholder="Masukkan password">
                    </div>
                </div>

                <!-- Remember me + Forgot password -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Ingat saya</label>
                    </div>
                    <a href="#" class="text-primary fw-semibold">Lupa password?</a>
                </div>

                <button type="submit"
                    class="btn btn-primary w-100 fw-bold rounded-3 py-2">
                    Login
                </button>
            </form>

            <div class="text-center mt-4">
                <p class="mb-0 text-muted">
                    Belum punya akun?
                    <a href="#" class="text-primary fw-bold">Daftar</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Right Side: Illustration / Info -->
    <div class="col-lg-7 d-none d-lg-flex align-items-center justify-content-center"
        style="background: linear-gradient(135deg, #1e3a8a 0%, #4f46e5 100%); position: relative; overflow: hidden;">
        <div class="text-center text-white p-5" style="max-width: 500px;">
            <h1 class="display-4 fw-bold mb-3" style="line-height: 1.2;">
                Selamat Datang di <span class="text-warning">Ujian Pemantapan 2</span>
            </h1>

            <p class="lead mb-4">
                Sistem pelaksanaan Ujian Pemantapan 2 untuk mengukur kesiapan dan
                pemahaman akademik peserta secara objektif, terstruktur, dan efisien.
            </p>

            <ul class="list-unstyled fs-5 text-start mb-4">
                <li class="mb-2">
                    <i class="bi bi-check-circle-fill me-2 text-warning"></i>
                    Soal terstandar dan terverifikasi
                </li>
                <li class="mb-2">
                    <i class="bi bi-check-circle-fill me-2 text-warning"></i>
                    Waktu ujian terkontrol otomatis
                </li>
                <li class="mb-2">
                    <i class="bi bi-check-circle-fill me-2 text-warning"></i>
                    Penilaian cepat dan transparan
                </li>
            </ul>

            <img src="{{ asset('images/exam-illustration.svg') }}" alt="Illustration"
                class="img-fluid mt-3" style="max-height: 300px;">
        </div>
    </div>
</div>
@endsection