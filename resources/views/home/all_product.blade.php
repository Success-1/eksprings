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
      <link rel="shortcut icon" href="images/logo-1.jpg" type="">
      <title>e&ksprings</title>
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
         @include('home.header')
         <!-- end header section -->
      
      <!-- product section -->
      @include('home.product_view')
      <!-- end product section -->

      <!-- subscribe-to-discount section -->
      @include('home.discount')
      <!-- end subscribe-to-discount section -->
      <!-- client section -->
      @include('home.clients')
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- end footer end -->

      <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
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