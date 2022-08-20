@extends('adminMaster')
@section('title', 'Admin - Danh sách Oder')
@section('content')
<div class="container-fluid p-0">

    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Oder</h1>
        <a class="badge bg-dark text-white ms-2" >
            Danh sách đơn hàng
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

                <div class="card-header">
        
                    <h5 class="card-title mb-0">Đơn hàng</h5>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Sản phẩm</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Size & Màu</th>
                            <th>SL</th>
                            <th>Địa chỉ</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orers as $key => $oder)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$oder->product['name']}}</td>
                            <td>{{$oder->name}}</td>
                            <td>{{$oder->email}}</td>
                            <td>{{$oder->phone}}</td>
                            <td>{{$oder->sizeName['name']}} | {{$oder->colorName['name']}}</td>
                            <td>{{$oder->num_product}}</td>
                            <td>{{$oder->address}}</td>
                            <td>{{number_format($oder->totalPrice)}}</td>
                            <td>
                                @if ($oder->status === 0)
                                <a class="badge bg-warning" href="{{route('admin.update_status',['nametable' => 'oders', 'id' => $oder->id, 'status' => 1])}}">Đang vận chuyển</a>
                            @else
                                <span class="badge bg-info" >Thành công</span>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>

</div>

@endsection