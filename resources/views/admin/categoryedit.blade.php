<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
   @include('admin.css')
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
          <div>
            <h1 class="text-center">update category</h1>
            <form action="{{ url('/update_category',$categories->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 w-50">
              <label for="name" class="form-label">Category Name :</label>
              <input type="text" name="category_name" id="category_name"
                  class="form-control text_color" value="{{ $categories->category_name }}">
          </div>
          <div class="mb-3 w-50">
            <input type="submit" value="update category" class="form-control btn btn-primary">
        </div>
            </form>
          </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         @include('admin.footer')
          <!-- partial -->
        </div>
      <!-- main-panel ends -->
    </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   @include('admin.script')
  </body>
</html>