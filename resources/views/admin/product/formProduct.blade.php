@extends('adminMaster')
@section('title', 'Admin - From thêm mới/update sản phẩm')
@section('content')
    <form action="{{route('admin.product.add-product')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Form</h1>
                <a class="btn btn-info text-white ms-2" href="{{ route('admin.product.list-product') }}">
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
                            @if ($errors->has('name'))
                                <span class="text-danger text-sm"> {{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="card-body d-flex">
                            <div class=" me-2">
                                <input type="number" name="quantity" class="form-control" placeholder="Số lượng">
                                @if ($errors->has('quantity'))
                                    <span class="text-danger text-sm"> {{ $errors->first('quantity') }}</span>
                                @endif
                            </div>
                            <div>
                                <input type="number" name="price" class="form-control" placeholder="Giá sản phẩm">
                                @if ($errors->has('price'))
                                    <span class="text-danger text-sm"> {{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Mô tả chi tiết</h5>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control" name="desc" rows="4" placeholder="Mô tả"></textarea>
                            @if ($errors->has('desc'))
                                <span class="text-danger text-sm"> {{ $errors->first('desc') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Màu</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                @foreach ($color as $item)
                                    @if ($item->status === 1)
                                        <label class="form-check">
                                            <input class="form-check-input" name="id_color[]" type="checkbox"
                                                value="{{ $item->id }}">
                                            <span class="form-check-label me-2" style="color: {{ $item->color_code }};">
                                                {{ $item->name }}
                                            </span>
                                        </label>
                                    @endif
                                @endforeach

                            </div>
                            @if ($errors->has('id_color'))
                                <span class="text-danger text-sm"> {{ $errors->first('id_color') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Kích thước</h5>
                        </div>
                        <div class="card-body">
                            <div>
                                @foreach ($size as $item)
                                    @if ($item->status === 1)
                                        <label class="form-check">
                                            <input class="form-check-input" name="id_size[]" type="checkbox"
                                                value="{{ $item->id }}">
                                            <span class="form-check-label">
                                                {{ $item->name }}
                                            </span>
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                            @if ($errors->has('id_size'))
                                <span class="text-danger text-sm"> {{ $errors->first('id_size') }}</span>
                            @endif
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
                                    <input class="form-check-input" type="radio" value="0" name="status">
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
                            @if ($errors->has('status'))
                                <span class="text-danger text-sm"> {{ $errors->first('status') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Danh mục</h5>
                        </div>
                        <div class="card-body">
                            <select class="form-select mb-3" name="id_category_products">
                                <option value="">Chọn danh mục</option>
                                @foreach ($categoryProduct as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('id_category_products'))
                            <span class="text-danger text-sm"> {{ $errors->first('id_category_products') }}</span>
                        @endif
                        </div>
                        
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Ảnh</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Ảnh đại diện</label>
                                <input type="file" name="thumbnail"  onchange="previewfile(this)" class="form-control image-preview">
                                @if ($errors->has('thumbnail'))
                                    <span class="text-danger text-sm"> {{ $errors->first('thumbnail') }}</span>
                                @endif
                                <img class="pt-2" src="" id="previewImg" alt="" width="100">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ảnh chi tiết</label>
                                <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                                @if ($errors->has('images'))
                                    <span class="text-danger text-sm"> {{ $errors->first('images[]') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info">Thêm</button>
        </div>
    </form>
@endsection
