<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Products;

use App\Models\Cart;

use App\Models\Order;

use RealRashid\SweetAlert\Facades\Alert;

use Session;

use Stripe;

     

class HomeController extends Controller

{

    public function dashboard(){
        $products=Products::paginate(9);
        return view('dashboard', compact('products'));
    }

    public function index(){
        $products=Products::all(); //Retuns eloquent data

        // $products = Products::paginate(6); // Paginate with 10 items per page
        return view('home.userpage', compact('products'));
    }
    //Create redirect function for both home and admin pages
    public function redirect()
    {
        $usertype=Auth::user()->user_type;

        $total_products=products::all()->count();
        $total_orders=order::all()->count();
        $total_users=user::all()->count();
  
        $order=order::all();
        $total_revenue=0;
  
        foreach($order as $orde){
          $total_revenue=$total_revenue + $orde->price;
        }
  
        $total_delivered=order::where('delivery_status', '=', 'delivered')->get()->count();
  
        $total_processing=order::where('delivery_status', '=', 'processing')->get()->count();
  
        

        if ($usertype=='1') {
            return view('admin.home', compact('total_products', 'total_orders', 'total_users', 'total_revenue', 'total_delivered', 'total_processing'));
        }

        else{
            $products = Products::all(); // Paginate with 10 items per page
            return view('home.userpage', compact('products'));
        }
    }

    public function product_details($id)
    {
        $product=Products::findOrFail($id);

        // if (!$product) {
        //     return redirect()->route('home')->with('error', 'Product not found');
        // }
        return view('home.product_details', compact('product'));
    }

    function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user=Auth::user();
            $userid=$user->id;
            $product=products::find($id);
            $product_exist_id=cart::where('Product_id')->where('user_id', '=', $userid)->get('id')->first();
            // dd($user);

            if($product_exist_id!=null){
                $cart=cart::find($product_exist_id)->first();
                $quantity=$cart->quantity;

                // $cart->quantity=$quantity + $request->quantity;

                                // if($product->discount_price!=null)
                // {   
                //     //  With quantity more than 1

                //     // $cart->price=$product->dicount_price * $request->quantity;

                //     //  Without quantity more than 1
                //     $cart->price=$product->dicount_price * $request->quantity;
                // }
                // else{
                //     // With quantity more than 1

                //     // $cart->price=$product->price * $request->quantity;

                //     // Without quantity more than 1
                //     $cart->price=$product->price;
                // }

                $cart->save();
                Alert::success('Product Added Successfully', 'We have added product to the cart');

                return redirect()->back();
            }
            else{
                $cart=new Cart;
                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->user_id=$user->id;
                $cart->product_title=$product->title;
                $cart->price=$product->price;



                $cart->image=$product->image;
                $cart->product_id=$product->id;

                // $cart->quantity=$request->quantity;

                $cart->save();
                
                return redirect()->back()->with('message', 'Product Added Successfully');


            }
            
        }

        else{
            return redirect('login');
        }

    }

    public function show_cart()
    {
        if(Auth::id())
        {
           
        $id=Auth::user()->id;
        $carts=cart::where('user_id', '=', $id)->get();
        return view('home.showcart', compact('carts'));
        }else{
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart=cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    public function cash_order()
    {
        $user=Auth::user();
        $userid=$user->id;

        $data=cart::where('user_id', '=', $userid)->get();

        foreach ($data as $key => $dat) {
            $order=new Order;

            $order->name=$dat->name;
            $order->email=$dat->email;
            $order->phone=$dat->phone;
            $order->address=$dat->address;
            $order->user_id=$dat->user_id;
            $order->product_title=$dat->product_title;
            $order->price=$dat->price;
            // $order->quantity=$dat->quantity;
            $order->image=$dat->image;
            $order->product_id=$dat->product_id;


            $order->payment_status='cash on delivery';

            $order->delivery_status='Processing';

            $order->save();


            $cart_id=$dat->id;
            $cart=cart::find($cart_id);

            $cart->delete();
            // dd($data);
        }

        return redirect()->back()->with('message', 'We have Recieved your order. We will connect soon...');
       
    }

    public function stripe($totalprice)
    {
        return view('home.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => 100 * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Thanks for payment" 

        ]);

      

        Session::flash('success', 'Payment successful!');

              

        return back();

    }

    public function show_order()
    {
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;

            $order=order::where('user_id', '=', $userid)->get();
            return view('home.order', compact('order'));

        }else{
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order=order::find($id);
        
        $order->delivery_status='You canceled the order';
        // dd($order->delivery_status);
        $order->save;
        return redirect()->back();
    }

    public function product_search(Request $request){
        $search_text=$request->search;
        $product=products::where('title', 'LIKE', "%$search_text%")->get();

        return view('home.userpage', compact('product'));
    }

    public function product(){
        $products=Products::paginate(18);
        return view('home.all_product', compact('products'));
    }

    public function search_product(Request $request){
        $search_text=$request->search;
        $product=products::where('title', 'LIKE', "%$search_text%")->get();

        return view('home.userpage', compact('product'));
    }

    public function about(){
        $products = Products::paginate(6);
        return view('home.about', compact('products'));
    }

    public function support(){
        $products = Products::paginate(6);
        return view('home.support', compact('products'));
    }
}
