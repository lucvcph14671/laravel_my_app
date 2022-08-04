<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\CategoryProduct;
use App\Models\Color;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /// Admin quản lí

    public function listProduct()
    {
        return view('admin.product.listProduct', []);
    }


    // from sản phẩm thêm sửa
    public function fromProduct()
    {
        return view('admin.product.formProduct', [
            'size' => Size::all(),
            'color' => Color::all(),
            'categoryProduct' => CategoryProduct::all(),
        ]);
    }

    // Thêm mới sản phẩm 
    public function addProduct(Request $request)
    {
        // foreach ($request->images as $value) {
        //     dd($value->hashName());
        // }
        $product = new Product();
        
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->id_category_products = $request->id_category_products;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->desc = $request->desc;

        if ($request->hasFile('thumbnail')) {
            $product->thumbnail = $this->saveFile(
                $request->thumbnail,
                $request->name,
                'images'
            );
        }

        $product->save();
        if ($request->hasFile('images')) {
        foreach ($request->images as $value) {

            $image = $this->saveFile(
                $value,
                $product->name,
                'images'
            );

            ImageProduct::create([
                'id_product' => $product->id,
                'images' => $image,
            ]);
        }
        }

        foreach ($request->id_size as $value) {
            ProductDetail::create([
                'id_product' => $product->id,
                'id_type' => $value,
                'type' => 'size',
            ]);
        }

        foreach ($request->id_color as $value) {
            ProductDetail::create([
                'id_product' => $product->id,
                'id_type' => $value,
                'type' => 'color',
            ]);
        }

        return redirect()->route('admin.product.list-product');
    }
}
