<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
				@include('admin.css')

    <style>
        .title_deg{
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }

        .table_deg{
            border: 2px solid white;
            width: 100%;
            margin: auto;
            /* overflow-x: scroll; */
        }

        th{
            background: skyblue;
            color: #000000;
        }

        th, td {
            padding: 10px;
        }
        
        tr {
            border: 2px solid white;
        }

        .order_img{
            width: 200px;
            height: 100px;
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
                <h1 class="title_deg">All Order</h1>
                <table class="table_deg">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product_title</th>
                        <th>Quatity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        
                    </tr>
                    @foreach($order as $orde)
                    <tr>
                        <td>{{ $orde->name }}</td>
                        <td>{{ $orde->email }}</td>
                        <td>{{ $orde->address }}</td>
                        <td>{{ $orde->phone }}</td>
                        <td>{{ $orde->product_title }}</td>
                        <td>{{ $orde->quantity }}</td>
                        <td>{{ $orde->price }}</td>
                        <td>{{ $orde->payment_status }}</td>
                        <td>{{ $orde->delivery_status }}</td>
                        <td>
                            <img class="order_img" src="/product/{{ $orde->image }}" alt="">
                        </td>
                        <td >
                            <a href="{{ url('delivered', $orde->id) }}"class="btn btn-primary">Delivered</a>
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