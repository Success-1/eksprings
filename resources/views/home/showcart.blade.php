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
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>e&ksprings|cart</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <style>
        .center{
            margin: auto;
            width: 60%;
            text-align: center;
            padding: 30px;

        }

        table, th, td{
            border: 1px solid grey;

        }

        table{
            width: 100%;
        }

        th{
            font-size: 20px;
            padding: 5px;
            background: skyblue;
        }

        th, td{
            padding: 10px;
        
        }
      </style>
   </head>
   <body>
        @include('sweetalert::alert')
      <div class="hero_area">
            <!-- header section strats -->
            @include('home.header')
            <!-- end header section -->
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
            @endif
            <div class="center">
                <table>
                    <tr>
                        <th>Product Title</th>
                        <!-- <th> Quantity</th> -->
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    <?php $totalprice=0?>
                    @foreach($carts as $cart)
                    <tr>
                        <td>{{$cart->product_title}}</td>
                        <!-- <td>{{$cart->product_quantity}}</td> -->
                        <td>{{$cart->price}}</td>
                        <td><img src="/product/{{$cart->image}}" alt="" width="100" height="100" style="width"></td>
                        <td><a href="{{ url('/remove_cart', $cart->id) }}" class="btn btn-danger" onclick="confirmation(event)" >Remove</a></td>
                    </tr>
                    <?php $totalprice = $totalprice+$cart->price?>
                    @endforeach
                    
                </table>
                <div>
                    <h5 class=total_deg>Total Price:  {{$totalprice}}</h5>
                </div>

                <div>
                    <h1 style="font-size: 25px; padding-bottom: 15px;">Proceed to Order:</h1>
                    <a href="{{  url('cash_order') }}" class="btn btn-success">Cash on Delivery</a>
                    <a href="{{ URL('stripe', $totalprice) }}" class="btn btn-success">Pay using card</a>
                </div>
            </div>
        <!-- </div> -->
      <!-- footer start -->
      <!-- @include('home.footer') -->
      <!-- end footer end -->

      <script>
        function confirmation(ev){
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            Swal.fire({
                title: "Are you sure you want to cancel this order",
                title: "You will not be able to revert this",
                icon: "warning",
                button: "true",
                dangerMode: "true",
            }).then((willCancel) => {
                if(willCancel){

                    window.location.href = urlToRedirect
                }
            })
            ;
        }
      </script>
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