<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
       <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style>
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
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header');
         <!-- end header section -->


               <div class="col-sm-6 col-md-4 col-lg-6" style="margin: auto;  padding: 30px; padding-right: 10px; border: 1px solid black;">
                  <div class="box">

                     <div class="img-box">
                        <img src="product/{{$product->image}}" alt="" width="200" height="260" style="padding: 20px;">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$product->title}}
                        </h5>
                        <h6>
                        <h6>
                           Product price :  ₦
                        {{$product->price}}K
                        </h6>
                        </h6>
                        <!-- @if($product->discount_price!=null)
                        <h6>
                        show price_discount
                        </h6>
                        @endif
 
                        <h6>-->
                        Product category :    {{$product->category}}
                        </h6>
                        <h6>
                        Product description :  {{$product->description}}
                        </h6>
                        <h6>
                        Product quantity :  {{$product->quantity}}
                        </h6>

                        <form action="{{ url('add_cart', $product->id) }}" method="post">
                              @csrf
                              <!-- <a href="" class="option2">
                                 
                              </a> -->
                              <input type="submit" name="" id="" value="Add to cart" class="option2">
                                 
                           <!-- <div class="option2" style="display: flex; justify-content: center; align-items: center;">
                                    <input type="submit" name="submit" id="submit" value="Add to cart">
                                    <input type="number" name="number" id="number" value="1" min="1" style="border: 0; display: inline-block; width: 50px" class="option2">
                                 </div> -->
                           </form>
                     </div>
                  </div>
                  
               </div>
      <!-- footer start -->
      @include('home.footer');
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