@extends('adminMaster')
@section('title', 'Admin - Thông tin Profile')
@section('content')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Profile</h1>
        <a class="badge bg-dark text-white ms-2">
            Thông tin chi tiết
        </a>
    </div>
    @if (Session::has('messenger'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
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
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title mb-0">Profile Details</h5>
        </div>
        <div class="card-body text-center">
            <img src="{{ Auth::user()->image }}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128"
                height="128" />
            <h5 class="card-title mb-0">Họ tên: {{ Auth::user()->name }}</h5>
            <div class="text-muted mb-2">Email: {{ Auth::user()->email }}</div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
            <h5 class="h6 card-title">Chức vụ</h5>
            @if (Auth::user()->role == 0)
                <a class="badge bg-primary me-1 my-1">Khách hàng</a>
            @elseif(Auth::user()->name == 1)
                <a class="badge bg-primary me-1 my-1">Nhân viên</a>
            @else
                <a class="badge bg-primary me-1 my-1">Admin</a>
            @endif
        </div>
        <hr class="my-0" />
        <div class="card-body">
            <form action="{{ route('admin.user.update-user', Auth::user()->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h5 class="h6 card-title">Cập nhập thông tin</h5>
                <div class="d-flex">
                    <div class="card-body">
                        <span class="card-title">Họ tên</span>
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                        @if ($errors->has('name'))
                            <span class="text-danger text-sm"> {{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="card-body">
                        <span class="card-title">Địa chỉ</span>
                        <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}">
                        @if ($errors->has('address'))
                            <span class="text-danger text-sm"> {{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="card-body">
                        <span class="card-title">Số điện thoại</span>
                        <input type="text" name="phone" class="form-control" value="0{{ Auth::user()->phone }}">
                        @if ($errors->has('phone'))
                            <span class="text-danger text-sm"> {{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="card-body">
                        <span class="card-title">Email</span>
                        <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
                        @if ($errors->has('email'))
                            <span class="text-danger text-sm"> {{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="card-body">
                        <span class="card-title">Avatar</span>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-info ml-3">Cập nhập</button>
            </form>
        </div>
        <hr class="my-0" />
        <div class="card-body">
            <form action="{{ route('admin.user.update-password', Auth::user()->id) }}" method="post">
                @csrf
                @method('PUT')
                <h5 class="h6 card-title">Đổi mật khẩu</h5>
                @if (Session::has('error'))
                    <span class="text-danger text-sm ml-3">
                        {{ Session::get('error') }}
                        @php
                            Session::forget('error');
                        @endphp
                    </span>
                @endif
                <div class="d-flex">
                    <div class="card-body">
                        <input type="password" name="passwordold" value="{{ old('passwordold') }}" class="form-control"
                            placeholder="Mật khẩu cũ">
                        @if ($errors->has('passwordold'))
                            <span class="text-danger text-sm"> {{ $errors->first('passwordold') }}</span>
                        @endif
                    </div>
                    <div class="card-body">
                        <input type="text" name="password" value="{{ old('password') }}" class="form-control"
                            placeholder="Mật khẩu mới">
                        @if ($errors->has('password'))
                            <span class="text-danger text-sm"> {{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="card-body">
                        <input type="text" name="password_confirmation" class="form-control"
                            placeholder="Nhập mật khẩu mới">
                        @if ($errors->has('password'))
                            <span class="text-danger text-sm"> {{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-info ml-3">Đổi mật khẩu</button>
            </form>
        </div>
    </div>
@endsection
