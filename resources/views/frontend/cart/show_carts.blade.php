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

    <style type="text/css">
        .center {
            margin: auto;
            width: 70%;
            padding: 30px;
            text-align: center;
        }
    </style>
</head>


<body>

    @include('frontend.layouts.partials._topbar')

    @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button"class="close" data-dismiss="alert" aria-hidden="true">X</button>
            {{ session()->get('message') }}

        </div>
    @endif

    <div class="card-body card_body">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-12">
                <div class="col-md-2">

                </div>
                <div class="col-md-8 center">
                    <table id="allTableInfo" class="table table-striped table-bordered table-hover dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-dark thead_dark">
                            <tr>
                                <th>Product title</th>
                                <th>quantity</th>
                                <th>price</th>
                                <th>image</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalprice = 0; ?>
                            @foreach ($cart as $cart)
                                <tr>
                                    <td>{{ $cart->product_title }}</td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>{{ $cart->price }}</td>
                                    <td><img style="height:70px;" src="/uploads/product/{{ $cart->image }}"></td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn btn-dark waves-effect">Manage</button>
                                            <button type="button"
                                                class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="dropdown-item">View</a></li>
                                                <li><a href="#" class="dropdown-item">Edit</a></li>
                                                <li><a href="{{ url('delete_products/' . $cart->id) }}"
                                                        onclick="return confirm('Are You Sure To Delete This?')"
                                                        class="dropdown-item">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php $totalprice = $totalprice + $cart->price; ?>
                            @endforeach

                        </tbody>
                    </table>
                    <div>
                        <h1 style="font-size:20px; padding:30px;">Total Price: {{ $totalprice }}
                        </h1>
                    </div>

                    <div>

                        <h1 style="font-size:25px;paddin-bottom:15px;">Proceed to Order</h1>

                        <a href="{{ url('cash_order') }}" class="btn btn-danger">Cash On Delivery</a>
                        <a href="{{ url('stripe', $totalprice) }}" class="btn btn-danger">Pay Using Card</a>
                    </div>

                </div>
                <div class="col-md-2">

                </div>
            </div>
        </div>
    </div>



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
