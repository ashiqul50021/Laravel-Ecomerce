<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>{{ $orders->name }}</h1>
            <h2>{{ $orders->address }}</h2>
            <h2>{{ $orders->phone }}</h2>
            <h2>{{ $orders->email }}</h2>

            <table class="table text-white text-center">
                <thead>
                    <tr class="text-white">
                        <th scope="col">id</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Delivery Status</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>
                    

                    <tr>
                        <th scope="row">{{ $orders->id }}</th>
                        <td>{{ $orders->product_title }}</td>
                        <td>{{ $orders->quantity }}</td>
                        <td>{{ $orders->price }}</td>
                        <td>{{ $orders->payment_status }}</td>
                        <td>
                            {{ $orders->delivery_status }}
                        </td>
                        <td><img src="/product/{{ $orders->image }}" style="width:250px; height:250px" alt=""></td>



                    </tr>
                    

                </tbody>
            </table>




        </div>

    </div>
    </div>
</body>

</html>
