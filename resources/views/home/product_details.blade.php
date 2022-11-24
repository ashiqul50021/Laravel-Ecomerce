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
    <!-- end header section -->

    <h1 style="font-size: 40px; margin-top:20px; margin-bottom:20px" class="text-center">Details of
        {{ $products->title }}</h1>
    <hr>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="w-90 h-75" src="/product/{{$products->image  }}" alt="">
            </div>
            <div class="col-md-6 mt-5">
                <div class="align-item-center mt-5" style="font-size: 20px">
                    <p class=""><span class=""><b>Title:</b></span> {{ $products->title }}</p>
                    <p class=""><span class="text-center"><b>Description:</b></span> {{ $products->description }}</p>
                    <p class=""><span class="text-center"><b>Category:</b></span> {{ $products->category }}</p>
                    <p class=""><span class="text-center"><b>Quantity:</b></span> {{ $products->quantity }}</p>

                    @if ($products->discount_price!=null)


                    <p style="color: red" class=""><span class="text-center"><b>Discount Price:</b></span>
                       $ {{ $products->discount_price }}
                    </p>
                    <p style="text-decoration: line-through" class=""><span class="text-center"><b>Price:</b></span>
                       $ {{ $products->price }}</p>
                    @else
                    <p style="color: blue" class=""><span class="text-center"><b>Price:</b></span>
                       $ {{ $products->price }}</p>
                    @endif

                    <form action="{{ url('add_cart', $products->id) }}" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-md-4">
                              <input type="number" name="quantity" value="1" min="1" style="">
                           </div>
                           <div class="col-md-4">
                              <input style="border-radius:50px" type="submit" value="Add to Cart">
                           </div>
                        </div>
                     </form>
                    <a class="btn btn-warning" href="#" role="button">Buy Now</a>

                </div>
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
