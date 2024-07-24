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
    <div class="p-4" style="min-height: 800px;">
        <p>
            Tên sản phẩm: 
            <span class="font-weight-bold">{{ $product->name }}</span>
        </p>
        <p>
            Giá sản phẩm: 
            <span class="font-weight-bold">{{ $product->product_price }}</span>
        </p>
        <p>
            Ảnh sản phẩm: 
            <br>
            <img src="{{ asset($product->image) }}" alt="" class="img-product">
        </p>
        <a href="{{ route('admin.products.listProducts') }}" class="btn btn-info mt-3">Quay lại</a>
    </div>
@endsection

@push('scripts')
    
@endpush

