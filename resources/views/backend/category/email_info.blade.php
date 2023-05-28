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

        label {
            display: inline-block;
            width: 160px;
            font-size: 15px;
            font-weight: bold;
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
                        <div class="col-lg-12">
                            {{-- <div class="col-md-3"></div> --}}
                            {{-- <div class="col-md-8 grid-margin stretch-card "> --}}
                            <div class="card" style="height:600px; background-color:rgb(18, 18, 18);">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">

                                        <div class="card-body">

                                            <H1 style="text-align:center;font-size:22px;">Send Email To
                                                {{ $order->email }}
                                            </H1>

                                            <form action="{{ url('send_user_email', $order->id) }}" method="POST">
                                                @csrf
                                                <div style="padding-left:35%; padding-top:25px;">
                                                    <label>Email Greeting:</label>
                                                    <input type="text" name="greetings">
                                                </div>
                                                <div style="padding-left:35%; padding-top:25px;">
                                                    <label>Email FirstLine:</label>
                                                    <input type="text" name="firstline">
                                                </div>
                                                <div style="padding-left:35%; padding-top:25px;">
                                                    <label>Email Body:</label>
                                                    <input type="text" name="body">
                                                </div>
                                                <div style="padding-left:35%; padding-top:25px;">
                                                    <label>Email Button Name:</label>
                                                    <input type="text" name="button">
                                                </div>
                                                <div style="padding-left:35%; padding-top:25px;">
                                                    <label>Email url:</label>
                                                    <input type="text" name="url">
                                                </div>
                                                <div style="padding-left:35%; padding-top:25px;">
                                                    <label>Email Last Line:</label>
                                                    <input type="text" name="lastline">
                                                </div>
                                                <div style="padding-left:35%; padding-top:25px;">
                                                    <input type="submit" value="Send Email" class="btn btn-primary">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-3"></div> --}}
                            </div>
                        </div>
                    </div>


                    <!-- container-scroller -->
                    @include('backend.layouts.partials.script')
                </div>
            </div>
        </div>

    </div>
</body>

</html>
