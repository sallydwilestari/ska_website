 @extends('layouts.app')

@section('content')
<div class="login-wrapper">
    <div class="login-container">

        
<div class="login-brand">
    <div class="brand-logo">S</div>
    <h2>PT Solusi Koneksi Anda</h2>
    <p>Solusi Teknologi untuk<br>Masa Depan yang Lebih Baik</p>

    <div class="brand-illustration">
        <img
            src="{{ asset('images/logo-perusahaan.png') }}"
            alt="Gedung PT Solusi Koneksi Anda"
        >
    </div>
</div>


        <div class="login-form-section">
            <div class="login-form-content">
                <h1>Login Admin</h1>
                <p class="login-subtitle">
                    Silakan masuk untuk melanjutkan ke halaman admin.
                </p>

                @if ($errors->any())
                    <div class="login-error">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login.process') }}" method="POST">
                    @csrf

                    <div class="login-field">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email Anda"
                            required
                            autofocus
                        >
                    </div>

                    <div class="login-field">
                        <label for="password">Password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password Anda"
                            required
                        >
                    </div>

                    <button type="submit" class="login-button">
                        Login <span>&rarr;</span>
                    </button>
                </form>

                <p class="login-footer">
                    Halaman khusus administrator
                </p>
            </div>
        </div>

    </div>
</div>
@endsection