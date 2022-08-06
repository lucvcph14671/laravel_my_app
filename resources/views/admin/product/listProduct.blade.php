@extends('adminMaster')
@section('title', 'Admin - Danh sách sản phẩm.')
@section('content')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Sản phẩm</h1>
        <a class=" btn btn-info text-white ms-2" href="{{ route('admin.product.form-product') }}">
            Thêm mới
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
    <div class="card flex-fill">
        <div class="card-header">

            <h5 class="card-title mb-0">Danh sách sản phẩm</h5>

        </div>
        <table class="table table-hover my-0">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                    <th>Giá</th>
                    <th>Mô tả</th>
                    <th>Danh mục</th>
                    <th>Ảnh Demo</th>
                    <th>Ảnh chi tiết</th>
                    <th>Tương tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td><span class="badge bg-primary">{{ $item->quantity }}</span></td>
                        <td>
                            @if ($item->status === 0)
                                <span class="badge bg-info">Còn hàng</span>
                            @else
                                <span class="badge bg-warning">Hết hàng</span>
                            @endif

                        </td>
                        <td>{{ number_format($item->price) }} đ</td>
                        <td>
                            <button type="button" class="badge bg-primary border-0" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop{{ $index + 1 }}">
                                Xem
                            </button>

                            <div class="modal fade" id="staticBackdrop{{ $index + 1 }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Mô tả</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $item->desc }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Thoát</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $item->category->title }}</td>
                        <td><img src="{{ asset($item->thumbnail) }}" alt="img" width="80"></td>
                        <td>
                            <span class="badge bg-secondary">{{ $item->images }} ảnh</span>
                            <!-- Button trigger modal -->
                            <button type="button" class="badge bg-primary border-0" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{$index+1}}">
                                Xem
                            </button>

                            <!-- Modal -->
                            <div class="modal dialog scrollable" id="exampleModal{{$index+1}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Danh sách ảnh</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-light">
                                                <tbody>
                                                    @foreach ($item->categoryList as $image)
                                                        <div class="row d-flex">
                                                            <img src="{{ asset($image->images) }}" alt="img"
                                                                width="100">
                                                        </div>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Thoát</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <form action="{{ route('admin.product.destroy-product', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="badge bg-danger border border-0 show_confirm">
                                    Xóa
                                </button>
                            </form>
                            <a class="badge bg-success border border-success text-decoration-none"
                                            href="{{ route('admin.product.edit-product', $item->id) }}">Sửa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4 ml-2">
            {{ $product->links() }}
        </div>
    </div>



@endsection
