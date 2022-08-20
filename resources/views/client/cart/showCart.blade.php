<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Giỏ hàng của bạn
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full" id="data-cart">
                @if (Session::has('Cart') != null)
                    @foreach (Session::get('Cart')->products as $cart)
                        <li class="header-cart-item flex-w flex-t m-b-12 delete-cart">
                            <div class="header-cart-item-img" data-id="{{ $cart['producInfo']->id }}">
                                <img src="{{ asset($cart['producInfo']->thumbnail) }}" alt="IMG">
                            </div>

                            <div class="header-cart-item-txt p-t-8">
                                <a href="{{route('san-pham-chi-tiet',$cart['producInfo']->id)}}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                    {{ $cart['producInfo']->name }}
                                </a>

                                <span class="header-cart-item-info">
                                    {{ $cart['quantity'] }} x {{ number_format($cart['producInfo']->price) }} đ
                                </span>
                            </div>

                        </li>
                    @endforeach

                    <div class="header-cart-total w-full p-tb-40">
                        Tổng tiền: {{ number_format(Session::get('Cart')->totalPrice) }} đ
                    </div>
                @endif

            </ul>

            <div class="w-full">

                <div class="header-cart-buttons flex-w w-full">
                    <a href="{{route('gio-hang')}}"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        Xem giỏ hàng
                    </a>

                    <a href="shoping-cart.html"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Thanh toán
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
