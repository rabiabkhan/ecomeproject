<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css');
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar');
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar');
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper ">
                    <div class="container">
                        <h1 class="text-center pb-4 display-1">All orders</h1>

                        <ul class="navbar-nav w-100">
                            <li class="nav-item w-100">
                                <form action="{{ route('search') }}" method="POST"
                                    class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                    @csrf
                                    <input type="text" name="search" class="form-control bg-black text-white"
                                        placeholder="Search products">
                                    <input type="submit" value="search" class="btn btn-outline-primary">
                                </form>
                            </li>
                        </ul>
                        <table class="  me-auto border border-light">
                            <thead class="bg-danger">
                                <tr>
                                    <th class="text-white" scope="col">Sr No</th>
                                    <th class="text-white" scope="col">Name</th>
                                    <th class="text-white" scope="col">Email</th>
                                    <th class="text-white" scope="col">Phone</th>
                                    <th class="text-white" scope="col">Address</th>
                                    <th class="text-white" scope="col">Product Title</th>
                                    <th class="text-white" scope="col">Quantity</th>
                                    <th class="text-white" scope="col">Price</th>
                                    <th class="text-white" scope="col">Payment status</th>
                                    <th class="text-white" scope="col">Delivery status</th>
                                    <th class="text-white" scope="col">image</th>
                                    <th class="text-white" scope="col">Deliverd</th>
                                    <th class="text-white" scope="col">Download Pdf</th>
                                    <th class="text-white" scope="col">Send email</th>



                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order as $item)
                                    <tr>
                                        <th class="text-white" scope="row">{{ $item->id }}</th>
                                        <td class="text-white">{{ $item->name }}</td>
                                        <td class="text-white">{{ $item->email }}</td>
                                        <td class="text-white">{{ $item->phone }}</td>
                                        <td class="text-white">{{ $item->address }}</td>
                                        <td class="text-white">{{ $item->product_title }}</td>
                                        <td class="text-white">{{ $item->quantity }}</td>
                                        <td class="text-white">{{ $item->price }}</td>
                                        <td class="text-white">{{ $item->payment_satus }}</td>
                                        <td class="text-white">{{ $item->delivery_status }}</td>
                                        <td class="text-white"> <img src="/product/{{ $item->image }}" alt=""
                                                srcset="" width="200px;" height="50px;"></td>
                                        <td>
                                            @if ($item->delivery_status == 'proccessing')
                                                <a onclick=" return confirm('are you want to sure to delivered this product!')"
                                                    href="{{ route('deliverd', $item->id) }}"
                                                    class="btn btn-success">delivered</a>
                                            @else
                                                <p class="text-success">Delivered</p>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('print_pdf', $item->id) }}"
                                                class="btn btn-warning">PrintPDF</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('send_email', $item->id) }}" class="btn btn-warning">Send
                                                Email</a>
                                        </td>
                                    </tr>

                                @empty
                                    <tr class="text-center py-5">

                                        <td colspan="16">No Data Found</td>


                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script');
</body>

</html>
