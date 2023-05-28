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

                    <h2 class="btn_all">All Products</h2>
                    <table class=" table table-bordered table-striped ">
                        <tr class="th_color">
                            <th class="th_deg">Product title</th>
                            <th class="th_deg">Description</th>
                        </tr>
                        @foreach ($comment as $comments)
                            <tr>
                                <td>{{ $comments->title }}</td>
                                <td>
                                    @foreach ($comments->comments as $commn)
                                        {{ $commn->message }}
                                    @endforeach
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
