<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Http\Requests\SizeRequest;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
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





    ///Admin thêm kích thuoc san phamn

    public function formSize(){

        return view('admin.sizeAndcolor.size',[
            'size' => Size::paginate(3),
        ]);
    }

    //Thêm mới sizze

    public function addSize(SizeRequest $request){

        
        $size = new Size();

        $size->fill($request->all());

        $size->save();
        return redirect()->back()->with('messenger','Thêm mới thành công');
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

            if( Size::destroy($id) ){

                return redirect()->back()->with('messenger','Xóa thành công');
            }
            
        }
    }


        /** form edit size
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.sizeAndcolor.size',[
            'size' => Size::paginate(3),
            'data_size' => Size::find($id),
        ]);
    }



        /**
         * update size
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SizeRequest $request, $id)
    {
        $size = Size::find($id);
        $size->fill($request->all());

        $size->save();
        return redirect()->back()->with('messenger','Sửa thành công');
    }
}

