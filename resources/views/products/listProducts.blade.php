<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-3">
        <h3 class="text-center">Danh sách sản phẩm</h3>
            <a class="btn btn-success" href="{{ route('products.addProducts') }}">Thêm sản phẩm</a>
            <a class="btn btn-primary" href="{{ route('products.searchProducts') }}">Tìm kiếm</a>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>View</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listProducts as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->category_name}}</td>
                        <td>{{$value->price}}</td>
                        <td>{{$value->view}}</td>
                        <td>
                            <a href="{{ route('products.updateProducts', $value->id) }}" class="btn btn-warning">Sửa</a>
                            <a href="{{ route('products.deleteProducts', $value->id) }}"
                                onclick="return confirm('Bạn có muốn xóa không?')" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>