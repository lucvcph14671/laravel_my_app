@extends('adminMaster')
@section('title', 'Admin - From thêm mới/update sản phẩm')
@section('content')
<form action="" method="post">
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Form</h1>
            <a class="btn btn-info text-white ms-2" href="{{route('admin.product.list-product')}}">
                Danh sách sản phẩm
            </a>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Sản phẩm</h5>
                    </div>
                    <div class="card-body">
                        <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm">
                    </div>
                    <div class="card-body d-flex">
                        <input type="number" name="quantity" class="form-control me-2" placeholder="Số lượng">
                        <input type="number" name="price" class="form-control" placeholder="Giá sản phẩm">
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Mô tả chi tiết</h5>
                    </div>
                    <div class="card-body">
                        <textarea class="form-control" name="desc" rows="4" placeholder="Mô tả"></textarea>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Màu</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <span class="form-check-label me-2" style="color: #00ad5f;">
                                    Đỏ
                                </span>
                            </label>

                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <span class="form-check-label">
                                    Đen
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Kích thước</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <span class="form-check-label">
                                    Lớn
                                </span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <span class="form-check-label">
                                    Nhỏ
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Trạng thái</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <label class="form-check">
                                <input class="form-check-input" type="radio" value="0" name="status"
                                    checked>
                                <span class="form-check-label">
                                   Hiển thị
                                </span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="radio" value="1" name="status">
                                <span class="form-check-label">
                                    Ẩn sản phẩm
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Danh mục</h5>
                    </div>
                    <div class="card-body">
                        <select class="form-select mb-3">
                            <option selected>Chọn danh mục</option>
                            <option>One</option>
                            <option>Two</option>
                            <option>Three</option>
                        </select>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ảnh</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Ảnh đại diện</label>
                            <input type="file" name="thumbnail" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ảnh chi tiết</label>
                            <input type="file" name="images[]" class="form-control" multiple>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Thêm</button>
    </div>
</form>
@endsection
