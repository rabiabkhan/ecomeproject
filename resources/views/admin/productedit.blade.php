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

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{ session()->get('message') }}
                    </div>
                    <div class="divcenter text-center">
                        <h2 class="display-5 mb-4">Add Product</h2>
                        <form action="{{ route('product_update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            <div>
                                <label for="title">Product Title:</label>
                                <input type="text" class="text-dark mt-2" name="title"
                                    placeholder="write a product name" value="{{ $product->title }}">
                            </div>
                            <div>
                                <label for="title">Product Description:</label>
                                <input type="text" class="text-dark mt-2" name="description"
                                    placeholder="write a description name" value="{{ $product->description }}">
                            </div>
                            <div>
                                <label for="title">Product Category:</label>
                                <select name="category" id="" class="mt-2">
                                    <option value="{{ $product->category }}" selected class="text-dark">
                                        {{ $product->category }}</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->category_name }}" class="text-dark">
                                            {{ $item->category_name }}</option>
                                    @endforeach

                                </select>
                            </div>


                            <div>
                                <label for="title">Product Quantity:</label>
                                <input type="number" class="text-dark mt-2" name="quantity" min="0"
                                    placeholder="qunantity" value="{{ $product->quntity }}">
                            </div>
                            <div>
                                <label for="title">Product Price:</label>
                                <input type="number" class="text-dark mt-2" name="price" placeholder="price"
                                    value="{{ $product->price }}">
                            </div>
                            <div>
                                <label for="title">Product Discount:</label>
                                <input type="number" class="text-dark mt-2" name="discount" placeholder="discount"
                                    value="{{ $product->discount }}">
                            </div>
                            <div>
                                <label for="title">Product image:</label>
                                <img style="margin:auto;" src="/product/{{ $product->image }}" width="200px;"
                                    height="200px;" alt="" srcset="">
                                <input type="file" class="text-dark mt-2" name="image" placeholder="product image">
                            </div>
                            <div>

                                <input type="submit" class="btn btn-success mt-3" value="update" name="submit">

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
