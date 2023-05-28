<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('assets/frontend') }}/images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="{{ asset('assets/frontend') }}/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/frontend') }}/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('assets/frontend') }}/css/responsive.css" rel="stylesheet" />


    <style>
        .img_size {
            height: 250px;
            width: 150px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('frontend.layouts.partials._topbar')
        <!-- end header section -->
        <!-- slider section -->
        @include('frontend.layouts.partials._slider')
        <!-- end slider section -->
    </div>
    @yield('content')

    {{-- proudcts starts --}}
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our <span>products</span>
                </h2>
            </div>
        <div class="row">
            @foreach ($product as $products)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{url('product_details',$products->id)}}" class="option1">
                                    Product Details
                                </a>
                                <form action="{{url('add_cart',$products->id)}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="number" name="quantity" value="1" min="1" style="width:70px;">

                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" value="Add To Cart" class="fa fa-cart">

                                        </div>
                                    </div>

                                </form>
                            </div>
                            </div>
                            <div class="img-box">
                                <img class="img_size" src="/uploads/product/{{ $products->image }}">
                            </div>

                            <div class="detail-box">
                                <h5>
                                    {{ $products->title }}
                                </h5>
                                @if ($products->discount_price!=null)

                                <h6>Discount Price<br>
                                    ${{ $products->discount_price }}
                                </h6>

                                <h6 style="text-decoration: line-through;color:red;">Price<br>
                                    ${{ $products->price }}
                                </h6>

                                @else

                                <h6 style="color:green;">Price<br>
                                    ${{$products->price}}
                                </h6>

                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            <span style="padding-top:20px;">
                {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
            </span>
            </div>

        </div>
    </section>

    {{-- products end --}}
    <!-- footer start -->
    @include('frontend.layouts.partials._footer')
    <!-- footer end -->
    <!-- jQery -->
    <script src="{{ asset('assets/frontend') }}/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="{{ asset('assets/frontend') }}/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('assets/frontend') }}/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="{{ asset('assets/frontend') }}/js/custom.js"></script>
</body>

</html>
