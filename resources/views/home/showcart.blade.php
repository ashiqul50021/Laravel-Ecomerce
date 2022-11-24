<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <base href="/public">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="home/images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body>
   
    <div class="container">
        <!-- header section strats -->
        @include('home.header')
    </div>
    <div class="container">
        <h1 class="mt-5 mb-3 text-center" style="font-size: 30px">Show All Product of Cart</h1>
        @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss='alert' area-hidden='true'>x</button>
            {{ session()->get('message') }}
        </div>
    @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalprice = 0 ?>
                @foreach ($carts as $cart)

                <tr>
                    <th scope="row">1</th>
                    <td>{{ $cart->id }}</td>
                    <td>{{ $cart->product_title }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>${{ $cart->price }}</td>
                    <td><img src="/product/{{ $cart->image }}" style="width:50px; height:50px" alt=""></td>
                    <td><a class="btn btn-danger" onclick="return confirm('are you sure to remove this product?')" href="{{ url('/remove_cart', $cart->id) }}" role="button">Remove</a></td>
                </tr>
                <?php $totalprice = $totalprice + $cart->price ?>
                @endforeach

            </tbody>
        </table>
        <div>
            <h1 class="text-center" style="font-size: 20px">Total Price: ${{ $totalprice }}</h1>
            <div style="" class="text-center">
                <h2 style="font-size: 20px">process to order: </h2>
            <a class="btn btn-success" href="{{ url('cash_order') }}" role="button">Cash On delivery</a>
            <a class="btn btn-dark" href="{{ url('stripe', $totalprice) }}" role="button">Pay Using Card</a>
            </div>
        </div>
    </div>
    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>

</html>
