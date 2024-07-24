@extends('admin.layouts.default')
@push('styles')
    <style>
        .img-product{
            width: 200px;
            height: 200px;
            object-fit: cover;
        }
    </style>
@endpush
@section('content')
    <div class="container mt-4">
        <h3>Chỉnh sửa sản phẩm</h3>
        <form action="{{route('admin.products.updatePatchProduct' , $product->id )}}" enctype="multipart/form-data" 
            method="POST" class="m-3" style="min-height: 800px">
            @method('patch')
            @csrf
            <label for="nameProduct">Tên sản phẩm</label>
            <input type="text" class="form-control mt-2" name="nameProduct" id="nameProduct" placeholder="Tên sản phẩm" value="{{$product->name}}">
            <label for="price">Giá</label>
            <input type="text" class="form-control mt-2" id="priceProduct" name="priceProduct" placeholder="Giá sản phẩm" value="{{$product->product_price}}">
            <label for="image">Chọn ảnh</label>
            <br>
            <img src="{{ asset($product->image) }}" class="img-product" alt="">
            <input type="file" class="form-control mt-2" id='imageProduct' name="imageProduct" accept="image/*" >
            <button class="btn btn-primary mt-4" type="submit">Chỉnh sửa</button>
        </form>
    </div>
@endsection
@push('scripts')
    
@endpush