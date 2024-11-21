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
      @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
      
      <!-- arrival section -->
      <section class="arrival_section">
         <div class="container">
            <div class="box">
               <div class="arrival_bg_box">
                  <img src="images/why-choose-us.jpg" alt="">
               </div>
               <div class="row">
                  <div class="col-md-6 ml-auto">
                     <div class="heading_container remove_line_bt">
                        <h2>
                           About <span style="color: #ffbf00;">Us</span>
                        </h2>
                        <h4>
                            Welcome to E & K Springs <span style="color: #ffbf00;">Enterprises</span> <br>
                        </h4>
                        <h6 style="color: #ffbf00;">
                            We supply high-quality leaf springs and accessories for exceptional prices.
                        </h6>
                    </div>
                     <p style="margin-top: 20px;margin-bottom: 30px;">
                        sing existing issues with your vehicle’s suspension system.

                        As standard, we stock a wide variety of light commercial and heavy commercial leaf springs to accommodate a comprehensive collection of vehicles, including trucks, vans, lorries and much more. Some of our springs are also sold with shackle pins, U-bolts and bushes, so make sure to check out our product specifications. Can’t find your leaf springs in our online store? Contact our team – we will source your leaf springs within 24 hours!

                        As a family-run business, we pride ourselves on our customer service. From answering your questions to fitting leaf springs, all of our services are performed by highly experienced, qualified fitters, offering a personable and professional experience.
                     </p>
                     <a href="{{ url('/products') }}" style=" color: #002c3e;">
                     Read more
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end arrival section -->
      
      <!-- service section -->
      @include('home.service')
      <!-- end service section -->
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->

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