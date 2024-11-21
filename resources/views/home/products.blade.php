<section class="product_section layout_padding">
          <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
               <div style="padding-left: 400px; margin: 5px auto; padding-botton: 30px;">
                    <!-- <form action="{{ url('product_search')}}" method="get" style="display: flex;">
                     @csrf
                        <input style="width: 500px" type="text" name="search" placeholder="Search for something">
                        <input type="submit" value="Search" class="btn ">
                    </form> -->
                </div>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif
            
            <div class="row">

               @foreach($products as $product)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{ url('product_details', $product->id) }}" class="option1">
                           Read More
                           </a>
                           <form action="{{ url('add_cart', $product->id) }}" method="post" >
                              @csrf
                             
                                 <input type="submit" name="" id="" value="Add to cart">
                                 
                              
                           <!-- <div class="option2" style="display: flex; justify-content: center; align-items: center;">
                                    <input type="submit" name="submit" id="submit" value="Add to cart">
                                    <input type="number" name="number" id="number" value="1" min="1" style="border: 0; display: inline-block; width: 50px" class="option2">
                                 </div> -->
                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$product->title}}
                        </h5>
                        @if($product->discount_price!=null)
                        <h6>
                        <!-- Discount price will be here -->
                        </h6>
                        @endif
                        <h6>
                        ₦{{$product->price}}K
                        </h6>
                     </div>
                  </div>
                  
               </div>

              @endforeach 
              <!-- <span style=" padding-top: 20px;">
              //
              </span> -->
              
            <div class="btn-box" style="margin: 20px auto 10px auto;">
               <a href="{{ url('/products') }}">
               View All products
               </a>
            </div>
            
         </div>
      </section>