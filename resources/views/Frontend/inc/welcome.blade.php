@extends('frontend.layouts.app')

@section('title', 'Home Page')

@section('content')

<section class="banner_area">
  <div class="slide_img">
    <img src="{{asset('/images/a1.jpg')}}" class="card-img" alt="...">
  </div>
  <div class="slide_btn d-flex">
    <span type="button" name="button">Shop Here&nbsp;&nbsp;<i class="flaticon-next mt-0 p-0"></i> </span>
  </div>
</section>
<!-- done -->
<section class="about m-0 p-0 m-md-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <div class="about_content mt-3 pt-2">
          <img src="{{asset('/images/2a.webp')}}" class="mobile_about_img d-block d-xs-block d-sm-block d-md-block d-lg-none d-xl-none" alt="">
          <img src="{{asset('/images/1a.webp')}}" class="mobile_about_img mob_abt my-4 d-block d-xs-block d-sm-block d-md-block d-lg-none d-xl-none" alt="">
          <div class="mob_abt">
            <h3 class="mb-3">
              Style & Fit
            </h3>
            <p class="">
              Size Matters. We determine size by the width of your face. With over 100 years of optical expertise, we know not every frame fits every face. MOSCOT offers multiple sizes so that you can find the right frame for your face.
            </p>
            <span class="mb-3">
              explore now
            </span>
          </div>
          <div class="about_cnt_img m-auto d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block">
            <div class="img_about mt-4">
              <img src="{{asset('/images/1ay.webp')}}" class="image_hover" alt="">
            </div>
            <div class="img_about mt-4">
              <img src="{{asset('images/1a.webp')}}" class="image" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="about_img d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block">

          <div class="img_about">
            <img src="{{asset('/images/2ay.webp')}}" class="img_hover" alt="">
          </div>
          <div class="img_about">
            <img src="{{asset('/images/2a.webp')}}" class="img" alt="">
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</section>
<!-- done -->
<section class="product mt-md-5">
  <div class="container mt-5">
    <div class="d-flex row justify-content-center mt-5">
      <img class="mr-4 pr-4" height="27" src="{{asset('/images/finger-left.webp')}}"><h4 class="text-center prod_title">timeless style</h4><img class="ml-4 pl-4" height="27" src="{{asset('/images/finger-right.webp')}}">
    </div>
    <div class="container m-auto">
      <div class="row">
        <div class="swiper-container">
          <div class="swiper-wrapper">
            @foreach($products as $product)
            <div class="product_card swiper-slide" style="">
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
                  <a href="{{ route('home.product.product', $product->slug) }}">
                    <h5 class="card-title" style="">{{ $product->title }}</h5>
                  </a>
                  <a href="{{ route('home.product.category', $product->category->slug) }}">
                    <p class="card-text" style=""><small class="text-muted">{{ $product->category->title }}</small></p>
                  </a>
                  <div class="var_prod" style="">
                    <div class="var_slide">
                        <h5 class="card-title" style="">₹&nbsp;{{ $product->price }}</h5>
                        {{--                      <img src="{{asset('/images/var1.webp')}}" width="20" alt="" style="">--}}
                    </div>
                  </div>
{{--                      <p class="card-text" style=""><small class="text-muted"></small></p>--}}
{{--                      <div class="prod_btn d-flex flex-wrap justify-content-between">--}}
{{--                    <a href="#" class="btn" style="" >Go somewhere</a>--}}
{{--                    <a href="#" class="btn" style="" >Go somewhere</a>--}}
{{--                    <a href="#" class="btn" style="" >Go somewhere</a>--}}
{{--                    <a href="#" class="btn" style="" >Go somewhere</a>--}}
{{--                  </div>--}}
                  <p class="card-text" style=""><small class="text-muted">{!! $product->description !!}</small></p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- done -->
<section class="parallax">
  <div class="parallax-inner">
    <div class="container testimonials">
      <div class="col-12 justify-content-center">
        <div class="client">
          <div class="client_member">
            <p>"Paragraph. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id suscipit ex. Suspendisse rhoncus"</p>
            <h3>Customer Name</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- done -->
