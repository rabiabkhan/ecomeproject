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

                <div class="content-wrapper">

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="divcenter text-center">


                        <h2 class="display-5 mb-4">Add Product</h2>

                        <form action="{{ route('add_product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="title">Product Title:</label>
                                <input type="text" class="text-dark mt-2" name="title"
                                    placeholder="write a product name">
                            </div>
                            <div>
                                <label for="title">Product Description:</label>
                                <input type="text" class="text-dark mt-2" name="description"
                                    placeholder="write a description name">
                            </div>
                            <div>
                                <label for="title">Product Category:</label>
                                <select name="category" id="" class="mt-2">
                                    <option value="" selected>Add category here</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->category_name }}" class="text-dark">
                                            {{ $item->category_name }}</option>
                                    @endforeach

                                </select>
                            </div>


                            <div>
                                <label for="title">Product Quantity:</label>
                                <input type="number" class="text-dark mt-2" name="quantity" min="0"
                                    placeholder="qunantity">
                            </div>
                            <div>
                                <label for="title">Product Price:</label>
                                <input type="number" class="text-dark mt-2" name="price" placeholder="price">
                            </div>
                            <div>
                                <label for="title">Product Discount:</label>
                                <input type="number" class="text-dark mt-2" name="discount" placeholder="discount">
                            </div>
                            <div>
                                <label for="title">Product image:</label>
                                <input type="file" class="text-dark mt-2" name="image" placeholder="product image">
                            </div>
                            <div>

                                <input type="submit" class="btn btn-success mt-3" value="submit" name="submit">
                            </div>
                        </form>

                    </div>


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
