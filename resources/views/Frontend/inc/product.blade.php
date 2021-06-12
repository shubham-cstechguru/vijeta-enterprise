@extends('frontend.layouts.app')

@section('title')
Category | {{ $category_id->title }}
@endsection

@section('content')

<section class="inner_banner">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-5 col-lg-6 text-center" id="bannerimg">
        <div class="banner_title m-5 p-4">
          <h3>{{ $category_id->title }}</h3>
        </div>
        <div class="banner_text m-5 px-4">
          <p class="card-text">{{ $category_id->description }}</p>
          <span class="my-4">
            Read More
          </span>
        </div>
      </div>
      <div class="col-xl-7 col-lg-6 px-0" id="bannertext">
        <div class="banner_img">
          <img src="{{asset('/storage/categories/'.$category_id->image)}}" alt="">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="eyeglass_page">
  <div class="container-fluid ">
    <div class="row">
<!-- {{--      <div class="col-lg-2">--}}
{{--        @include('frontend.template.productSidebar')--}}
{{--      </div>--}}

      <div class="col-lg-12">
        <div class="top_btn d-flex justify-content-between">
{{--          <div class="filterbtn">--}}
{{--            <button class="dropbtn" onclick="openNav()">&#9776; Filter & Category</button>--}}
{{--          </div>--}} -->
          <div class="dropdown">
            <button class="dropbtn">Sort</button>
            <div class="dropdown-content">
              <a href="#">Reommended</a>
              <a href="#">By Price</a>
              <a href="#">Title Ascending</a>
                <a href="#">Title Descending</a>
            </div>
          </div>

        </div>
        <hr />
        <div class="product">
          <div class="row">
            @foreach($products as $key => $product)
            <div class="col-lg-4 col-md-4 col-sm-6">
              <div class="card text-center prod_card" style="">
                <div class="swiper-container-img">
                  <div class="swiper-wrapper">
                    @foreach(json_decode($product->image) as $image)
                    <div class="swiper-slide">
                      <div class="slider-image">
                        <img src="{{ asset("/storage/products/".$image) }}" class="card-img-top prod_img" alt="..." style="">
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
                </div>
                <div class="card-body mx-0 px-0">
                  <a href="{{ route('home.product.product', $product->slug ) }}">
                    <h5 class="card-title" style="">{{ $product->title }}</h5>
                  </a>
                  <a href="{{ route('home.product.category', $product->category->slug ) }}">
                    <p class="card-text" style=""><small class="text-muted">{{ $product->category->title }}</small></p>
                  </a>
                  <div class="var_prod" style="">
                    <div class="var_slide">
                        <h5 class="card-title" style="">₹&nbsp;{{ $product->price }}</h5>
{{--                      <img src="/images/var1.webp" width="20" alt="" style="">--}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="row">
            <div class="slide_btn d-flex">
              <span type="button" name="button">Show All&nbsp;&nbsp;<i class="flaticon-next mt-0 p-0"></i> </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection('content')

@section('scripts')
<script type="text/javascript">
var swiper = new Swiper('.swiper-container-img', {
    effect: 'flip',
    grabCursor: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
</script>
@endsection
