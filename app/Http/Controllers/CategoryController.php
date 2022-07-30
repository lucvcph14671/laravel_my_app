<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryProductRequest;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryController extends Controller
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



    /// admin quản lí

    // from dANH MUC thêm sửa
    public function formCategory()
    {
        return view('admin.category.formCategory', [
            'categoryProduct' => CategoryProduct::paginate(3),
        ]);
    }

    // Thêm mới danh muc
    public function addCategory(CategoryProductRequest $request)
    {
        $category = new CategoryProduct();

        $category->fill($request->all());
        if($request->hasFile('image')) {
            $category->image = $this->saveFile(
                $request->image,
                $request->title,
                'images'
            );
        }

        $category->save();
        return redirect()->route('admin.category.form-category');
    }


        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id){

            $this->deleteFile(CategoryProduct::find($id));

            if( CategoryProduct::destroy($id) ){

                return back();
            }
            
        }
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.category.formCategory', [
            'categoryProduct' => CategoryProduct::paginate(3),
            'categoryProductId' => CategoryProduct::find($id),
        ]);
    }


        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryProductRequest $request, $id)
    {
        $category = CategoryProduct::find($id);
        $category->fill($request->all());

        if($request->hasFile('image')) {
            $category->image = $this->saveFile(
                $request->image,
                $request->title,
                'images'
            );
            $this->deleteFile($category);
            
        }else{
 
            $category->avatar = $category->avatar;
    
        }

        $category->save();
        return redirect()->route('admin.category.form-category');
    }
}
