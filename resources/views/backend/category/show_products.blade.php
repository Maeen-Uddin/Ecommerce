<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.layouts.partials.css')

    <style type="text/css">
        .content-wrapper {
            background-color: rgb(29, 29, 29);
        }

        .btn_all {
            text-align: center;
            margin: auto;
        }

        .center {
            margin: auto;
            width: 90%;
            text-align: center;
            margin-top: 10px;
        }

        .img_size {
            width: 80px;
            height: 80px;
        }

        .th_color {
            background: rgb(71, 71, 71);
        }

        .th_deg {
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('backend.layouts.partials._sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('backend.layouts.partials._topbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @if (session()->has('msg'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" area-hidden="true">X</button>
                            {{ session()->get('msg') }}
                        </div>
                    @endif

                    <h2 class="btn_all">All Products</h2>
                    <table class=" table table-bordered table-striped center">
                        <tr class="th_color">
                            <th class="th_deg">Product title</th>
                            <th class="th_deg">Description</th>
                            <th class="th_deg">Quantity</th>
                            <th class="th_deg">Category</th>
                            <th class="th_deg">Price</th>
                            <th class="th_deg">Discount Price</th>
                            <th class="th_deg">Product Image</th>
                            <th class="th_deg">Delete</th>
                            <th class="th_deg">Edit</th>
                        </tr>
                        @foreach ($product as $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->implode('price') }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td>
                                    <img class="img_size" src="{{ asset('uploads/product/' . $product->image) }}">
                                </td>
                                <td>
                                    <a class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete this product?')"
                                        href="{{ url('delete_products', $product->id) }}">Delete</a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ url('edit_products', $product->id) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{-- {{$Product->links() }} --}}
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('backend.layouts.partials.script')
</body>

</html>
