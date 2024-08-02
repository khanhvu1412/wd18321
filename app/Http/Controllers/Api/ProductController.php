<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProduct()
    {
        $listProduct = Product::select('id', 'name', 'product_price', 'image')->get();

        return response()->json([
            'data' => $listProduct,
            'status_code' => '200',
            'message' => 'success'
        ], 200);
    }

    public function getProduct($idProduct)
    {
        $getProduct = Product::select('name', 'product_price', 'image')
            ->find($idProduct);

        return response()->json([
            'data' => $getProduct,
            'status_code' => '200',
            'message' => 'success'
        ], 200);
    }

    public function addProduct(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'product_price' => 'required'
        ]);

        $data = [
            'name' => $req->name,
            'product_price' => $req->product_price
        ];

        $newProduct = Product::create($data);
        return response()->json([
            'data' => $newProduct,
            'status_code' => '200',
            'message' => 'success'
        ], 200);
    }

    public function updateProduct(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'product_price' => 'required'
        ]);

        $data = [
            'name' => $req->name,
            'product_price' => $req->product_price
        ];

        $product = Product::find($req->id);
        $product->update($data);
        return response()->json([
            'data' => $product,
            'status_code' => '200',
            'message' => 'success'
        ], 200);
    }

    public function deleteProduct(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'product_price' => 'required'
        ]);
        Product::find($req->id)->delete();
        return response()->json([
            'message' => 'success',
            'status_code' => '200',
        ], 200);
    }
}
