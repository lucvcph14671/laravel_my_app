@extends('adminMaster')
@section('title', 'Thêm mã màu mới.')
@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Màu</h1>
            <a class="badge bg-dark text-white ms-2">
                Thêm màu mới
            </a>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title">Form thêm màu</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <h5 class="card-title mb-0">Tên màu</h5>
                            <input type="text" name="title" class="form-control"
                                value="{{ isset($categoryProductId) ? $categoryProductId->title : old('$title') }}"
                                placeholder="Nhập tên màu">
                            @if ($errors->has('title'))
                                <span class="text-danger text-sm"> {{ $errors->first('title') }}</span>
                            @endif

                            <div class="card mt-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Trạng thái</h5>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" value="0" name="status"
                                                {{ isset($categoryProductId) && $categoryProductId->status === 0 ? 'checked' : '' }}>
                                            <span class="form-check-label">
                                                Ẩn màu
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" value="1" name="status"
                                                {{ isset($categoryProductId) && $categoryProductId->status === 1 ? 'checked' : '' }}>
                                            <span class="form-check-label">
                                                Hiện màu
                                            </span>
                                        </label>
                                        @if ($errors->has('title'))
                                            <span class="text-danger text-sm"> {{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <h5 class="card-title mb-0">Thêm mã màu</h5>
                                <input type="text" name="title" class="form-control"
                                    value="{{ isset($categoryProductId) ? $categoryProductId->title : old('$title') }}"
                                    placeholder="VD: #fffff">
                                @if ($errors->has('title'))
                                    <span class="text-danger text-sm"> {{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <button class="btn btn-info mt-4" type="submit">Thêm ngay</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Danh sách màu</h5>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Name</th>
                                <th class="d-none d-xl-table-cell">Ngày thêm</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Project Apollo</td>
                                <td class="d-none d-xl-table-cell">31/06/2021</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="badge bg-danger border border-danger show_confirm">
                                            Xóa
                                        </button>
                                    </form>
                                    <a class="badge bg-success border border-success text-decoration-none"
                                        href="">Sửa</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
