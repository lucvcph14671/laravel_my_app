@extends('adminMaster')
@section('title', 'Thêm/sửa kích thước mới.')
@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Kích thước</h1>
            <a class="badge bg-dark text-white ms-2">
                Thêm kích thước mới
            </a>
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

        </div>

        <form
            action="{{ isset($data_size) ? route('admin.size.update-size', $data_size->id) : route('admin.size.add-size') }}"
            method="post">
            @csrf
            @if (isset($data_size))
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title">Form thêm khích thước</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <h5 class="card-title mb-0">Loại khích cỡ</h5>
                                <input type="text" name="name" class="form-control mt-2"
                                    value="{{ isset($data_size) ? $data_size->name : old('name') }}"
                                    placeholder="Nhập khích cỡ">
                                @if ($errors->has('name'))
                                    <span class="text-danger text-sm"> {{ $errors->first('name') }}</span>
                                @endif

                                <div class="card mt-4">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Trạng thái</h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="radio" value="0"
                                                {{ isset($data_size) && $data_size->status === 0 ? 'checked' : '' }}
                                                    name="status">
                                                <span class="form-check-label">
                                                    Ẩn size
                                                </span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="radio" value="1"
                                                {{ isset($data_size) && $data_size->status === 1 ? 'checked' : '' }}
                                                    name="status">
                                                <span class="form-check-label">
                                                    Hiện size
                                                </span>
                                            </label>
                                            @if ($errors->has('status'))
                                                <span class="text-danger text-sm"> {{ $errors->first('status') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-info mt-4" type="submit">Thêm ngay</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        <div class="col-12 col-lg-6 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Danh sách màu</h5>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Kích thước</th>
                            <th class="d-none d-xl-table-cell">Ngày thêm</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($size as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="d-none d-xl-table-cell">{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                <td>
                                    @if ($item->status === 1)
                                        <span class="badge bg-info">Hiện</span>
                                    @else
                                        <span class="badge bg-warning">Tạm ẩn</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.size.destroy-size', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="badge bg-danger border border-danger show_confirm">
                                            Xóa
                                        </button>
                                    </form>
                                    <a class="badge bg-success border border-success text-decoration-none"
                                        href="{{ route('admin.size.edit-size', $item->id) }}">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>

@endsection
