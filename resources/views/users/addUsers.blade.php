<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body class="container">
    <h3 class="text-center my-3">Thêm Users</h3>
    <form action="{{ route('users.addPostUsers') }}" method="post">
        @csrf
        <label for="">Tên</label>
        <input type="text" class="form-control my-2" name="nameUser">
        <label for="">Email</label>
        <input type="text" class="form-control my-2" name="emailUser">
        <label for="">Phòng ban</label>
        <select class="form-control my-2" name="phongbanUser">
            @foreach ($phongban as $value)
                <option value="{{$value->id}}">{{ $value->ten_donvi }}</option>
            @endforeach
        </select>
        <label for="">Tuổi</label>
        <input type="text" class="form-control my-2" name="tuoiUser">
        <button class="btn btn-success">Thêm mới</button>
    </form>
</body>

</html>