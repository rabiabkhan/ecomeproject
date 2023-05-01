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

                    {{-- <h1 class="text-white" style="font-size: 25px;">Send Mail to: {{ $mail->email }}</h1> --}}
                    <div class="jus">
                        <form action="{{ route('user_send_email', $mail->id) }}" method="POST">
                            @csrf
                            <div class=" form-group mb-2">
                                <label for="emailgreeting" class="form-label">Email Greeting</label>
                                <input type="text" class="form-control" id="emailgreeting" name="greeting"
                                    aria-describedby="emailHelp">

                            </div>
                            <div class=" form-group mb-2">
                                <label for="emailfirstline" class="form-label">Email FirstLine</label>
                                <input type="text" name="firstline" class="form-control" id="emailfirstline"
                                    aria-describedby="emailHelp">

                            </div>
                            <div class=" form-group mb-2">
                                <label for="emailbody" class="form-label">Email body</label>
                                <input type="text" name="body" class="form-control" id="emailbody"
                                    aria-describedby="emailHelp">

                            </div>
                            <div class=" form-group mb-2">
                                <label for="emailbutton" class="form-label">Email button name</label>
                                <input type="text" name="emailbutton" class="form-control" id="emailbutton"
                                    aria-describedby="emailHelp">

                            </div>
                            <div class=" form-group mb-2">
                                <label for="emailurl" class="form-label">Email URl</label>
                                <input type="text" name="emailurl" class="form-control" id="emailurl"
                                    aria-describedby="emailHelp">

                            </div>
                            <div class=" form-group mb-2">
                                <label for="emaillastline" class="form-label">Email LastLine</label>
                                <input type="text" name="emaillastline" class="form-control" id="emaillastline"
                                    aria-describedby="emailHelp">

                            </div>
                            <div class=" form-group mb-2">

                                <input type="submit" value="Send Email" class="btn btn-primary"
                                    aria-describedby="emailHelp">

                            </div>


                        </form>


                    </div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.footer');
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
