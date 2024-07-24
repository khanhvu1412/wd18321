<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function listProducts()
    {
        $product = Product::paginate(5);
            return view('admin.product.list-product')->with([
                'product' => $product
            ]);
        
    }
    public function addProduct()
    {
        return view('admin.product.add-product');
    }
    public function addPostProduct(Request $req)
    {
        $imageUrl = '';
        if ($req->hasFile('imageProduct')) {
            $image = $req->file('imageProduct');
            $nameImage = time() . "." . $image->getClientOriginalExtension();
            $link = "imageProduct/";
            $image->move(public_path($link), $nameImage);
            $imageUrl = $link . $nameImage;
        }
        $data = [
            'name' => $req->nameProduct,
            'product_price' => $req->priceProduct,
            'image' => $imageUrl
        ];
        Product::create($data);
        return redirect()->route('admin.products.listProducts')->with([
            'message' => 'Thêm mới thành công'
        ]);
    }

    public function deleteProduct(Request $req){
        $product = Product::find($req->idProduct);
        // dd($product); 
        if($product->image != null && $product->image != ''){
            File::delete(public_path($product->image));
        }
        
        $product->delete();
        return redirect()->route('admin.products.listProducts')->with([
            'message' => 'Xóa thành công'
        ]);
    }

    public function detailProduct($idProduct){
        $product = Product::where('id', $idProduct)->first();
        return view('admin.product.detail-product')->with([
            'product' => $product
        ]);
    }
    public function updateProduct($idProduct){
        $product = Product::where('id', $idProduct)->first();
        return view('admin.product.update-product')->with([
            'product' => $product
        ]);
    }

    public function updatePatchProduct($idProduct, Request $req){
        $product = Product::where('id', $idProduct)->first();
        $linkImage = $product->image;
        if($req->hasFile('imageProduct')){
            File::delete(public_path($product->image)); // Xóa file cũ đi
            $image = $req->file('imageProduct');
            $newName = time() .".". $image->getClientOriginalExtension();
            $linkStorage = 'imageProduct/';
            $image->move(public_path($linkStorage), $newName);

            $linkImage = $linkStorage . $newName;
        }
        $data = [
            'name' => $req->nameProduct,
            'product_price' => $req->priceProduct,
            'image' => $linkImage,
        ];
        Product::where('id',$idProduct) ->update($data);
        return redirect()->route('admin.products.listProducts')->with([
            'message' => 'Sửa thành công'
        ]);
    }
}