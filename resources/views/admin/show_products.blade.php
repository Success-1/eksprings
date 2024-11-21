<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
	     @include('admin.css')
    <style>
        .center{
            margin: auto;
            width: 85%;
            border: 2px solid white;
            margin-top: 40px;
        }

        .h2_product{
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }

        .img_size{
            width: 200px;
            height: 80px;
        }

        /* th, td{
            border: 1px solid white;
        } */

        th{
           text-align : center;
           padding: 30px;
        } 

        .th_color{
            background: skyblue;
            color: navy;
        }
        td{
            padding : 0 20px 10px 10px;
        } 

        td a{
            display: inline-block;
            width:100px;
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

            <h2 class="h2_product">All Products</h2>
                <table class="center">
                    <tr class="th_color">
                        <th>Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>

                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>
                            <img class="img_size" src="/product/{{$product->image}}" alt="image">
                        </td>
                        <td>
                            <a href="{{ url('edit_product', $product->id) }}"  class="btn btn-primary">Edit</a>
                            <a href="{{ url('delete_product', $product->id) }}" onclick="return confirm('Do you want to delete this product')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>						
        </div>						
    <!-- container-scroller -->
    <!-- plugins:js -->
    	@include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>