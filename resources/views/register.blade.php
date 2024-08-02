<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Document</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h4 class="mt-5">Đăng ký</h4>
        @if (session('message'))
            <p class="text-danger">{{ session('message') }}</p>
        @endif
        <form action="{{ route('postRegister') }}" method="post">
            @csrf
            <div class="mb-3">
                Name:
                <input type="text" name="name" class="form-control">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                Email:
                <input type="email" name="email" class="form-control">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                Password:
                <input type="password" name="password" class="form-control">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-primary">Đăng ký</button>
        </form>

        <a href="{{ route('login') }}" class="btn btn-info mt-4">Đăng nhập</a>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>