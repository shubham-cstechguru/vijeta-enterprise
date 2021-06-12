<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productvariant;
use App\Models\Productmirrors;
use App\Models\User;
use App\Models\EyeNumber;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('products')->get();
        $user = auth()->guard()->user('web')->id;
        $carts = Cart::with('products', 'mirror', 'productvariant')->where('user_id', $user)->get();
        foreach ($carts as $key => $c) {
          $price = Productmirrors::where('prod_var', $c->prod_var_id)->where('mirror_id', $c->mirror_id)->first();
          $c->price = $price->price;
        }
        $data = compact('categories', 'carts');
        return view('frontend.inc.cart', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $mirror = $request->input('mirror_id');
      $lense = $request->input('lense_id');
      $product_id = $request->input('product_id');
      $qty = $request->input('qty');
      $prod_var_id = $request->input('prod_var_id');

      $this->validate($request, [
        'rightspherical',
        'rightclyindrical',
        'rightaxis',
        'leftspherical',
        'leftclyindrical',
        'leftaxis'
      ]);

      if(auth()->guard()->user('web')){
        $cart = Cart::create([
          'mirror_id' => $mirror,
          'lense_id' => $lense,
          'product_id' => $product_id,
          'user_id' => auth()->guard()->user('web')->id,
          'qty' => $qty,
          'prod_var_id' => $prod_var_id
        ]);
        EyeNumber::create([
          'cart_id' => $cart->id,
          'rightspherical' => $request->rightspherical,
          'rightclyindrical' => $request->rightclyindrical,
          'rightaxis' => $request->rightaxis,
          'leftspherical' => $request->leftspherical,
          'leftclyindrical' =>  $request->leftclyindrical,
          'leftaxis' => $request->leftaxis
        ]);
      }
      return response()->json([
        'message' => 'Product Added Sucessfully'
      ]);
    // return redirect( route('home.cart.index') );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $id = $cart->delete();
        return response()->json([
        'message' => 'Product Deleted Sucessfully'
      ]);
    }
}
