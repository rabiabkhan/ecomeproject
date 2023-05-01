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
        <!-- product section -->
        @include('home.product_view');
        <!-- end product section -->
        <div class=" comatiner text-center ">
            <div class="row">
                <div class="col-md-8 text-center m-auto">
                    <h1 class="text-dark p-5 " style="font-size: 30px;">Comments</h1>
                    <form action="{{ route('add_comment') }}" method="POST">
                        @csrf

                        <textarea name="comment" id="" cols="30" rows="10" placeholder="Comment something here"></textarea>
                        <input type="submit" class="btn btn-primary-outline" value="comment">

                    </form>
                    <h1 class="text-dark p-4 " style="font-size: 30px;">All comments</h1>
                    @foreach ($comment as $item)
                        <div>
                            <b>{{ $item->name }}</b>
                            <p class="p-4">{{ $item->comment }}</p>
                            <a href="javascript::void(0)" onclick="reply(this)" data-id="{{ $item->id }}"
                                class="text-primary mb-3">Reply</a>

                        </div>

                        <div>
                            @foreach ($reply as $item)
                                @if ($item->comment_id == $item->id)
                                    <div>
                                        <b>{{ $item->name }}</b>
                                        <p class="p-4">{{ $item->reply }}</p>
                                    </div>
                                @endif

                        </div>
                    @endforeach
                    @endforeach
                    <div style="display:none" class="replydiv">
                        <form action="{{ route('comment_reply') }}" method="POST">
                            @csrf
                            <input type="text" name="commentId" id="commentId" hidden="">
                            <textarea name="comment" id="" cols="30" rows="10" placeholder="Comment something here"></textarea><br>
                            <button type="submit" class="btn btn-primary">Reply</button>
                            <a href="javascript::void(0)" class="btn btn-primary" onclick="reply_close(this)">Close</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function reply(caller) {
                document.getElementById("commentId").value = (caller).getAttribute('data-id');
                $('.replydiv').insertAfter(caller);
                $('.replydiv').show();
            }

            function reply_close(caller) {
                $('.replydiv').hide();
            }
        </script>


        <!-- footer start -->
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
