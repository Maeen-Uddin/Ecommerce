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
                <div class="content-wrapper">

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert"aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    

                    <div class="div_center">
                        <span>
                            <h2 class="h2_font">Update Products</h2>
                            <button class="btn btn-success btn_all"
                                href="{{ url('/backend/category/update_products') }}">All Products</button>
                        </span>

                        <form method="POST" action="{{ url('/update_products',$product->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label class="text_color">Product <Title></Title></label>
                                <input type="text" name="title" placeholder="Write A Title" value="{{$product->title}}"  required="">
                            </div>

                            <div>
                                <label class="text_color">Product Description</label>
                                <input type="text" name="description" placeholder="Write A Title"  value="{{$product->description}} required="">
                            </div>

                            <div>
                                <label class="text_color">Product Price</label>
                                <input type="number" name="price" placeholder="Write A price"  value="{{$product->price}}" required="">
                            </div>

                            <div>
                                <label class="text_color">Discount Price</label>
                                <input type="number" name="discount" placeholder="Write A discount if applicable"  value="{{$product->discount_price}}">
                            </div>

                            <div>
                                <label class="text_color">Product Quantity</label>
                                <input type="number" min="0" name="quantity" placeholder="Write quantity" value="{{$product->quantity}}"
                                    required="">
                            </div>

                            <div>
                                <label class="text_color">Product Category</label>
                                <select class="text_color" name="category" required="">
                                    <option value="{{$product->category}}" selected="">{{$product->category}}</option>

                                    @foreach ($category as $category)
                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                        </option>
                                    @endforeach


                                </select>
                            </div>

                            <div class="div_design">
                                <label class="text_color">Current Product Image</label>
                                <img height="100" width="100" src="/uploads/product/{{$product->image}}">
                            </div>

                            <div class="div_design">
                                <label class="text_color">Change Product Image</label>
                                <input type="file" name="image">
                            </div>

                            <div>
                                <input type="submit" value="Update Product" class="btn btn-primary" name="image">
                            </div>

                        </form>

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
