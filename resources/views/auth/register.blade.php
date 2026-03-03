<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sheren Alivia</title>

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>

    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center">
                <img class="logo-img" src="{{ asset('assets/images/logo.png') }}" alt="logo">
                <span class="splash-description">Please enter your user information.</span>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input class="form-control form-control-lg"
                            type="name"
                            name="name"
                            placeholder="name"
                            value="{{ old('name') }}"
                            required>

                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input class="form-control form-control-lg"
                            type="email"
                            name="email"
                            placeholder="Email"
                            value="{{ old('email') }}"
                            required>

                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input class="form-control form-control-lg"
                            type="password"
                            name="password"
                            placeholder="Password"
                            required>

                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input class="form-control form-control-lg"
                            type="password"
                            name="password_confirmation"
                            placeholder="Confirm Password"
                            required>

                        @error('password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input"
                                type="checkbox"
                                name="remember">

                            <span class="custom-control-label">
                                Remember Me
                            </span>
                        </label>
                    </div>

                    <button type="submit"
                        class="btn btn-primary btn-lg btn-block">
                        Sign in
                    </button>
                </form>

            </div>

            <div class="card-footer bg-white p-0">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{ route('register') }}" class="footer-link">
                        Create An Account
                    </a>
                </div>

                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#">
    Forgot Password
</a>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>

</body>
</html>
