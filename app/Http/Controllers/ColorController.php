<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class ColorController extends Controller
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


    // admin form them màu

    public function formColor(){

        return view('admin.sizeAndcolor.color',[
            'color' => Color::paginate(3),
        ]);
    }

    //Thêm mới màu

    public function addColor(ColorRequest $request){

        
        $color = new Color();

        $color->fill($request->all());

        $color->save();
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

            if( Color::destroy($id) ){

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
        return view('admin.sizeAndcolor.color',[
            'color' => Color::paginate(3),
            'data_color' => Color::find($id),
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
    public function update(ColorRequest $request, $id)
    {
        $color = Color::find($id);
        $color->fill($request->all());

        $color->save();
        return redirect()->back()->with('messenger','Sửa thành công');
    }
}
