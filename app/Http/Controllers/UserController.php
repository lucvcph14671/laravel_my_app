<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdatePassRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


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

    public function profile()
    {
        return view('admin.user.profile', []);
    }

    /// Danh sách tài khoản

    public function listUser()
    {
        return view(
            'admin.user.listUser',
            [
                'user_role1' => User::all()->where('role', 1),
                'user_role0' => User::all()->where('role', 0),
            ]
        );
    }


    //Dổi mật khẩu

    public function updatePass(UpdatePassRequest $request, $id)
    {
        $hashedPassword = Hash::make(Auth::user()->password);

        if (Hash::check($request->passwordold, $hashedPassword)) {

            return redirect()->back()->with('error', 'Mật khẩu cũ không khớp!');

        } else {

            dd($hashedPassword);
            if (!Hash::check($request->password, $hashedPassword)) {

                return redirect()->back()->with('error', 'Mật khẩu mới không thể giống mật khẩu cũ!');

            } else {

                $users = User::find(Auth::user()->id);
                $users->password = bcrypt($request->password);

                User::where('id', Auth::user()->id)->update(array('password' =>  $users->password));

                return redirect()->back()->with('messager', 'Đổi mật khẩu thành công');
            }
        }
    }


    //Upate thông tin tài khoản

    public function updateUser(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());

        if ($request->hasFile('image')) {
            $user->image = $this->saveFile(
                $request->image,
                $request->title,
                'images'
            );
            $this->deleteFile($user->image);
        } else {

            $user->image = $user->image;
        }

        $user->save();
        return redirect()->route('admin.user.profile')->with('messenger', 'Thay đổi thành công.');
    }
}
