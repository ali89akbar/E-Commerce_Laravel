<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function redirect(){
        $usertype = Auth::user()->usertype;
    if($usertype=='1')
    {
        return view('admin.home');
    }
    else{
        $data = product::paginate(3);
        $user = auth()->user();
        $count = cart::where('phone',$user->phone)->count();

        return view('user.home',compact('data','count'));
}
    }
    public function index(){
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else{
            $data = product::paginate(3);

            return view('user.home',compact('data'));

        }
    }
    public function addcart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user = auth()->user();
            $product = product::find($id);
            $cart = new cart;
            $cart->name =$user->name;
            $cart->phone =$user->phone;
            $cart->address =$user->address;
            $cart->product_title =$product->title;
            $cart->price =$product->price;
            $cart->quantity =$request->quantity;
            $cart->save();



            return redirect()->back()->with('message','Product Added Successfully');

        }
        else{
            return redirect('login');
        }
    }
    public function showcart(){
        $user = auth()->user();
        $count = cart::where('phone',$user->phone)->count();
        $cart = cart::where('phone',$user->phone)->get();

        return view('user.showcart',compact('count','cart'));
    }
    public function deletecart($id)
    {
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back()->with('message','Product deleted Successfully');
    }
    public function confirmorder(Request $request)
    {
        $user = auth()->user();
        $name = $user->name;
        $phone = $user->phone;
        $address = $user->address;
        foreach ($request->productname as $key => $productname) {

            $order = new order;
            $order->product_name=$request->productname[$key];
            $order->price=$request->price[$key];
            $order->quantity=$request->quantity[$key];
            $order->name=$name;
            $order->phone=$phone;
            $order->address=$address;
            $order->status='not delivered';
            $order->save();
            
        }
        DB::table('carts')->where('phone',$phone)->delete();
        return redirect()->back()->with('message','Product Ordered Successfully');
        
    }
    public function products(){
        $data = product::paginate(3);
        $user = auth()->user();
        $count = cart::where('phone',$user->phone)->count();

        return view('product',compact('data','count'));
    }
    public function contacts(){
        $user = auth()->user();
        $count = cart::where('phone',$user->phone)->count();
        return view('contact',compact(('count')));


    }
    public function home(){
        return view('home');
    }
    public function about(){
        $user = auth()->user();
        $count = cart::where('phone',$user->phone)->count();

        return view('about',compact('count'));
    }
}
