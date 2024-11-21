<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
				@include('admin.css')
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
								@include('admin.body')
    <!-- container-scroller -->
    <!-- plugins:js -->
    	@include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>