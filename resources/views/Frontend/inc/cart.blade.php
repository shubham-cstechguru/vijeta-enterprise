@extends('frontend.layouts.app')

@section('title')
Cart
@endsection

@section('content')
<div class="container">
  <div class="cart">
    <h2 class="title">your cart</h2>
    <div class="c-form">
      <div class="w100">
        <div class="cart_header">
          <div class="cart_header_item card_item_pos1 h5">
            Item
          </div>
          <div class="cart_header_item card_item_pos2 h5">
            Price
          </div>
          <div class="cart_header_item card_item_pos3 h5">
            Quantity
          </div>
          <div class="cart_header_item card_item_pos4 h5">
            Total
          </div>
        </div>
        <div class="cart_body">
          @php
          $total = 0;
          $n_total = 0;
          @endphp
          @foreach($carts as $cart)

          <div class="cart_item_container cart_body_item cart_item">
            <a href="" class="cart_item_img_container">
              <div class="img">
                <img src="{{ asset('/storage/products/a1.jpg')}}" alt="" class="img_element">
              </div>
            </a>
            <div class="cart_item_main">
              <div class="cart_item_desc_inner">
                <a href="#">
                  <h4 class="h5">{{ $cart->products->title  }}</h4>
                  @if($cart->lense->title ?? '' !='')
                  <p class="cart_item_details">{{ $cart->lense->title ?? '' }}</p>
                  @else
                  @endif
                  @if($cart->mirror->title ?? '' !='')
                  <p class="cart_item_details">{{ $cart->mirror->title ?? '' }}</p>
                  @else
                  @endif
                </a>
              </div>
              <div class="cart_item_price">
                <p>₹&nbsp;{{ $cart->products->price }}</p>
                @if($cart->mirror->productmirrors->price ?? '' !='')
                <p class="cart_item_details">{{ $cart->price ?? '' }}</p>
                @else
                @endif
              </div>
              <div class="cart_item_qty">
                <div class="qty_select">
                  <button type="button" name="button" class="qty_selector">
                    <span>-</span>
                  </button>
                  <input type="number" name="qty" class="qty_selector_field" value="{{ $cart->qty }}" min="1" disabled>
                  <button type="button" name="button" class="qty_selector">
                    <span>+</span>
                  </button>
                </div>
                <div class="">
                  <a tabindex="0" class="cart_item_remove inline-block" data-url="{{ route('home.cart.destroy', $cart->id) }}" data-id="{{$cart->id}}" id="remove_item">Remove</a>
                </div>
              </div>
            </div>
            @php
            $total = ( $cart->qty * $cart->products->price);
            @endphp
            <div class="cart_item_total">
              <p>₹&nbsp;{{ $total }}</p>
            </div>
          </div>
         @php
            $n_total = $n_total + $total;
         @endphp
          @endforeach
        </div>
        <div class="card_footer">
          <div class="cart_total">
            <div class="cart_total_amt">
              <p class="h5">Cart Total</p>

              <h3 class="h3">₹&nbsp;{{ $n_total }}</h3>
            </div>
            <p class="cart_total_other">Shipping & taxes calculated at checkout</p>
            <div>
              <input type="submit" class="c-btn" value="Checkout" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
