<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
	@include('admin.css')
    <style>
        .div_center{
            margin: auto;
            width: 50%;
            
            /* text-align: center; */
            padding-top: 40px;
            /* border: 3px solid green; */
        }

        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color{
            color: black;
            padding-buttom: 20px;
        }

        label{
         display: inline-block;
         width: 200px;
        }
        .div_design{
         padding-bottom: 15px;
        }

        
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
		@include('admin.sidebar')
      <!-- partial sidebar end-->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial main-->
            <div class="main-panel">
                <div class="content-wrapper">

                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif
                    <div class="div_center">
                        <h1 class="font_size">Add product</h1>
                        <form action="{{ url('/add_products') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="div_design">
                          <label for="product_title">Product Title</label>
                          <input class="text_color" type="text" name="title" id="title" placeholder="Write a title" required>
                         </div>
                         <div class="div_design">
                          <label for="product_title">Product Description</label>
                          <input class="text_color" type="text" name="description" id="title" placeholder="Write a description" required>
                         </div>
                         <div class="div_design">
                          <label for="product_title">Product Price</label>
                          <input class="text_color" type="number" name="price" id="price" placeholder="Write a price" required>
                         </div>
                         <div class="div_design">
                          <label for="product_title">Discount Price</label>
                          <input class="text_color" type="text" name="ds_price" id="ds_price" placeholder="Write a title" required>
                         </div>
                         <div class="div_design">
                          <label for="product_title">Product Quantity</label>
                          <input class="text_color" type="number" min="0" name="quantity" id="quantity" placeholder="Write a title" required>
                         </div>
                         <div class="div_design">
                          <label for="product_title">Product Category</label>
                          <select name="category" id="" class="text_color" required>
                           <option value="" selected>Select a category</option>
                           @foreach($category as $categ)
                           <option value="{{$categ->category_name}}">{{$categ->category_name}}</option>
                           @endforeach
                          </select>
                         </div>
                         <div class="div_design">
                          <label for="product_title">Product Image</label>
                          <input class="text_color" type="file" name="image" id="image" required>
                         </div>
                         <div class="div_design">
                          <input class="btn btn-success center w-75" type="submit" name="submit" id="submit" value="Add product">
                         </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>