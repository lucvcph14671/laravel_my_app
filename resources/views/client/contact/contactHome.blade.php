@extends('clientMaster')
@section('title', 'Liên hệ với chúng tôi')
@section('content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92 m-t-80"
        style="background-image: url('{{ asset('img/photos/Contact_Us.jpg') }}');">
        <h2 class="ltext-105 cl0 txt-center">
            Liên hệ ngay
        </h2>
    </section>


    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form>
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Gửi tin nhắn
                        </h4>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                                placeholder="Địa chỉ Email của bạn">
                            <img class="how-pos4 pointer-none" src="{{ asset('client/images/icons/icon-email.png') }}"
                                alt="ICON">
                        </div>

                        <div class="bor8 m-b-30">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg"
                                placeholder="Chúng tôi có thể giúp gì cho bạn?"></textarea>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Gửi
                        </button>
                    </form>
                </div>

                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-map-marker"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Địa chỉ
                            </span>

                            <p class="stext-115 cl6 size-213 p-t-18">
                                Sông Khoai, Quảng Yên, Quảng Ninh, Việt Nam
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-phone-handset"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Số Điện Thoại
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                +84 9789 42425
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-envelope"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Email Hỗ Trợ
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                Vucongluc2002@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Map -->
    <div class="map">
        <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3584.593721979465!2d106.82147032386996!3d20.98216695005921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x47650bf7931a77de!2zMjDCsDU4JzU1LjgiTiAxMDbCsDQ5JzMzLjQiRQ!5e1!3m2!1svi!2s!4v1658549733729!5m2!1svi!2s"
        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    </div>

   
@endsection
