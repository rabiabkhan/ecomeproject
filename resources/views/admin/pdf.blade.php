<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widh6=device-widh6, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h6>Sr No</h6>
    <h6>Name</h6>
    <h6>Email</h6>
    <h6>Phone</h6>
    <h6>Address</h6>
    <h6>Product Title</h6>
    <h6>Quantity</h6>
    <h6>Price</h6>
    <h6>Payment status</h6>
    <h6>Delivery status</h6>
    <h6>image</h6>

    <h6 scope="row">{{ $order->id }}</h6>
    <h6>{{ $order->user_id }}</h6>
    <h6>{{ $order->product_id }}</h6>
    <h6>{{ $order->name }}</h6>
    <h6>{{ $order->email }}</h6>
    <h6>{{ $order->phone }}</h6>
    <h6>{{ $order->address }}</h6>
    <h6>{{ $order->product_title }}</h6>
    <h6>{{ $order->quantity }}</h6>
    <h6>{{ $order->price }}</h6>
    <h6>{{ $order->payment_satus }}</ h6>
        <h6>{{ $order->delivery_status }}
        </h6>
        <br><br><br>
        <h6 class="text-white"> <img src="product/{{ $order->image }}" widh6="200px;" height="50px;"></ h6>



</body>

</html>
