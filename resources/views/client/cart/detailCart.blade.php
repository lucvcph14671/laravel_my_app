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
    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart text-center">
                                <tr class="table_head">
                                    <th class="column-1">Ảnh</th>
                                    <th class="column-2">Tên</th>
                                    <th class="column-3">Size</th>
                                    <th class="column-4">Số lượng</th>
                                    <th class="column-5">Giá</th>
                                    <th class="column-3">Sp</th>
                                </tr>

                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="https://cdn4.buysellads.net/uu/1/102396/1635866001-laravel-forge.png"
                                                alt="IMG">   
                                        </div>
                                    </td>
                                    <td class="column-2">
                                        <p class="stext-111">Fresh Strawberries fgfdgfffffffff ggggg gggfg dfgdfg</p>
                                    </td>

                                    <td class="column-3">
                                        <div class="rs1-select2 rs2-select2 bg0 m-b-12 m-t-2">
                                            <select class="js-select2" name="time">
                                                <option>Lớn</option>
                                                <option>Nhỏ</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </td>
                                    <td class="column-2">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-100 cl3 txt-center num-product" type="number"
                                                name="num-product1" value="1">

                                            <div class="btn-num-product-up cl2 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="column-5">
                                        <p class="stext-111">3.600.000.000đ</p>
                                    </td>
                                    <td class="column-3">
                                        <p class="stext-111">#1</p>
                                    </td>
                                    
                                </tr>
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                    name="coupon" placeholder="Mã giảm giá">

                                <div
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Nhập mã giảm giá
                                </div>
                            </div>

                            <div
                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Cập nhập
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30 bor12">
                            Thanh toán
                        </h4>
                        <p class="stext-111 cl6 p-t-20">
                            Không có phương thức vận chuyển nào có sẵn. Vui lòng kiểm tra kỹ địa chỉ của bạn, hoặc liên hệ
                            với chúng tôi nếu bạn cần bất kỳ trợ giúp nào.
                        </p>
                        <div class="bor8 bg0 m-b-12 m-t-20">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state"
                                placeholder="Họ và tên">
                        </div>
                        <div class="bor8 bg0 m-b-12 m-t-2">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode"
                                placeholder="Số điện thoại">
                        </div>
                        <div class="bor8 bg0 m-b-12 m-t-2">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" name="postcode"
                                placeholder="Email">
                        </div>
                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-2">
                            <select class="js-select2" name="time">
                                <option>Miền Bắc</option>
                                <option>Miền Trung</option>
                                <option>Miền Nam</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <div class="bor8 bg0 m-b-12">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state"
                                placeholder="Địa chỉ">
                        </div>
                        <h4 class=" cl2 p-b-10 bor12">
                        </h4>
                        <div class="flex-w flex-t p-t-20 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Tổng số tiền:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    $79.65
                                </span>
                            </div>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Thanh toán ngay
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
