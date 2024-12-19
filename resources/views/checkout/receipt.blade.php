<!DOCTYPE html>
<html>
<head>
    <title>Order Receipt</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { width: 80%; margin: 0 auto; }
        .header { text-align: center; margin-bottom: 20px; }
        .details { margin-bottom: 20px; }
        .details strong { display: inline-block; width: 120px; }
        .total { text-align: right; font-size: 1.2em; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Order Receipt</h1>
        </div>
        <div class="details">
            <p><strong>Name:</strong> {{ $data['first_name'] }} {{ $data['last_name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Address:</strong> {{ $data['address_line'] }}</p>
            <p><strong>City:</strong> {{ $data['city'] }}</p>
            <p><strong>Postal Code:</strong> {{ $data['postal_code'] }}</p>
            <p><strong>Country:</strong> {{ $data['country'] }}</p>
            <p><strong>Mobile:</strong> {{ $data['mobile'] }}</p>
        </div>
        <div class="total">
            <p><strong>Total Cost:</strong> ${{ $subTotal }}</p>
        </div>
    </div>
</body>
</html>
