<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
	@include('admin.css')
    <style>
        .div_center{
            text-align:center;
            padding-top: 40px;  
        }

        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color{
            color: black;
        }

        .center{
            margin: auto;
            width: 50%;
            
            /* text-align: center; */
            margin-top: 30px;
            border: 3px solid green;
        }

        table, th, td{
            padding: 5px 20px;
        }

        li{
            color: #ffffff;
            
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
                    <h2 class="h2_font">
                        Add Category
                    </h2>
                    <form action="{{ url('/add_category') }}" method="POST">
                        @csrf
                        <input type="text" class="input_color" name="category" id="category" placeholder="Write category name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                    </form>
                </div>

                <table class="center">
                    <tr>
                        <th>Category name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($data as $dat)
                    <tr>
                        <td>
                            <ol>
                                <li>
                                {{$dat->category_name}}
                                </li>
                            </ol>
                        </td>
                        <td>
                            <a class="btn btn-info" href="">Edit</a>
                            <a onclick="return confirm('You want to delete a category')" class="btn btn-danger" href="{{ url('delete_category', $dat->id) }}">Delete</a>
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