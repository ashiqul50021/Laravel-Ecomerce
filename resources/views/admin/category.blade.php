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
            <div class="div_center">
                <h2 class="h2_font">Add Category</h2>
                <form action="{{ url('/add_category') }}" method="POST">
                    @csrf
                    <input class="input_color" type="text" name="category" placeholder="write category name">
                    <input type="submit", class="btn btn-primary" name="submit" value="Add Category">
                </form>
            </div>
            <table class="table text-white text-center">
                <thead>
                  <tr class="text-white">
                    <th scope="col">id</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <a href="{{ url('/edit_category', $category->id) }}" type="button" class="btn btn-succes">Edit</a>
                            <a onclick="return confirm('are you sure to delete this?')" href="{{ url('delete_category', $category->id) }}" type="button" class="btn btn-danger">Delete</a>
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