<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>



    <style type="text/css">
        /* @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        } */

        * {
            font-family: Verdana, Arial, sans-serif;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .invoice table {
            margin: 15px;
        }

        .invoice h3 {
            margin-left: 15px;
        }

        .information {
            background-color: #60A7A6;
            color: #FFF;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 10px;
        }
    </style>
</head>

<body>
    {{-- Customer Details :<h1>Order Details</h1>
    Customer name<h1>{{ $order->name }}</h1>
    Customer email<h1>{{ $order->email }}</h1>
    Customer phone<h1>{{ $order->phone }}</h1>
    Customer address<h1>{{ $order->product_title }}</h1>
    Customer Id<h1>{{ $order->user_id }}</h1>
    Customer Title<h1>{{ $order->product_title }}</h1>
    Product Price<h1>{{ $order->price }}</h1>
    Product Quantity<h1>{{ $order->quantity }}</h1>
    Payment Status<h1>{{ $order->payment_status }}</h1>
    Product ID<h1>{{ $order->product_id }}</h1>
    Product deliver<h1>{{ $order->delivered }}</h1>
    <img height="80" width="60" src="uploads/product/{{ $order->image }}"> --}}



    <div class="information">
        <table width="100%">
            <tr>
                <td align="left">
                    <h3>John Doe</h3>
                    <p>
                        Street 15
                        123456 City
                        United Kingdom
                        <br /><br />
                        Date: 2018-01-01
                        Identifier: #uniquehash
                        Status: Paid
                    </p>
                </td>
                <td align="right" style="width: 40%; margin-right:20px;">
                    <pre>
                        <ul style="list-style: none;">
                        <div>
                            <h3>CompanyName</h3>
                            <h3>IT Company</h3>
                        </div>
                            <li>
                                Customer Name:-<a>{{ $order->name }}</a>
                           </li>
                           <li>
                                Email:-<a>{{ $order->email }}</a>
                           </li>
                            <li>
                                 Address:-<a>{{ $order->address }}</a>
                            </li>
                        </ul>
                    </pre>
                </td>
            </tr>
        </table>
    </div>

    <br />

    <div class="invoice">
        <h3>Invoice specification #123</h3>
        <table class="table table-bordered table-striped" width="100%">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Item 1</td>
                    <td>1</td>
                    <td align="left">€15</td>
                </tr>
                <tr>
                    <td>Item 2</td>
                    <td>2</td>
                    <td>20$</td>
                </tr>
                <tr>
                    <td>Item 2</td>
                    <td>2</td>
                    <td>20$</td>

                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="1"></td>
                    <td align="left">Total</td>
                    <td align="left" class="gray">€15,-</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="information" style="position: absolute; bottom: 0;">
        <table width="100%">
            <tr>
                <td align="left" style="width: 50%;">
                    &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
                </td>
                <td align="right" style="width: 50%;">
                    Company Slogan
                </td>
            </tr>
        </table>
    </div>


</body>

</html>
