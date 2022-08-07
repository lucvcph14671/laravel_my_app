@extends('clientMaster')
@section('title', 'Đăng nhập, Đăng kí tài khoản mới')
@section('content')
    <section class="user m-t-80">
        <div class="user_options-container">
            <div class="user_options-text">
                <div class="user_options-unregistered">
                    <h2 class="user_unregistered-title">Bạn chưa có tài khoản?</h2>
                    <p class="user_unregistered-text py-5">Tạo tài khoản mới nào!</p>
                    <a class="user_unregistered-signup" href="{{ route('/form-dang-ki') }}" id="signup-button">Đăng kí ngay</a>
                </div>
            </div>

            <div class="user_options-forms" id="user_options-forms">
                <div class="user_forms-login">
                    <h2 class="forms_title">Đăng nhập</h2>
                    @if (Session::has('messenger'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                            </svg>
                            <div>
                                {{ Session::get('messenger') }}
                                @php
                                    Session::forget('messenger');
                                @endphp
                            </div>
                        </div>
                    @endif
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
                                <input type="password" name="password" value="{{ old('password') }}"
                                    placeholder="Nhập mật khẩu" class="forms_field-input" />
                            </div>
                        </fieldset>
                        <div class="forms_buttons mb-5">
                            <button type="button" class="forms_buttons-forgot">Quên mật khẩu?</button>
                            <input type="submit" value="Đăng nhập" class="forms_buttons-action">
                        </div>
                    </form>
                    <hr>
                    <div class="d-flex flex-column">
                        <a href="{{route('/login-facebook')}}" class="fb btn btn-primary my-2 mt-5">
                          <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                        </a>
                        <a href="#" class="twitter btn btn-info">
                          <i class="fa fa-twitter fa-fw"></i> Login with Twitter
                        </a>
                        <a href="{{route('/login-google')}}" class="google btn btn-danger my-2">
                          <i class="fa fa-google fa-fw"></i> Login with Google+
                        </a>
                      </div>
                </div>

            </div>
        </div>
    </section>

@endsection
