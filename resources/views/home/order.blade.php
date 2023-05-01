<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header');
        <!-- end header section -->


        <div class="container ">
            <div class="row text-center">
                <div class="col-md-8 col-lg-10  m-auto ">
                    <table class="table mt-7 table-light table-striped">
                        <thead class="bg-danger">
                            <tr>
                                <th scope="col">Product title</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Delivery Status</th>
                                <th scope="col"> Product Image</th>
                                <th scope="col">Order Cancel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                                <tr>
                                    <td>{{ $item->product_title }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->payment_satus }}</td>
                                    <td>{{ $item->delivery_status }}</td>
                                    <td><img src="product/{{ $item->image }}" alt="" width="180"
                                            height="100"></td>

                                    <td>
                                        @if ($item->delivery_status == 'proccessing')
                                            <a onclick=" return confirm('Are Your sure want to cancel this order!!')"
                                                href="{{ route('cancel_order', $item->id) }}"
                                                class="btn btn-danger">Cancel
                                                Order </a>
                                        @else
                                            <p class="text-info">Not Allowed</p>
                                        @endif

                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>




    @include('home.footer');
    <!-- footer end -->

    <!-- jQery -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('home/js/custom.js') }}"></script>
</body>

</html>
