<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function list()  {
        $product= DB::table('product')->join('category','category.id','=','product.category_id')
        ->select('product.id','product.name','product.price','product.view','category.name as cate_name','product.create_at','product.update_at')->orderByDesc('product.view')->get();
        $category=DB::table('category')->get();
        return view('product/list')->with(['product'=>$product,'category'=>$category]);
    }
    function add()  {
        $category=DB::table('category')->get();
        return view('product/add')->with(['category'=>$category]);
    }
    function postProduct(Request $req) {
        $data=[
            'name'=>$req->name,
            'category_id'=>$req->category_id,
            'price'=>$req->price,
            'view'=>$req->view,
            'create_at'=>Carbon::now(),
        ];
        DB::table('product')->insert($data);
        return redirect()->route('product.list');
    }
    function deletePro($idPro)  {
        DB::table('product')->where('id',$idPro)->delete();
        return redirect()->route('product.list');
    }
    function updatePro($idPro)  {
        $product=DB::table('product')->find($idPro);
        $category=DB::table('category')->get();
        return view('product/update')->with(['category'=>$category,'product'=>$product]);
    }
    function updatePostPro($idPro, Request $req)  {
        $data=[
            'name'=>$req->name,
            'category_id'=>$req->category_id,
            'price'=>$req->price,
            'view'=>$req->view,
            'update_at'=>Carbon::now(),
        ];
        DB::table('product')->where('id',$idPro)->update($data);
        return redirect()->route('product.list');
    }
    function timkiem(Request $req) {
        $timkiem=$req->timkiem;
        $product=DB::table('product')->join('category','category.id','=','product.category_id')
        ->select('product.id','product.name','product.price','product.view','category.name as cate_name','product.create_at','product.update_at',)
        ->where('product.name','like','%'.$timkiem.'%')->get();
        // dd($product);
        return view('product/thongtinsanpham')->with(['product'=>$product]);
    }
}