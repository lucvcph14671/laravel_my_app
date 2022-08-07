<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(AuthRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            return redirect()->route('admin./');
        }

        return redirect()->route('/form-dang-nhap');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formLogin()
    {
        return view('auth.login', []);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formSignin()
    {
        return view('auth.signin', []);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('/form-dang-nhap');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signin(AddUserRequest $request)
    {
        $user = new User();

        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRCFgHuWIBCleFnK0U9Hytp0Q76Ygu1alwrQ&usqp=CAU';

        $user->save();
        return redirect()->route('/form-dang-nhap')->with('messenger', 'Đăng kí tài khoản thành công.');
    }

    public function getLoginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        if ($googleUser) {
            // 1. Xem xem user này đã tồn tại trong DB chưa
            $user = User::where('email', $googleUser->email)->first();
            // 2. Nếu tồn tại rồi thì cho đăng nhập
            if ($user) {
                Auth::login($user); // không cần check password vẫn cho đăng nhập vào
                return redirect()->route('admin./');
            }
            // 3. Nếu không có $user thì tạo 1 bản ghi mới từ thông tin google
            $newUser = new User();
            $newUser->fill($googleUser->user);
            $newUser->email = $googleUser->email;
            $newUser->phone = '';
        }
    }

    public function getLoginFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginFacebookCallBack()
    {
        $googleUser = Socialite::driver('facebook')->user();
        dd($googleUser);
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
    public function update_status(Request $request, $id)
    {
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
