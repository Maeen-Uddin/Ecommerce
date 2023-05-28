<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.layouts.partials.css')

    <style type="text/css">
        .content-wrapper {
            background-color: rgb(29, 29, 29);
        }

        .div_center {
            text-align: center;
            padding-top: 20px;
        }

        .h2_font {
            font-size: 40px;

        }

        .btn_all {
            margin-bottom: 5%;
        }

        .text_color {
            margin-right: 2%;
            text: white;
        }

        label {
            display: inline-block;
            width: 200px;
        }


        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
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
                <div class="content-wrapper" style="background-color:rgb(35, 34, 34);">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    {{-- <div class="div_center">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header ">
                                        <div class="row">
                                            <span>
                                                <h2 class="h2_font pt-4" style="margin-right: 10%">Add Products</h2>
                                                <button class="btn btn-success btn_all"
                                                    href="{{ url('/backend/category/show_products') }}">All
                                                    Products</button>
                                            </span>
                                            <form method="POST" action="{{ url('/add_products') }}"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="card-body">
                                                    <div class="card-row">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-10">

                                                            <div>
                                                                <label class="text_color">Product <Title></Title>
                                                                </label>
                                                                <input type="text" name="title"
                                                                    placeholder="Write A Title" required="">
                                                            </div>

                                                            <div>
                                                                <label class="text_color">Product Description</label>
                                                                <input type="text" name="description"
                                                                    placeholder="Write A Title" required="">
                                                            </div>

                                                            <div>
                                                                <label class="text_color">Product Price</label>
                                                                <input type="number" name="price"
                                                                    placeholder="Write A price" required="">
                                                            </div>

                                                            <div>
                                                                <label class="text_color">Discount Price</label>
                                                                <input type="number" name="discount"
                                                                    placeholder="Write A discount if applicable">
                                                            </div>

                                                            <div>
                                                                <label class="text_color">Product Quantity</label>
                                                                <input type="number" min="0" name="quantity"
                                                                    placeholder="Write quantity" required="">
                                                            </div>

                                                            <div>
                                                                <label class="text_color">Product Category</label>
                                                                <select class="text_color" name="category"
                                                                    required="">
                                                                    <option value="" selected="">Add a
                                                                        category
                                                                    </option>
                                                                    @foreach ($category as $category)
                                                                        <option value="{{ $category->category_name }}">
                                                                            {{ $category->category_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Product Category
                                                                </label>
                                                                <select class="col-sm-9 " name="category"required="">
                                                                    <option value="" selected="">Add a category
                                                                    </option>

                                                                    @foreach ($category as $category)
                                                                        <option value="{{ $category->category_name }}">
                                                                            {{ $category->category_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div>
                                                                <label class="text_color">Product Image</label>
                                                                <input type="file" name="image" required="">
                                                            </div>

                                                            <div>
                                                                <input type="submit" value="Add Product"
                                                                    class="btn btn-primary" name="image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}


                    <div class="row">
                        <div class="col-lg-12">
                            {{-- <div class="col-md-3"></div> --}}
                            {{-- <div class="col-md-8 grid-margin stretch-card "> --}}
                            <div class="card" style="height:600px; background-color:rgb(18, 18, 18);">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">

                                        <div class="card-body">
                                            <h2 class="card-title">Add Products</h2>
                                            {{-- <p class="card-description"> Horizontal form layout </p> --}}
                                            <button class="btn btn-success btn_all"
                                                href="{{ url('/backend/category/show_products') }}">All
                                                Products
                                            </button>
                                            <form class="forms-sample"method="POST" action="{{ url('/add_products') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Product</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="title"
                                                            placeholder="Write A Title" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Product Description</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="description"
                                                            placeholder="Write a title" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Product Price</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="price"
                                                            placeholder="Write a title" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Discount Price</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="discount"
                                                            placeholder="Write a title" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Product Quantity </label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" min="0"
                                                            name="quantity" placeholder="Write a title" required="">
                                                    </div>
                                                </div>
                                                <div>
                                                    <label class="text_color">Product Category</label>
                                                    <select class="text_color" name="category" required="">
                                                        <option value="" selected="">Add a
                                                            category
                                                        </option>
                                                        @foreach ($category as $category)
                                                            <option value="{{ $category->category_name }}">
                                                                {{ $category->category_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div>
                                                    <label class="text_color">Product Image</label>
                                                    <input style="padding-bottom:3px;" type="file" name="image"
                                                        required="">
                                                </div>

                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                <button class="btn btn-dark">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-3"></div> --}}
                            </div>
                        </div>
                    </div>

                </div>
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
