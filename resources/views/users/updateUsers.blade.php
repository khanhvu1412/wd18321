<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body class="container">
    <h3 class="text-center my-3">Chỉnh sửa Users</h3>
    <form action="{{route('users.updatePostUsers')}}" method="post">
        @csrf
        <input type="hidden" name="idUser" value=" {{$user->id}} ">
        <label for="name">Tên</label>
        <input type="text" class="form-control my-2" id="name" name="nameUser" value=" {{ $user->name }}">
        <label for="email">Email</label>
        <input type="text" class="form-control my-2" id="email" name="emailUser" value=" {{ $user->email }}">
        <label for="phongban">Phòng ban</label>
        <select class="form-control my-2" id="phongban" name="phongbanUser">
            @foreach ($phongban as $value)
                <option 
                    @if ($user->phongban_id === $value->id)
                        selected
                    @endif
                    value="{{$value->id}}">
                    {{ $value->ten_donvi }}
                </option>
            @endforeach
        </select>
        <label for="tuoi">Tuổi</label>
        <input type="text" class="form-control my-2" id="tuoi" name="tuoiUser" value=" {{ $user->tuoi }}">
        <label for="ngaynghi">Số ngày nghỉ</label>
        <input type="text" class="form-control my-2" id="ngaynghi" name="ngaynghiUser" value=" {{ $user->songaynghi }}">
        <button class="btn btn-warning mt-3">Chỉnh sửa</button>
    </form>
</body>

</html>