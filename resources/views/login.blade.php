<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Login - CMS Web App</title>
</head>

<body>

    <main>
        <div class="container">
            <div class="row vh-100">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="login-content">
                        <header class="fw-bold fs-5 mb-4">SIMS Web App</header>
                        <h1 class="text-center fs-4 fw-bold mb-5 w-75">Masuk atau buat akun untuk mulai</h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <div class="row">
                                    <div class="alert alert-danger" role="alert">
                                        Login menggunakan akun:
                                        <div>Email: admin@gmail.com</div>
                                        <div>Password: admin123</div>
                                      </div>
                                    @if (session('failed'))
                                        <div class="alert alert-danger mt-3">
                                            {{ session('failed') }}
                                        </div>
                                    @endif
                                    <div class="col-md-12 mb-4">
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Masukan email anda">
                                        @error('email')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Masukan password anda">
                                        @error('password')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-danger w-100">Masuk</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/Frame 98699.png') }}" alt="Login" class="login-image">
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://kit.fontawesome.com/bcb13ae1ad.js" crossorigin="anonymous"></script>
</body>

</html>
