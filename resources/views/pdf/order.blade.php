<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt for PaySoko Systems</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .order-info {
            margin-bottom: 20px;
        }
        .order-info th, .order-info td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .order-info th {
            background-color: #f4f4f4;
        }
        .products {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }
        .products th, .products td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .products th {
            background-color: #f4f4f4;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Order Receipt for PaySoko Systems</h1>
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at->format('F j, Y') }}</p>
        </div>

        <div class="order-info">
            <table>
                <tr>
                    <th>First Name</th>
                    <td>{{ $order->first_name }}</td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>{{ $order->last_name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $order->email }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $order->address_line }}, {{ $order->city }}, {{ $order->postal_code }}</td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td>{{ $order->country }}</td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>{{ $order->mobile }}</td>
                </tr>
                <tr>
                    <th>Payment Mode</th>
                    <td>{{ $order->transactions->first()->mode }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $order->status }}</td>
                </tr>
                <tr>
                    <th>Grand Total</th>
                    <td>{{ number_format($order->grand_total, 2) }} USD</td>
                </tr>
            </table>
        </div>

        <div class="products">
            <h3>Ordered Products:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>{{ number_format($product->price, 2) }} USD</td>
                            <td>{{ number_format($product->pivot->quantity * $product->price, 2) }} USD</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>Thank you for your order!</p>
        </div>
    </div>

</body>
</html>
