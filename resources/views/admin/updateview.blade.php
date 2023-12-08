

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      
      <!-- partial -->

      @include('admin.sidebar')

      @include('admin.navbar')
      
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

         <div class="container" align="center">
         <h1 style="color:red; padding-top:25px; font-size:25px;">Update Product</h1>

         @if(session()->has('message'))

        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">Product Updated Succesfully</button>

        {{session()->get('mesaage')}}

        </div>
        @endif

        <form action="{{url('updateproduct',$data->id)}}" method="post"enctype="multipart/form-data">


        @csrf 

         <form>
        <div style="padding:15px;">
            <label>Product Title</label>

            <input style="color:black" type="text" name="title" value="{{$data->title}}"
            required=""> 
        </div>


        <div style="padding:15px;">
            <label>Price</label>

            <input style="color:black" type="number" name="price" value="{{$data->price}}"
            required=""> 
        </div>

        <div style="padding:15px;">
            <label>Description</label>

            <input style="color:black" type="text" name="des" value="{{$data->description}}"
            required=""> 
        </div>

        <div style="padding:15px;">
            <label>Quantity</label>

            <input style="color:black" type="text" name="quantity" value="{{$data->quantity}}"
            required=""> 
        </div>

        <div style="padding:15px;">
            <label>Old Image</label>

            <img height="100" width="100" src="/productimage/{{$data->image}}">
        </div>


        <div style="padding:15px;">
        <label>Görseli Değiştir</label>
           <input type="file" name="file">
        </div>

        <div style="padding:15px;">
           <input class="btn btn-success" type="submit">
        </div>
     </form>





        </div>
    
    </div>
        
          <!-- partial -->
          @include('admin.script')
        
  </body>
</html>