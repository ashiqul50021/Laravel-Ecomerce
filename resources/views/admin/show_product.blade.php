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
                
            <h1 class="text-center">All Product</h1>
            <table class="table text-white text-center">
                <thead>
                  <tr class="text-white">
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">quantity</th>
                    <th scope="col">price</th>
                    <th scope="col">discount price</th>
                    <th scope="col">image</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_price }}</td>
                        <td><img src="/product/{{ $product->image }}" style="width:50px; height:50px" alt=""></td>
                        <td>
                            <a href="{{ url('update_product', $product->id) }}" type="button" class="btn btn-success">Edit</a>
                            <a onclick="return confirm('are you sure to delete this?')" href="{{ url('delete_product', $product->id) }}" type="button" class="btn btn-danger">Delete</a>
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