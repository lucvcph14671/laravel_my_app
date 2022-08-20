<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Color;
use App\Models\Comment;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends CartController
{
    public function email(Request $request)
    {
        // dd($request);
        Mail::send('client.contact.contact',[
            'name' => $request->name,
            'msg' => $request->msg,
        ],
        function($mail) use($request){
            $mail->subject('Liên hệ từ khách hàng');
            $mail->to('3winacc5@gmail.com', $request->name);
        });
        return back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Trang chủ
        return view('client.products.homeProduct', [
            'categories' => CategoryProduct::orderBy('created_at', 'desc')->limit(3)->get(),
            'categoriesAll' => CategoryProduct::all(),
            'products' => Product::paginate(8),
        ]);
    }

    public function product()
    {
        // Trang sản phẩm
        return view('client.products.listProduct', [
            'categories' => CategoryProduct::orderBy('created_at', 'desc')->limit(3)->get(),
            'categoriesAll' => CategoryProduct::all(),
            'products' => Product::paginate(8),
        ]);
    }
    
    public function productDetail($id) {

        $productDetail = Product::find($id);
        //trang sản phảm chi tiet
        return view('client.products.detailProduct', [
            'productDetail' => $productDetail,
            'commentCount' => Comment::where('id_product', $id)->get()->count(),
            'comments' => Comment::where('id_product', $id)->get(),
            'productRelate' => Product::where('id_category_products', $productDetail->id_category_products)->get(),
            'imagesAll' => ImageProduct::where('id_product', $id)->get(),
            'sizes' => ProductDetail::where('id_product', $id)->where('type','size')->get(),
            'colors' => ProductDetail::where('id_product', $id)->where('type','color')->get(),
        ]);

    }

    public function blog()
    {
        // Trang bolg
        return view('client.blog.blogHome', [

        ]);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        // Trang sản phẩm
        return view('client.contact.contactHome', [

        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