<section class="blogs">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" id="blogcontent">
        <div class="blog_card">
          <div class="card">
            <img class="card-img-top blog_img" src="{{asset('/images/blog.jpg')}}" alt="Card image cap">
            <div class="card-body m-0 p-0">
              <p class="card-text mt-3"><small class="text-muted">good stuff</small></p>
              <h4 class="card-title">polarized sunglasses</h4>
              <p class="card-text">MOSCOT Polarized Sunglasses block harmful ultraviolet (UV) rays with our Mineral Glass lenses while eliminating harsh glare making them great for winter snow conditions and waterfront activities!</p>
              <span class="mb-3">
                Read More
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" id="blogcontent">
        <div class="blog_card">
          <div class="card">
            <img class="card-img-top blog_img" src="{{asset('/images/blog1.jpg')}}" alt="Card image cap">
            <div class="card-body m-0 p-0">
              <p class="card-text mt-3"><small class="text-muted">good stuff</small></p>
              <h4 class="card-title">Discover the Inspiration Behind the Fall 2020 Collection</h4>
              <p class="card-text">Go behind the lens with 5th Generation and Chief Design Officer, Zack Moscot as he shares his inspiration behind the Fall 2020 Collection!</p>
              <span class="mb-3">
                Read More
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 m-sm-0 p-sm-0" id="blogtitle">
        <div class="image_blog d-flex">
          <img src="{{asset('/images/blog.webp')}}" alt="" class="card-img img-responsive">
          <div class="card-img-overlay text-dark text-center blog_background">
            <div class="card-body mx-2">
              <p class="card-text blog_title mt-3">our story</p>
              <span class="">
                <img src="{{asset('/images/img.png')}}" alt="" class="blog_title_img">
              </span>
              <h4 class="card-title">106+ years of family</h4>
              <p class="card-text">Go behind the lens with 5th Generation and Chief Design Officer, Zack Moscot as he shares his inspiration behind the Fall 2020 Collection!</p>
              <span class="mb-3">
                Read More
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- done -->
<section class="gallery mt-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 col-md-3 col-sm-3 col-6 m-0 p-0">
        <div class="gallery_item">
          <img src="{{asset('/images/gallery1.jpg')}}" class="gallery_img" alt="">
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-3 col-6 m-0 p-0">
        <div class="gallery_item">
          <img src="{{asset('/images/gallery2.jpg')}}" class="gallery_img" alt="">
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 m-0 p-0">
        <div class="gallery_title my-auto">
          <h4 class="card-title">#moscotmoments</h4>
          <p class="card-text">shop the looks</p>
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-3 col-6 m-0 p-0">
        <div class="gallery_item">
          <img src="{{asset('/images/gallery3.jpg')}}" class="gallery_img" alt="">
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-3 col-6 m-0 p-0">
        <div class="gallery_item">
          <img src="{{asset('/images/gallery4.jpg')}}" class="gallery_img" alt="">
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-3 col-6 m-0 p-0">
        <div class="gallery_item">
          <img src="{{asset('/images/gallery5.jpg')}}" class="gallery_img" alt="">
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-3 col-6 m-0 p-0">
        <div class="gallery_item">
          <img src="{{asset('/images/gallery6.jpg')}}" class="gallery_img" alt="">
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-3 col-6 m-0 p-0">
        <div class="gallery_item">
          <img src="{{asset('/images/gallery7.jpg')}}" class="gallery_img" alt="">
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-3 col-6 m-0 p-0">
        <div class="gallery_item">
          <img src="{{asset('/images/gallery8.jpg')}}" class="gallery_img" alt="">
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-3 col-6 m-0 p-0">
        <div class="gallery_item">
          <img src="{{asset('/images/gallery9.jpg')}}" class="gallery_img" alt="">
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-3 col-6 m-0 p-0">
        <div class="gallery_item">
          <img src="{{asset('/images/gallery10.jpg')}}" class="gallery_img" alt="">
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

var swiper = new Swiper('.swiper-container', {
  slidesPerView: 1,
  spaceBetween: 10,
  // init: false,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 0,
    },
    480: {
      slidesPerView: 1.2,
      spaceBetween: 0,
    },
    770: {
      slidesPerView: 1.7,
      spaceBetween: 0,
    },
    990: {
      slidesPerView: 2.5,
      spaceBetween: 0,
    },
    1190: {
      slidesPerView: 3,
      spaceBetween: 0,
    },
  }
});
</script>
@endsection
