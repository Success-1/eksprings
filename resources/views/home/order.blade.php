<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{ asset('images/logo-1.jpg') }}" type="">
      <title>e&ksprings</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

      <style>
        .center{
           margin: auto; 
           width: 90%;
           padding: 30px;
           text-align: center;
        }

        table, th, td{
            border: 2px solid #000;
           
        }

        th{
            background-color: skyblue;
            font-size: 20px;
            font-weight: bold;
            padding: 10px 2px;
        }
         .pagination .page-link {
            background-color: #f7444e;
            color: #ffffff;
            border-color: #f7444e;
         }

         /* Change color of active page link */
         .pagination .page-item.active .page-link {
            background-color: #ffff; /* Background color for active link */
            color: #f7444e; /* Text color for active link */
            border-color: #f7444e; /* Border color for active link */
         }

         /* Optional: Change hover effect for pagination links */
         .pagination .page-link:hover {
            background-color: #ffffff;
            color: #f7444e;
         }
      </style>
   </head>
   <body>
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <div class="center">
            <table>
                <tr>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                    <th>Cancel Order</th>
                </tr>
                @foreach($order as $orde)
                <tr>
                    
                    <td>{{$orde->product_title}}</td>
                    <td>{{$orde->quantity}}</td>
                    <td>{{$orde->price}}</td>
                    <td>{{$orde->payment_status}}</td>
                    <td>{{$orde->delivery_status}}</td>
                    <td>
                        <img width="100" height="100" src="product/{{$orde->image}}" alt="">
                    </td>
                    <td>
                        @if($orde->delivery_status=='Processing')
                        <a onclick="return confirm('Cancel order?')" class="btn btn-danger" href=" {{ url('cancel_order', $orde->id) }}">Cancel Order</a>
                        @else
                        <p style="color: blue;">Not allowed</p>
                        @endif
                    </td>
                    
                </tr>
                @endforeach
            </table>
         </div>
      <!-- end client section -->
      <!-- footer start -->
      <!-- <div class="cpy_">
         <p class="mx-auto">© 2024 All Rights Reserved By <a href="">E&K springs</a><br></p>
         
         </p>
      </div> -->
      <!-- end footer end -->
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>