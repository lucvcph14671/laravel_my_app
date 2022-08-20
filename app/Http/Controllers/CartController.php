<?php

namespace App\Http\Controllers;

use App\Http\Requests\OderRequest;
use App\Models\Oder;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class cart
{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($cart)
    {
        if ($cart) {
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }

    public function addCart($product, $id)
    {
        $newProduct = [
            'id' => $product->id,
            'quantity' => 0,
            'price' => $product->price,
            'producInfo' => $product,
        ];

        if ($this->products) {

            if (array_key_exists($id, $this->products)) {

                $newProduct = $this->products[$id];
            }
        }

        $newProduct['quantity']++;
        $newProduct['price'] = $newProduct['quantity'] * $product->price;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->price;
        $this->totalQuantity++;
    }

    public function deleteCart($id)
    {
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

    public function updateCart($id, $quatity)
    {
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];

        $this->products[$id]['quantity'] = $quatity;
        $this->products[$id]['price'] = $this->products[$id]['price'];

        $this->totalQuantity += $this->products[$id]['quantity'];
        $this->totalPrice += $this->products[$id]['price'];
    }
}

class CartController extends Controller
{
    public function updateQuantity(Request $request)
    {

        //  dd(Session('Cart')->products);
        foreach (Session('Cart')->products as $key => $item) {

            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new cart($oldCart);
            $newCart->updateCart($item['id'], $request->$key);
            $request->Session()->put('Cart', $newCart);
        }

        return redirect()->back();
    }
    public function oder(OderRequest $request)
    {
        // dd(Session('Cart')->products);
        // dd($request);

        if (Auth::check()) {

            foreach(Session('Cart')->products as $key => $item)
            {
                $oder = new Oder();
                $oder->id_user = Auth::user()->id;
                $oder->name = $request->name;
                $oder->phone = $request->phone;
                $oder->email = $request->email;
                $oder->district = $request->district;
                $oder->address = $request->address;
                $oder->size = $request->size;
                $oder->color = $request->color;
                $oder->num_product = $item['quantity'];
                $oder->id_product = $item['id'];
                $oder->totalPrice = $item['quantity'] * $item['price'];
    
                $oder->save();

                Mail::send('client.contact.contact',[
                    'name' => $request->name,
                    'msg' => $oder,
                ],
                function($mail){
                    $mail->subject('Đơn hàng của bạn');
                    $mail->to(Auth::user()->email,  Auth::user()->name);
                });
            }
           

            return redirect()->back()->with('error', 'Thanh toán thành công !');
        } else {

            return redirect()->back()->with('error', 'Vui lòng đăng nhập !');
        }
    }

    public function addCart(Request $request, $id)
    {

        $product = Product::where('id', $id)->first();
        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new cart($oldCart);
            $newCart->addCart($product, $id);
            $request->Session()->put('Cart', $newCart);
            // dd($newCart);
        }
        return view('client.cart.cart', []);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        // Trang giỏ hàng
        return view('client.cart.detailCart', [

            'colors' => ProductDetail::where('type', 'color')->get(),
            'sizes' => ProductDetail::where('type', 'size')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteCart(Request $request, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new cart($oldCart);
        $newCart->deleteCart($id);

        if (count($newCart->products) > 0) {
            $request->Session()->put('Cart', $newCart);
        } else {
            $request->Session()->forget('Cart');
        }

        return view('client.cart.cart', []);
    }

    public function deleteListCart(Request $request, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new cart($oldCart);
        $newCart->deleteCart($id);

        if (count($newCart->products) > 0) {
            $request->Session()->put('Cart', $newCart);
        } else {
            $request->Session()->forget('Cart');
        }

        return redirect()->back();
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
