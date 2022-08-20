@if (Session::has('Cart') != null)
@foreach (Session::get('Cart')->products as $cart)
<li class="header-cart-item flex-w flex-t m-b-12 delete-cart">
    <div class="header-cart-item-img" data-id="{{$cart['producInfo']->id}}">
        <img src="{{asset($cart['producInfo']->thumbnail)}}"
            alt="IMG" >
    </div>

    <div class="header-cart-item-txt p-t-8">
        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
            {{$cart['producInfo']->name}} 
        </a>
        
        <span class="header-cart-item-info">
            {{$cart['quantity']}} x {{number_format($cart['producInfo']->price)}} đ
        </span>
    </div>
    
</li>

@endforeach

<div class="header-cart-total w-full p-tb-40">
Tổng tiền: {{ number_format(Session::get('Cart')->totalPrice) }} đ
</div>
<input hidden id="number-quantity" type="number" value="{{Session::get('Cart')->totalQuantity}}">
@endif
    