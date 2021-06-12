@extends('frontend.layouts.app')

@section('title')
Category | {{ $product->title }}
@endsection

@section('content')
@include('frontend.template.productSidebar')

<section class="breadcrumb">
  <div class="container mt-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
      </ol>
    </nav>
  </div>
</section>

<section class="product_detail">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">
        <div class="row">
          <div class="col-lg-12 col-md-10 col-sm-9">
            <div class="tab-content product_detail_img">
              @foreach(json_decode($product->image) as $key => $image)
                <img src="{{ asset("/storage/products/".$image) }}" class="tab-pane" id="{{ 'image'.$key }}">
              @endforeach
            </div>
          </div>
          <div class="col-lg-12 col-md-2 col-sm-3 thumb_h">
            <ul class="nav nav-tabs prod_img_thumbnail">
              @foreach(json_decode($product->image) as $key => $image)
              <li class="nav-item prod_img_thumb active">
                <img src="{{ asset("/storage/products/".$image) }}" width="100" href="#{{ 'image'.$key }}">
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12">
        <h3 class="product-title mt-0">
          {{ $product->title }}
        </h3>
        <h4 class="price mb-2">
          <span>₹&nbsp;{{ $product->price }}</span></h4>
<!-- {{--          <div class="d-flex">--}}
{{--            <div class="stars p-0 m-0">--}}
{{--              <span class="flaticon-star checked"></span>--}}
{{--              <span class="flaticon-star checked"></span>--}}
{{--              <span class="flaticon-star checked"></span>--}}
{{--              <span class="flaticon-star"></span>--}}
{{--              <span class="flaticon-star"></span>--}}
{{--            </div>--}}
{{--            <span class="review-no ml-3 pt-1">41 reviews</span>--}}
{{--          </div>--}}
{{--          <div class="row my-5">--}}
{{--            <div class="col-6">--}}
{{--              <p class="var_p">Color : Black</p>--}}
{{--              <div class="d-flex">--}}
{{--                <div class="var_slide">--}}
{{--                  <img src="/images/var1.webp" width="20" alt="" style="">--}}
{{--                </div>--}}
{{--                <div class="var_slide">--}}
{{--                  <img src="/images/var1.webp" width="20" alt="" style="">--}}
{{--                </div>--}}
{{--                <div class="var_slide">--}}
{{--                  <img src="/images/var1.webp" width="20" alt="" style="">--}}
{{--                </div>--}}
{{--                <div class="var_slide">--}}
{{--                  <img src="/images/var1.webp" width="20" alt="" style="">--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="col-6">--}}
{{--              <p class="var_p">Size</p>--}}
{{--              <div class="dropdown">--}}
{{--                <button class="dropbtn">Select a Size</button>--}}
{{--                <div class="dropdown-content">--}}
{{--                  <a href="#">Link 1</a>--}}
{{--                  <a href="#">Link 2</a>--}}
{{--                  <a href="#">Link 3</a>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}} -->



          <div id="accordion" class="accordion_prod my-5">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <span class="btn py-3 collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Description
                  </span>
                </h5>
              </div>

              <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  {!! $product->description !!}
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <span class="btn py-3 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Description
                  </span>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                  {!! $product->description !!}
                </div>
              </div>
            </div>
          </div>

          <div class="prodbtn">
            <span type="submit" onclick="openNav()" class="btn_prod">Choose Lens</span>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="slide_prod">
    <div class="container-fluid m-0 p-0">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="story_content swiper-slide">
            <div class="story_img">
              <img src="{{asset('/images/slide.jpg')}}">
            </div>
            <div class="story_slide_content">
              <p>Model is wearing The VANTZ in Ink in size 50.</p>
            </div>
          </div>
          <div class="story_content swiper-slide">
            <div class="story_img">
              <img src="{{asset('/images/slide.jpg')}}">
            </div>
            <div class="story_slide_content">
              <p>Model is wearing The VANTZ in Ink in size 50.</p>
            </div>
          </div>
          <div class="story_content swiper-slide">
            <div class="story_img">
              <img src="{{asset('/images/slide.jpg')}}">
            </div>
            <div class="story_slide_content">
              <p>Model is wearing The VANTZ in Ink in size 50.</p>
            </div>
          </div>
          <div class="story_content swiper-slide">
            <div class="story_img">
              <img src="{{asset('/images/slide.jpg')}}">
            </div>
            <div class="story_slide_content">
              <p>Model is wearing The VANTZ in Ink in size 50.</p>
            </div>
          </div>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </section>

  <section class="prod_background">
    <div class="container">
      <div class="row">
        <img src="/images/prodslide.jpg" alt="">
      </div>
    </div>
  </section>

  <section class="prod_review my-5">
    <div class="container">
      <div class="row">
        <div class="col-12 my-5">
          <h2 class="story_head">reviews</h2>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 mt-2">
          <div class="card review_prod">
            <div class="review_s_d">
              <ul>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
              </ul>
            </div>
            <div class="card-body my-0 py-0">
              <h5 class="card-title">Card title</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-2">
          <div class="card review_prod">
            <div class="review_s_d">
              <ul>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
              </ul>
            </div>
            <div class="card-body my-0 py-0">
              <h5 class="card-title">Card title</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-2">
          <div class="card review_prod">
            <div class="review_s_d">
              <ul>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
              </ul>
            </div>
            <div class="card-body my-0 py-0">
              <h5 class="card-title">Card title</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-2">
          <div class="card review_prod">
            <div class="review_s_d">
              <ul>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
                <li><i class="flaticon-star"></i></li>
              </ul>
            </div>
            <div class="card-body my-0 py-0">
              <h5 class="card-title">Card title</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="row m-auto">
          <div class="col-12">
            <div class="pagination">
              <a href="#">&laquo;</a>
              <a href="#">1</a>
              <a href="#" class="active">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <a href="#">6</a>
              <a href="#">&raquo;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="prod_banner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-5 col-lg-6 text-center my-2" id="bannerimg">
          <div class="banner_text m-5 px-4">
            <p class="card-text">"as the eyewear market becomes dominated by conglomerates or luxury brands..., MOSCOT is a rare and refreshing thing: a family-owned and -run affair."</p>
            <span class="mt-5">
              <div class="banner_title">
                <img src="/images/text.png" alt="">
              </div>
            </span>
          </div>
        </div>
        <div class="col-xl-7 col-lg-6 px-0" id="bannertext">
          <div class="banner_img">
            <img src="/images/banner2.webp" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('scripts')
<script>
$(document).ready(function(){
  $(".nav-tabs img").click(function(){
    $(this).tab('show');
  });
  $(".tab-content img:eq(0)").addClass('active');
});
</script>
<script type="text/javascript">
var swiper = new Swiper('.swiper-container', {
  slidesPerView: 1.1,
  centeredSlides: true,
  spaceBetween: 0,
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

var coll = document.getElementsByClassName("collapsed");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}
</script>
@endsection
