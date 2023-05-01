<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">

            <form action="{{ route('search_product') }}" method="GET">
                @csrf
                <div class="input-group">
                    <input class="form-control border-end-0 border rounded-pill" name="search" type="text"
                        value="search" id="example-search-input">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5"
                            type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <div class="row">
            @foreach ($product as $item)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ route('product_details', $item->id) }}" class="option1">
                                    Product Details
                                </a>
                                <form action="{{ route('add_cart', $item->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="number" name="quantity" value="" min="1"
                                                style="width: 100px;">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" class="btn btn-danger" name="submit"
                                                value="Add to cart">
                                        </div>


                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="/product/{{ $item->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $item->title }}
                            </h5>
                            @if ($item->discount != null)
                                <h6>
                                    <span> Discount price</span>
                                    <br>
                                    ${{ $item->discount }}
                                </h6>
                                <h6 style="text-decoration: line-through;">
                                    <span> price</span>
                                    <br>
                                    ${{ $item->price }}
                                </h6>
                            @else
                                <h6 style="color:blue;">
                                    ${{ $item->price }}
                                </h6>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach

            <div style="margin: auto;" class="py-2  ">
                {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>



        </div>

    </div>
</section>
