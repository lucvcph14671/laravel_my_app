@extends('clientMaster')
@section('title', 'Đăng nhập, Đăng kí tài khoản mới')
@section('content')
    <section class="user m-t-80">
        <div class="user_options-container">
            <div class="user_options-text">

                <div class="user_options-registered">
                    <h2 class="user_registered-title">Bạn đã có tài khoản!</h2>
                    <p class="user_registered-text py-5">Hãy bắt đầu..</p>
                    <a class="user_registered-login" href="{{ route('/form-dang-nhap') }}" id="login-button">Đăng nhập ngay</a>
                </div>
            </div>

            <div class="user_options-forms" id="user_options-forms">
                <div class="user_forms-login">
                    <h2 class="forms_title">Tạo tài khoản</h2>
                    <form class="forms_form" action="{{ route('/dang-ki') }}" method="POST">
                        @csrf
                        <fieldset class="forms_fieldset">
                            <div class="forms_field">
                                @if ($errors->has('name'))
                                    <span class="text-danger text-sm"> {{ $errors->first('name') }}</span>
                                @endif
                                <input type="text" placeholder="Họ và tên" value="{{old('name')}}" name="name" class="forms_field-input" />
                            </div>
                            <div class="forms_field">
                                @if ($errors->has('email'))
                                    <span class="text-danger text-sm"> {{ $errors->first('email') }}</span>
                                @endif
                                <input type="email" placeholder="Email" value="{{old('email')}}" name="email" class="forms_field-input" />
                            </div>
                            <div class="forms_field">
                                @if ($errors->has('phone'))
                                    <span class="text-danger text-sm"> {{ $errors->first('phone') }}</span>
                                @endif
                                <input type="number" placeholder="Số điện thoại" value="{{old('phone')}}" name="phone"
                                    class="forms_field-input" />
                            </div>
                            <div class="forms_field">
                                @if ($errors->has('password'))
                                    <span class="text-danger text-sm"> {{ $errors->first('address') }}</span>
                                @endif
                                <input type="text" placeholder="Địa chỉ" value="{{old('address')}}" name="address" class="forms_field-input" />
                            </div>
                            <div class="forms_field">
                                @if ($errors->has('password'))
                                    <span class="text-danger text-sm"> {{ $errors->first('password') }}</span>
                                @endif
                                <input type="password" placeholder="Nhập mật khẩu mới" value="{{old('password')}}" name="password"
                                    class="forms_field-input" />
                            </div>
                            <div class="forms_field">
                                @if ($errors->has('password'))
                                    <span class="text-danger text-sm"> {{ $errors->first('password') }}</span>
                                @endif
                                <input type="password" placeholder="Nhập lại mật khẩu" name="password_confirmation"
                                    class="forms_field-input" />
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
