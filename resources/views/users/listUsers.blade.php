<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="container">
    <h3 class="text-center my-3">Danh sách users</h3>
    <a class="btn btn-success my-4" href="{{route('users.addUsers')}}">Thêm mới</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phòng ban</th>
                <th>Tuổi</th>
                <th>Số ngày nghỉ</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listUsers as $key => $value)
                <tr>
                    <td>{{ $key +1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->ten_donvi }}</td>
                    <td>{{ $value->tuoi }}</td>
                    <td>{{ $value->songaynghi }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('users.updateUsers', $value->id) }}" >Chỉnh sửa</a>
                        <a class="btn btn-danger"  href="{{ route('users.deleteUsers', $value->id) }}" 
                        onclick=" return confirm('Bạn có muốn xóa không')">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>