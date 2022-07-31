@extends('clientMaster')
@section('title', 'Đăng nhập, Đăng kí tài khoản mới')
@section('content')
    <section class="user m-t-80">
        <div class="user_options-container">
            <div class="user_options-text">
                <div class="user_options-unregistered">
                    <h2 class="user_unregistered-title">Bạn chưa có tài khoản?</h2>
                    <p class="user_unregistered-text">Tạo tài khoản mới nào!</p>
                    <button class="user_unregistered-signup" id="signup-button">Đăng kí ngay</button>
                </div>

                <div class="user_options-registered">
                    <h2 class="user_registered-title">Bạn đã có tài khoản!</h2>
                    <p class="user_registered-text">Hãy bắt đầu..</p>
                    <button class="user_registered-login" id="login-button">Đăng nhập ngay</button>
                </div>
            </div>

            <div class="user_options-forms" id="user_options-forms">
                <div class="user_forms-login">
                    <h2 class="forms_title">Đăng nhập</h2>
                    <form class="forms_form" action="{{ route('/dang-nhap') }}" method="POST">
                        @csrf
                        <fieldset class="forms_fieldset">
                            <div class="forms_field">
                                @if ($errors->has('email'))
                                    <span class="text-danger text-sm"> {{ $errors->first('email') }}</span>
                                @endif
                                <input type="email" name="email" placeholder="Nhập email" value="{{ old('email') }}"
                                    class="forms_field-input" autofocus />
                            </div>
                            <div class="forms_field">
                                @if ($errors->has('password'))
                                    <span class="text-danger text-sm"> {{ $errors->first('password') }}</span>
                                @endif
                                <input type="password" name="password" value="{{old('password')}}" placeholder="Nhập mật khẩu" class="forms_field-input" />
                            </div>
                        </fieldset>
                        <div class="forms_buttons">
                            <button type="button" class="forms_buttons-forgot">Quên mật khẩu?</button>
                            <input type="submit" value="Đăng nhập" class="forms_buttons-action">
                        </div>
                    </form>
                </div>
                <div class="user_forms-signup">
                    <h2 class="forms_title">Tạo tài khoản</h2>
                    <form class="forms_form">
                        <fieldset class="forms_fieldset">
                            <div class="forms_field">
                                <input type="text" placeholder="Full Name" class="forms_field-input" required />
                            </div>
                            <div class="forms_field">
                                <input type="email" placeholder="Email" class="forms_field-input" required />
                            </div>
                            <div class="forms_field">
                                <input type="password" placeholder="Password" class="forms_field-input" required />
                            </div>
                        </fieldset>
                        <div class="forms_buttons">
                            <input type="submit" value="Đăng kí" class="forms_buttons-action">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
