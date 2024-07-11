<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function listProducts()
    {
        $listProducts = DB::table('product')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->select('product.id', 'product.name', 'category.category_name', 'product.price', 'product.view')
            ->orderByDesc('view')
            ->get();
        return view('products/listProducts')->with([
            'listProducts' => $listProducts
        ]);
    }

    public function addProducts()
    {
        $category = DB::table('category')->select('id', 'category_name')->get();
        return view('products/addProducts')->with([
            'category' => $category
        ]);
    }

    public function addPostProducts(Request $req)
    {
        $data = [
            'name' => $req->nameProduct,
            'category_id' => $req->categoryProduct,
            'price' => $req->priceProduct,
            'view' => $req->viewProduct,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ];

        DB::table('product')->insert($data);

        return redirect()->route('products.listProducts');
    }

    public function deleteProducts($idPro)
    {
        DB::table('product')->where('id', $idPro)->delete();
        return redirect()->route('products.listProducts');
    }

    public function updateProducts($idPro)
    {
        $category = DB::table('category')->select('id', 'category_name')->get();
        $product = DB::table('product')->where('id', $idPro)->first();
        return view('products/updateProducts')->with([
            'product' => $product,
            'category' => $category
        ]);

    }

    public function updatePostProducts(Request $req)
    {
        $data = [
            'name' => $req->nameProduct,
            'category_id' => $req->categoryProduct,
            'price' => $req->priceProduct,
            'view' => $req->viewProduct,
            'update_at' => Carbon::now(),
        ];
        DB::table('product')->where('id', $req->idPro)->update( $data );

        return redirect()->route('products.listProducts');
    }

    

    public function searchProducts(){
        return view('products/searchProducts');
    }

    // public function searchGetProducts(Request $req){
    //     $query = $req->input('query');

    //     if ($query) {
    //         $products = DB::table('product')->where('name', 'like', "%{$query}%")->get();
    //     } else {
    //         $products = collect();
    //     }

    //     return view('product/searchProducts')->with([
    //         'products' => $products
    //     ]);
    // }

}
