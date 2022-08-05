@extends('adminMaster')
@section('title', 'Admin - From thêm mới/update danh mục')
@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Form</h1>
            <a class="badge bg-dark text-white ms-2" href="{{ route('admin.category.form-category') }}">
                Thêm mới Danh mục
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
        <div class="row">
            <div class="col-12 col-lg-6">
                <form
                    action="{{ isset($categoryProductId) ? route('admin.category.update-category', $categoryProductId->id) : route('admin.category.add-category') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($categoryProductId))
                        @method('PUT')
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Tên danh mục</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" name="title" class="form-control"
                                value="{{ isset($categoryProductId) ? $categoryProductId->title : old('title') }}"
                                placeholder="Nhập tên danh mục">
                            @if ($errors->has('title'))
                                <span class="text-danger text-sm"> {{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Trạng thái</h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="status"
                                        {{ isset($categoryProductId) && $categoryProductId->status === 0 ? 'checked' : '' }}>
                                    <span class="form-check-label">
                                        Ẩn danh mục
                                    </span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="status"
                                        {{ isset($categoryProductId) && $categoryProductId->status === 1 ? 'checked' : '' }}>
                                    <span class="form-check-label">
                                        Hiện danh mục
                                    </span>
                                </label>
                                @if ($errors->has('status'))
                                    <span class="text-danger text-sm"> {{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Ảnh</h5>
                        </div>
                        <div class="card-body">
                            <input class="form-control image-preview" onchange="previewfile(this)" type="file"
                                name="image">
                            @if ($errors->has('image'))
                                <span class="text-danger text-sm"> {{ $errors->first('image') }}</span>
                            @endif
                            <img src="{{ isset($categoryProductId) ? asset($categoryProductId->image) : '' }}"
                                class="pt-2" id="previewImg" alt="" width="100">
                        </div>

                    </div>
                    <button class="btn btn-info" type="submit">Lưu</button>
                </form>
            </div>

            <div class="col-12 col-lg-6">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Danh sách dah mục</h5>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Danh mục</th>
                                <th class="d-none d-xl-table-cell">Ngày thêm</th>
                                <th class="d-none d-xl-table-cell">Ảnh</th>
                                <th>Trạng thái</th>
                                <th class="d-none d-md-table-cell"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoryProduct as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td class="d-none d-xl-table-cell">{{ date('d/m/Y', strtotime($item->created_at)) }}
                                    </td>
                                    <td class="d-none d-xl-table-cell"><img src="{{ asset($item->image) }}" alt="img"
                                            height="92" width="100"></td>
                                    <td>
                                        @if ($item->status === 1)
                                            <span class="badge bg-info">Hiện</span>
                                        @else
                                            <span class="badge bg-warning">Tạm ẩn</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.category.destroy-category', $item->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="badge bg-danger border border-danger show_confirm">
                                                Xóa
                                            </button>
                                        </form>
                                        <a class="badge bg-success border border-success text-decoration-none"
                                            href="{{ route('admin.category.edit-category', $item->id) }}">Sửa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                {{ $categoryProduct->links() }}
            </div>
        </div>
    </div>

@endsection
