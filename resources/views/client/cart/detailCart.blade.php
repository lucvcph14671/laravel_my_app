@extends('clientMaster')
@section('title', 'Cửa hàng Coza Store')
@section('content')
    <!-- breadcrumb -->
    <div class="container p-t-50">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Shoping Cart
            </span>
        </div>
    </div>


    <!-- Shoping Cart -->
    <div class="bg0 p-t-75 p-b-85" >
        <div class="">
            <div class="row" >
                <form class="col-lg-10 col-xl-8 m-lr-auto m-b-50" action="{{ route('update-quantity') }}" method="POST">
                    @csrf
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart ">
                                <tbody>
                                    <tr class="table_head">
                                        <th class="column-1">Sản phẩm</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Màu</th>
                                        <th class="column-3">Size</th>
                                        <th class="column-3">Giá</th>
                                        <th class="column-4">Số lượng</th>
                                        <th class="column-5">Tổng giá</th>
                                        {{-- {{dd(Session::get('Cart')->products)}} --}}
                                    </tr>
                                    @if (Session::has('Cart') != null)
                                        <div id="data-cart">
                                            @foreach (Session::get('Cart')->products as $key => $listCart)
                                                <tr class="table_row">
                                                    <td class="column-1">
                                                        <a
                                                            href="{{ route('delete-detail-cart', $listCart['producInfo']->id) }}">
                                                            <div class="how-itemcart1">
                                                                <img src="{{ asset($listCart['producInfo']->thumbnail) }}"
                                                                    alt="IMG">
                                                            </div>
                            
                                                        </a>
                                                        <input type="hidden" name="id" value="{{$listCart['producInfo']->id}}">
                                                    </td>
                                                    <td class="column-2">{{ $listCart['producInfo']->name }}</td>
                                                    <td class="column-3">
                                                        <select name="color" class="border-0 stext-111 text-dark">
                                                            @foreach ($colors as $color)
                                                                @if ($color->id_product == $listCart['producInfo']->id)
                                                                    <option value="{{ $color->id }}">
                                                                        {{ $color->color_name->name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="column-3">
                                                        <select name="size" class="border-0 stext-111 text-dark">
                                                            @foreach ($sizes as $size)
                                                                @if ($size->id_product == $listCart['producInfo']->id)
                                                                    <option value="{{ $color->id }}">
                                                                        {{ $size->size_name->name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="column-3 ">
                                                        {{ number_format($listCart['producInfo']->price) }}đ
                                                    </td>
                                                    <td class="column-4">
                                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                            <div
                                                                class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                                            </div>

                                                            <input class="mtext-104 cl3 txt-center num-product"
                                                                type="number" name="{{$key}}"
                                                                value="{{ $listCart['quantity'] }}">

                                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="column-5">
                                                        {{ number_format($listCart['quantity'] * $listCart['producInfo']->price) }}đ
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </div>
                                    @endif

                                </tbody>
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">

                            </div>

                            <button
                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Cập nhập giỏ hàng
                            </button>
                        </div>
                    </div>
                </form>

                <form class="col-sm-10 col-lg-7 col-xl-4 m-lr-auto m-b-50" action="{{ route('thanh-toan') }}" method="POST">
                   @csrf
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30 bor12">
                            Thanh toán
                        </h4>
                        @if (Session::has('error'))
                            <div class="alert alert-success d-flex align-items-center mt-2" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                    aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <div>
                                    {{ Session::get('error') }}
                                    @php
                                        Session::forget('error');
                                    @endphp
                                </div>
                            </div>
                        @endif
                        <p class="stext-111 cl6 p-t-20">
                            Không có phương thức vận chuyển nào có sẵn. Vui lòng kiểm tra kỹ địa chỉ của bạn, hoặc liên
                            hệ
                            với chúng tôi nếu bạn cần bất kỳ trợ giúp nào.
                        </p>
                        <div class="bor8 bg0 m-b-12 m-t-20">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name"
                                placeholder="Họ và tên">
                        </div>
                        @if ($errors->has('name'))
                            <span class="text-danger text-sm"> {{ $errors->first('name') }}</span>
                        @endif
                        <div class="bor8 bg0 m-b-12 m-t-2">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone"
                                placeholder="Số điện thoại">
                        </div>
                        @if ($errors->has('phone'))
                            <span class="text-danger text-sm"> {{ $errors->first('phone') }}</span>
                        @endif
                        <div class="bor8 bg0 m-b-12 m-t-2">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" name="email"
                                placeholder="Email">
                        </div>
                        @if ($errors->has('email'))
                            <span class="text-danger text-sm"> {{ $errors->first('email') }}</span>
                        @endif
                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-2">
                            <select class="js-select2" name="district">
                                <option value="">Chọn khu vực</option>
                                <option value="Miền Bắc">Miền Bắc</option>
                                <option value="Miền Trung">Miền Trung</option>
                                <option value="Miền Nam">Miền Nam</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        @if ($errors->has('district'))
                            <span class="text-danger text-sm"> {{ $errors->first('district') }}</span>
                        @endif
                        <div class="bor8 bg0 m-b-12">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address"
                                placeholder="Địa chỉ">
                        </div>
                        @if ($errors->has('address'))
                            <span class="text-danger text-sm"> {{ $errors->first('address') }}</span>
                        @endif
                        <h4 class=" cl2 p-b-10 bor12">
                        </h4>
                        <div class="flex-w flex-t p-t-20 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Tổng số tiền:
                                </span>
                            </div>

                            <div class="size-209">
                                @if (Session::has('Cart'))
                                    <span class="mtext-110 cl2">
                                        {{ number_format(Session::get('Cart')->totalPrice) }} đ
                                    </span>
                                @else
                                    <span class="mtext-110 cl2">
                                        0 đ
                                    </span>
                                @endif

                            </div>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Đặt hàng ngay
                        </button>
                    </div>
                    @if (Session::has('Cart') != null)
                    <select name="size" class="border-0 stext-111 text-dark" hidden>
                        @foreach ($sizes as $size)
                            @if ($size->id_product == $listCart['producInfo']->id)
                                <option value="{{ $color->id_type }}">
                                    {{ $size->size_name->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    <select name="color" class="border-0 stext-111 text-dark" hidden>
                        @foreach ($colors as $color)
                            @if ($color->id_product == $listCart['producInfo']->id)
                                <option value="{{ $color->id_type }}">
                                    {{ $color->color_name->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
