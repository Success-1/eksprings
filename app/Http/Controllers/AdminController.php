<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Products;
use App\Models\Order;
use App\Models\Delivered;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{

    public function redirect_admin()
    {
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

      return view('admin.home', compact('total_products', 'total_orders', 'total_users', 'total_revenue', 'total_delivered', 'total_processing'));
        
    }

    // View Category function
    public function view_category()
    {
      if(Auth::id()){
        $data=category::all();
        return view('admin.category', compact('data'));
      }else{
        return redirect('login');
      }
        
    }
    // add category function
    public function add_category(Request $request) 
    {
        $data = new Category;
        $data->category_name = $request->category;
        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_category($id)
    {
        $data=category::find($id);
        $data->delete();
      
        return redirect()->back()->with('message', 'Category deleted successfully');
    }

    public function view_products()
    {
        $category=category::all();
        return view('admin.products', compact('category'));
    }

    public function add_products(Request $request)
    {
        $products=new products;
        $products->title=$request->title;
        $products->description=$request->description;
        $products->price=$request->price;
        $products->quantity=$request->quantity;
        $products->discount_price=$request->ds_price;
        $products->category=$request->category;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product', $imagename);

        $products->image=$imagename;

        $products->save();

        return redirect()->back()->with('message', 'Product added Successfully');

        return redirect()->back;
        // 
    }

    public function show_products(){
      $products=products::all();
      return view('admin.show_products', compact('products'));
    }

    public function delete_product($id){
      $product=products::find($id);
      $product->delete();
      return redirect()->back()->with('message', 'Product Deleted successfully');
    }

    public function edit_product($id){
      $product=products::find($id);
      $category=category::all();

      return view('admin.edit_product', compact('product', 'category'));
    }

    public function edit_product_confirm(Request $request, $id)
    {

      if(Auth::id()){
        $product=products::find($id);

      $product->title=$request->title;
      $product->title=$request->description;
      $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->ds_price;
        $product->category=$request->category;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product', $imagename);

        $product->image=$imagename;
      $product->save();

      return redirect()->route('show_products');
      }else{
        return redirect('login');
      }
      
    }

    public function order()
    {
        $order=order::all();
        return view('admin.order', compact('order'));
    }

    public function delivered($id){

      $order=order::find($id);
      $order->delivery_status="delivered";
      $order->payment_status="Paid";


      $order->save();

      return view('admin.order');
    }

    public function searchdata(Request $request)
    {
      $searchText=$request->search;
      $order=order::where('name', 'LIKE', "%$searchText%")->orWhere('phone', 'LIKE', "%$searchText%")->orWhere('product_title', 'LIKE', "%$searchText%")->orWhere('price', 'LIKE', "%$searchText%")->get();

      return view('admin.order', compact('order'));

    }


}
