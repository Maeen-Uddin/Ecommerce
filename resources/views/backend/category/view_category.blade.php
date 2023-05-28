<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.layouts.partials.css')

    <style type="text/css">
        .content-wrapper {
            background-color: rgb(28, 28, 28);
        }

        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
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
                        <h2 class="h2_font">Add Category</h2>
                        <form action="{{ url('add_category') }}" method="POST">
                            @csrf
                            <input type="text" name="category" placeholder="Write Category Name">
                            <input type="submit" class="btn btn-primary" value="Add Category">
                        </form>
                    </div>
                    <table class="center">
                        <tr>
                            <td>Category Name</td>
                            <td>Action</td>
                        </tr>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->category_name }}</td>
                                <td>
                                    <a onclick="return confirm('Are you Sure TO Delete This?')" class="btn btn-danger"
                                        href="{{ url('delete_category', $data->id) }}->$id">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
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
