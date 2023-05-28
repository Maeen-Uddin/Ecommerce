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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            @foreach ($total_user as $order)
                var data = google.visualization.arrayToDataTable([

                    ['Task', 'Hours per Day'],

                    <?php echo [{{ $order->id->count(); }}],?>

                    ['Work', 11],
                    ['Eat', 2],
                    ['Commute', 2],
                    ['Watch TV', 2],
                    ['Sleep', 7]
                ]);
            @endforeach


            var options = {
                title: 'My Daily Activities'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>


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

                    <div id="piechart" style="width: 100%; height: 100%;"></div>

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
