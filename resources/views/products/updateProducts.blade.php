<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-3">
        <h3 class="text-center">Thêm sản phẩm</h3>
        <form action="{{route('products.updatePostProducts')}}" method="post">
            @csrf
            <input type="hidden" name="idPro" value="{{$product->id}}">
            <label for="nameProduct">Tên sản phẩm</label>
            <input type="text" class="form-control mt-2" name="nameProduct" value="{{ $product->name }}">
            <label for="categoryProduct">Danh mục sản phẩm</label>
            <select name="categoryProduct" class="form-control mt-2">
                @foreach ($category as $value)
                    <option 
                        @if ($product->category_id === $value->id) 
                            selected
                        @endif
                        value="{{$value->id}}">{{$value->category_name}}</option>
                @endforeach
            </select>
            <label for="priceProduct">Giá sản phẩm</label>
            <input type="text" class="form-control mt-2" name="priceProduct" value="{{ $product->price }}">
            <label for="viewProduct">View sản phẩm</label>
            <input type="text" class="form-control mt-2" name="viewProduct" value="{{ $product->view }}">
            <button class="btn btn-success mt-3">Cập nhật</button>
        </form>
    </div>
    
</body>
</html>