<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
   @include('admin.css')
   <style>
    .div_center {
        text-align: center;
        padding-top: 40px;
    }

    .font_size {
        font-size: 40px;
        padding-bottom: 40px;
    }

    .text_color {
        color: black;
        padding-bottom: 20px;
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
            <div class="mb-3">
                <h1 class="font_size">update Product</h1>
                <form action="{{ url('/update_product_confirm',$products->id) }}" class="mx-auto" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 w-50">
                        <label for="title" class="form-label">Product Title :</label>
                        <input type="text" name="title" id="title" placeholder="write a title"
                            class="form-control text_color" value="{{ $products->title }}" required>
                    </div>
                    <div class="mb-3 w-50">
                        <label class="form-label" for="description">Product Description :</label>
                        <input type="text" name="description" placeholder="write a description"
                            class="text_color form-control" value="{{ $products->description }}" required>
                    </div>
                    <div class="mb-3 w-50">
                        <label class="form-label" for="price">Product Price :</label>
                        <input type="number" name="price" placeholder="write a price"
                            class="text_color form-control" value="{{ $products->price }}" required>
                    </div>
                    <div class="mb-3 w-50">
                        <label class="form-label" for="discount_price">Discount Price :</label>
                        <input type="number" name="discount_price" placeholder="write a discount"
                            class="text_color form-control" value="{{ $products->discount_price }}" required>
                    </div>
                    <div class="mb-3 w-50">
                        <label class="form-label" for="quantity">Product Quantity :</label>
                        <input type="number" name="quantity" placeholder="write a quantity" min="0"
                            class="text_color form-control" value="{{ $products->quantity }}" required>
                    </div>
                    <div class="mb-3 w-50">
                        <label class="form-label" for="category">Product Category :</label>
                        <select class="text_color form-control" name="category" id="">
                         <option value="{{ $products->category }}" selected>{{ $products->category }}</option>
                         @foreach ($categories as $category)
                         <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 w-50">
                        <label class="form-label" for="image">Previous Product Image :</label>
                        <img src="/product/{{ $products->image }}" height="100px" width="100px" alt="">
                    </div>
                    <div class="mb-3 w-50">
                        <label class="form-label" for="image">upload current product Image :</label>
                        <input type="file" name="image" id="" class="form-control">
                    </div>
                    <div class="mb-3 w-50">
                        <input type="submit" value="update Product" class="form-control btn btn-primary">
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