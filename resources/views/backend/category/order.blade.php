<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.layouts.partials.css')

    <style type="text/css">
        .content-wrapper {
            background-color: rgb(32, 32, 32);
        }

        .table {
            margin: auto;
            width: 80px;
            text-align: center;
            margin-top: 10px;
        }

        tbl_dsn {
            width: 80px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('backend.layouts.partials._sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper" style="width:80%">
            <!-- partial:partials/_navbar.html -->
            @include('backend.layouts.partials._topbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <div class="col-md-8 card_header_title">
                            <i class="fab fa-gg-circle"></i> All Order Information
                        </div>
                        <div class="col-md-4 text-right card_header_btn">
                            <a class="btn btn-sm btn-dark" href=""><i class="fas fa-plus-circle"></i> Add
                                Order</a>
                        </div>
                        <div class="clr"></div>
                    </div>

                    <div style="padding-left:400px;padding-bottom:25px;">
                        <form action="{{ url('searchdata') }}" method="get">
                            <input type="text" name="search" placeholder="Search For Something">
                            <input type="submit" value="Search" class="btn btn-primary">
                        </form>
                    </div>



                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark">
                                        <thead class="thead-dark thead_dark">
                                            <tr>
                                                <th>send mail</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Product title</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Payment Status</th>
                                                <th>Delivery Status</th>
                                                <th class="print_none">Manage</th>
                                                <th>Delivered</th>
                                                <th>print pdf</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>
                                                        <a href="{{ url('send_email', $order->id) }}"
                                                            class="btn btn-primary">send
                                                            mail</a>
                                                    </td>
                                                    <td>{{ $order->name }}</td>
                                                    <td>{{ $order->email }}</td>
                                                    <td>{{ $order->address }}</td>
                                                    <td>{{ $order->phone }}</td>
                                                    <td>{{ $order->product_title }}</td>
                                                    <td>{{ $order->quantity }}</td>
                                                    <td>{{ $order->implode('price') }}</td>
                                                    <td>{{ $order->payment_status }}</td>
                                                    <td>{{ $order->delivery_status }}</td>
                                                    <td class="img_size" src="/uploads/product/{{ $order->image }}">
                                                        <img>

                                                    </td>

                                                    <td>
                                                        @if ($order->delivery_status == 'processing')
                                                            <a href="{{ url('delivered', $order->id) }}"
                                                                onclick="return confirm('Are you sure to deliver this product?')"
                                                                class="btn
                                                                btn-secondary">
                                                                Delivered
                                                            </a>
                                                        @else
                                                            <p>Delivered</p>
                                                        @endif
                                                    </td>
                                                    <td><a href="{{ url('print_pdf', $order->id) }}" type="button"
                                                            class="btn btn-secondary">print</a>

                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-description"> Add class <code>.table-dark</code>
                            </p>
                            <div class="table-responsive">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> First name </th>
                                            <th> Amount </th>
                                            <th> Deadline </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> 1 </td>
                                            <td> Herman Beck </td>
                                            <td> $ 77.99 </td>
                                            <td> May 15, 2015 </td>
                                        </tr>
                                        <tr>
                                            <td> 2 </td>
                                            <td> Messsy Adam </td>
                                            <td> $245.30 </td>
                                            <td> July 1, 2015 </td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td> John Richards </td>
                                            <td> $138.00 </td>
                                            <td> Apr 12, 2015 </td>
                                        </tr>
                                        <tr>
                                            <td> 4 </td>
                                            <td> Peter Meggik </td>
                                            <td> $ 77.99 </td>
                                            <td> May 15, 2015 </td>
                                        </tr>
                                        <tr>
                                            <td> 5 </td>
                                            <td> Edward </td>
                                            <td> $ 160.25 </td>
                                            <td> May 03, 2015 </td>
                                        </tr>
                                        <tr>
                                            <td> 6 </td>
                                            <td> John Doe </td>
                                            <td> $ 123.21 </td>
                                            <td> April 05, 2015 </td>
                                        </tr>
                                        <tr>
                                            <td> 7 </td>
                                            <td> Henry Tom </td>
                                            <td> $ 150.00 </td>
                                            <td> June 16, 2015 </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}



                <div class="card">
                    <div class="card-footer card_footer bg-dark ">
                        <div class="btn-group">
                            <a href="" class="btn btn-purple waves-effect" onclick="window.print()">Print</a>
                            <a href="{{ url('print_pdf', $order->id) }}" class="btn btn-primary waves-effect">PDF</a>
                            <a href="#" class="btn btn-pink waves-effect">Excel</a>
                            <a href="#" class="btn btn-success waves-effect">CSV</a>
                        </div>
                    </div>
                </div>

                <!-- page-body-wrapper ends -->
            </div>
            <!-- container-scroller -->
            @include('backend.layouts.partials.script')
        </div>
    </div>

    </div>
</body>

</html>
