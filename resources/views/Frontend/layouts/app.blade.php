<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
  <title>MOSCOT - @yield('title')</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Font -->
  {{ Html::style('font/flaticon.css') }}

  <!--Bootstrap-->
  {{ Html::style('css/bootstrap.min.css') }}

  <!-- Slider -->
  {{ Html::style('css/swiper-bundle.css') }}
  {{ Html::style('css/swiper-bundle.min.css') }}

  <!--Style-->
  {{ Html::style('css/style.css') }}
  {{ Html::style('css/responsive.css') }}

</head>
<body>
  <section class="header_section">
    <header class="header_1">
      <div class="container-fluid top_banner">
        <div class="row mx-5 d-flex justify-content-between">
          <div class="col-xl-4 col-lg-6 col-xs-6 col-sm-6 col-md-6">
            <p class="header_p m-0">
              <i class="flaticon-plane"></i>&nbsp;free worldwide shipping&nbsp;
            </p>
          </div>
          <div class="col-xl-4 logo_img">
            <div class="">
              <img src="{{asset('/images/social-image.jpg')}}" alt="" class="img-responsive logo__img">
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-xs-6 col-sm-6 col-md-6">
            <div class="d-flex justify-content-end header_p">
              <div class="dropdown m-0 p-0">
                <span class="dropdown-toggle drop_font" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Mexico
                </span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
              <p class="header_log m-0 pl-3">
                @if(isset(auth()->guard()->user('web')->name))
                <a href="{{ route('home.logout') }}">{{ auth()->guard()->user('web')->name }}</a>
                @else
                <a href="{{ route('home.login') }}">Login</a>
                @endif
              </p>
              <span class="mob_head">
                <i class="flaticon-search"></i>
              </span>
              <span class="mob_head">
                @if(isset(auth()->guard()->user('web')->name))
                <a href="{{ route('home.cart.index') }}"><i class="flaticon-shopping-cart"></i>
                @else
                <a href="{{ route('home.login') }}"><i class="flaticon-shopping-cart"></i>
                @endif
                </a>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid nav_1 m-0 p-0">
        <nav class="navbar navbar-expand-xl mx-0 px-0" >
          <button class="navbar-toggler ml-5" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="flaticon-list"></span>
          </button>
          <a class="ml-5 navbar-brand logo_mob hidden" href="{{ url('/') }}">
            MOSCOT
          </a>


          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              @foreach($categories as $category)
              <li class="nav-item active hover_m">
                <a class="nav-link" href="{{ route('home.product.category', $category->slug ) }}">
                  {{ $category->title }}
                </a>
                <div class="nav_dropdown hover_m_i">
                  <div class="row ml-2">
                    @php
                    $p = $category->products;
                    @endphp
                    @foreach($p as $key => $product)
                    @if($key != 3)
                    <div class="col-lg-3">
                      <div class="menu_1">
                        <div class="menu_img">
                          <img src="{{ asset('/storage/products/'.json_decode($product->image)[0]) }}" width="180" alt="">
                        </div>
                        <div class="menu_item ml-5">
                          <div class="card-body m-0 p-0">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <span class="mb-3">
                              <a href="{{ route('home.product.product', $product->slug ) }}">shop now</a>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach
                    <div class="col-lg-2">
                      <div class="menu_2">
                        <div class="menu_img_2">
                          <img src="{{asset('/images/menu3.gif')}}" alt="">
                        </div>
                        <div class="menu_item_2">
                          <span class="mb-3">
                            <a href="{{ route('home.product.category', $category->slug ) }}">shop all optical</a>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              @endforeach

              <li class="nav-item hover_m">
                <a class="nav-link" href="#">
                  story
                </a>
                <div class="nav_dropdown hover_m_i">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="menu_1">
                        <div class="menu_img">
                          <img src="{{asset('/images/menu1.png')}}" width="180" alt="">
                        </div>
                        <div class="menu_item">
                          <div class="card-body m-0 p-0">
                            <h5 class="card-title">Moscot Orignals</h5>
                            <p class="card-text">Based on styles from the Moscot family archives celebrating timeless design born in decades past.</p>
                            <span class="mb-3">
                              <a href="{{ url('product') }}">shop now</a>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="menu_1">
                        <div class="menu_img">
                          <img src="{{asset('/images/menu1.png')}}" width="180" alt="">
                        </div>
                        <div class="menu_item">
                          <div class="card-body m-0 p-0">
                            <h5 class="card-title">Moscot Orignals</h5>
                            <p class="card-text">Based on styles from the Moscot family archives celebrating timeless design born in decades past.</p>
                            <span class="mb-3">
                              <a href="{{ url('product') }}">shop now</a>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="menu_2">
                        <div class="menu_img_2">
                          <img src="{{asset('/images/menu3.gif')}}" alt="">
                        </div>
                        <div class="menu_item_2">
                          <span class="mb-3">
                            <a href="{{ url('product') }}">shop all optical</a>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item hover_m">
                <a class="nav-link" href="#">
                  shops
                </a>
                <div class="nav_dropdown hover_m_i">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="menu_1">
                        <div class="menu_img">
                          <img src="{{asset('/images/menu1.png')}}" width="180" alt="">
                        </div>
                        <div class="menu_item">
                          <div class="card-body m-0 p-0">
                            <h5 class="card-title">Moscot Orignals</h5>
                            <p class="card-text">Based on styles from the Moscot family archives celebrating timeless design born in decades past.</p>
                            <span class="mb-3">
                              <a href="#">shop now</a>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="menu_1">
                        <div class="menu_img">
                          <img src="{{asset('/images/menu1.png')}}" width="180" alt="">
                        </div>
                        <div class="menu_item">
                          <div class="card-body m-0 p-0">
                            <h5 class="card-title">Moscot Orignals</h5>
                            <p class="card-text">Based on styles from the Moscot family archives celebrating timeless design born in decades past.</p>
                            <span class="mb-3">
                              <a href="#">shop now</a>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="menu_2">
                        <div class="menu_img_2">
                          <img src="{{asset('/images/menu3.gif')}}" alt="">
                        </div>
                        <div class="menu_item_2">
                          <span class="mb-3">
                            <a href="#">shop all optical</a>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>

          <div class="d-flex nav_drop mr-5 pr-3">
            <div class="dropdown mob_head hidden m-0 p-0">
              <span class="dropdown-toggle drop_font" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Mexico
              </span>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
            <p class="header_log mob_head hidden m-0 pl-3">
              @if(isset(auth()->guard()->user('web')->name))
              <!-- <a href="{{ route('home.logout') }}">Logout</a> -->
              <a href="{{ route('home.logout') }}">{{ auth()->guard()->user('web')->name }}</a>
              @else
              <a href="{{ route('home.login') }}">Login</a>
              @endif
            </p>
            <span class="hidden">
              <i class="flaticon-search"></i>
            </span>
            <span class="hidden" role="button">
              <a href="{{ route('home.cart.index') }}"><i class="flaticon-shopping-cart"></i></a>
            </span>
          </div>
        </nav>
        <input type="text" class="myInput" onkeyup="myFunction()" placeholder="Search here..">
      </div>
    </header>
  </section>

  @yield('content')

  <!-- done -->
  <footer class="footer">
    <div class="Newsletter">
      <div class="container">
        <div class="row news">
          <div class="col-lg-2 text_n">
            <h2>Join The Family</h2>
          </div>
          <div class="col-lg-5 text_news">
            Enjoy 10% off your first online purchase and stay up to date on all things MOSCOT.
          </div>
          <div class="col-lg-5">
            <form action="#" class="mt-2">
              <div class="form-group d-flex">
                <input type="text" class="form-control input" placeholder="Enter email">
                <input type="submit" value="Subscribe" class="submit px-3 form_btn">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_main">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 footer_list">
            <div class="container-fluid">
              <div class="row">
                <div class="clearfix col-lg-4 col-4">
                  <div class="list">
                    <h2 class="text-left fhead">Company</h2>
                    <ul>
                      <li><a href="#">Our story         </a></li>
                      <li><a href="#">our Locations         </a></li>
                      <li><a href="#">Eye care     </a></li>
                      <li><a href="#">Charity       </a></li>
                      <li><a href="#">EU Wholesale       </a></li>
                    </ul>
                  </div>
                </div>
                <div class="clearfix col-lg-4 col-4">
                  <div class="list">
                    <h2 class="text-left fhead">Brand</h2>
                    <ul>
                      <li><a href="#">style & Fit           </a></li>
                      <li><a href="#">craftmanship          </a></li>
                      <li><a href="#">reviews     </a></li>
                      <li><a href="#">Blog      </a></li>
                      <li><a href="#">Press     </a></li>
                    </ul>
                  </div>
                </div>
                <div class="clearfix col-lg-4 col-4">
                  <div class="list">
                    <h2 class="text-left fhead">Help</h2>
                    <ul>
                      <li><a href="#">Shipping & return            </a></li>
                      <li><a href="#">warranty    </a></li>
                      <li><a href="#">career     </a></li>
                      <li><a href="#">faq       </a></li>
                      <li><a href="#">sitemap       </a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 text-center footer_contact">
            <div class="float-right mx-5">
              <h4 class="contact_h4">Ask a Moscot Frame Fit Specialist</h4>
              <p class="contact_p">Whether you’re a MOSCOT collector or visiting for the very first time, we’re here to assist!</p>
              <div class="contact_info">
                <div class="call mx-3">
                  <span>
                    <i class="flaticon-phone"></i>
                    <p>+91 000 000 0000</p>
                  </span>
                </div>
                <div class="mail mx-3">
                  <span>
                    <i class="flaticon-mail"></i>
                    <p>info@company.com</p>
                  </span>
                </div>
                <div class="chat mx-3">
                  <span>
                    <i class="flaticon-speech-bubble"></i>
                    <p>chat with Us</p>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row pt-5 footer_copy mx-5">
          <div class="col-12 d-flex justify-content-center">
            <span class="size">
              <i class="flaticon-facebook"></i>
              <i class="flaticon-instagram"></i>
              <i class="flaticon-linkedin"></i>
              <i class="flaticon-twitter"></i>
            </span>
          </div>
          <div class="col-md-12 mt-3 py-2">
            <p class="text-center">Copyright © 2020 All rights reserved Under MOSCOT | This Website is made with by Suncity Group</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  {{ Html::script('js/jquery-3.5.1.slim.min.js') }}
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
  {{ Html::script('js/jquery-3.5.1.js') }}
  {{ Html::script('js/bootstrap.bundle.min.js') }}
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script> -->
  {{ Html::script('js/swiper-bundle.js') }}
  <!-- <script src="https://unpkg.com/swiper/swiper-bundle.js"></script> -->
  {{ Html::script('js/swiper-bundle.min.js') }}
  <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
  {{ Html::script('js/script.js') }}

<script type="text/javascript">
$(document).ready(function() {

$(".flaticon-search").click(function() {
   $(".myInput").toggle();
 });

});
</script>
  @yield('scripts')

</body>
</html>
