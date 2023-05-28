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


    <style type="text\css">
        .center {
            margin: auto;
            width: 70px;
            padding: 30px;
            text-align: center;
        }

        table {
            width: 70%;
        }
    </style>
</head>

<body>
    <div class="hero_area">

        <!-- header section strats -->
        @include('frontend.layouts.partials._topbar')
        <!-- end header section -->
        <!-- slider section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="col-md-8" style="margin-left:250px; padding-top:30px;">
                    <div style="margin-left:30px;">
                        <table class="table table-bordered table stripped table-hover">
                            <thead class="thead-dark thead_dark">
                                <tr>
                                    <th>Product Title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Payment Status</th>
                                    <th>Delivery Status</th>
                                    <th>Image</th>
                                    <th>Cancel Order</th>
                                </tr>
                            </thead>
                            @foreach ($order as $order)
                                <tr>
                                    <td>{{ $order->product_title }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>{{ $order->delivery_status }}</td>
                                    <td><img height="90" width="80" src="uploads/product/{{ $order->image }}">
                                    </td>
                                    <td>
                                        @if ($order->delivery_status == 'processing')
                                            <a onclick="return confirm('Are you sure to cancel this order?') "
                                                class="btn btn-danger"
                                                href="{{ url('cancel_order', $order->id) }}">Cancel
                                                Order</a>
                                        @else
                                            <p style="color:blue; margin-top:40px;">Not Allowed</p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
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
