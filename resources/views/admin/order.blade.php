<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .div_center{
        text-align: center;
        padding-top: 40px;
    }
    .h2_font{
        font-size: 40px;
        padding-bottom: 40px;
    }
    .input_color{
        color: black
    }
   </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss='alert' area-hidden='true'>x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                
            <h1 class="text-center">All Orders</h1>
            <table class="table text-white text-center">
                <thead>
                  <tr class="text-white">
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Delivery Status</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                    <th scope="col">print pdf</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->product_title }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        <td><img src="/product/{{ $order->image }}" style="width:50px; height:50px" alt=""></td>
                        <td>
                            @if ($order->delivery_status=='processing')
                                
                            <a onclick="return confirm('are you sure to deliverd order?')" href="{{ url('delivered', $order->id) }}" type="button" class="btn btn-success">delivered</a>
                            <a onclick="return confirm('are you sure to cancel order?')" href="{{ url('delete_orders', $order->id) }}" type="button" class="btn btn-danger">Cancel order</a>
                            @else
                            <p>delivered</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('print_pdf',$order->id) }}" class="btn btn-secondary">print pdf</a>
                        </td>
                        
                    </tr>
                    @endforeach
                 
                </tbody>
              </table>
              
  

              
            </div>
            
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
           @include('admin.footer')
            <!-- partial -->
          </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   @include('admin.script')
  </body>
</html>