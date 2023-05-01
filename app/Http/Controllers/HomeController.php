<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class HomeController extends Controller
{
   public function index()
   {


      $product = Product::paginate(3);
      $comment = Comment::all();
      $reply = Reply::all();
      return view('home.userpage', compact('product', 'comment', 'reply'));
   }


   public function product_details($id)
   {
      $product = Product::find($id);


      return view('home.product_details', compact('product'));
   }

   public function add_cart(Request $request, $id)
   {
      if (Auth::id()) {

         $user = Auth::User();
         $product = Product::find($id);
         $product_exit = Cart::where('product_id', '=', $id)->where('user_id', '=', $user->id)->get('id')->first();


         if ($product_exit) {

            $cart = Cart::find($product_exit)->first();
            $quantity = $cart->quantity + $request->quantity;
            if ($product->discount != null) {
               $cart->price = $product->discount * $quantity;
            } else {
               $cart->price = $product->price * $quantity;
            }
            $cart->save();
            return redirect()->back()->with('message', 'Product Added successfully!');
         } else {

            $cart = Cart::create([
               'name' => $user->name,
               'email' => $user->email,
               'phone' => $user->phone,
               'address' => $user->address,
               'product_title' => $product->title,
               'quantity' => $product->quntity,
               'product_title' => $product->title,
               'image' => $product->image,
               'product_id' => $product->id,
               'user_id' => $user->id,

            ]);


            $cart->save();

            return redirect()->back()->with('message', 'Product Added successfully!');
         }
      } else {

         return redirect('login');
      }
   }
   public function show_cart()
   {
      if (Auth::id()) {
         $id = Auth::User()->id;
         $cartproduct = Cart::where('user_id', '=', $id)->get();
         return view('home.show-cart', compact('cartproduct'));
      } else {

         return redirect('login');
      }
   }

   public function remove_cart($id)
   {
      Cart::find($id)->delete();

      return redirect()->back();
   }
   public function cash_order()
   {
      $id = Auth::User()->id;
      $data = Cart::where('user_id', $id)->get();
      foreach ($data as $data) {
         $order = new Order();
         $order->name = $data->name;
         $order->email = $data->email;
         $order->phone = $data->phone;
         $order->address = $data->address;
         $order->product_title = $data->product_title;
         $order->quantity = $data->quantity;
         $order->price = $data->price;
         $order->image = $data->image;
         $order->product_id = $data->product_id;
         $order->user_id = $data->user_id;
         $order->payment_satus = 'cash on delievry';
         $order->delivery_status = 'proccessing';
         $order->save();
         $cart_id = $data->id;
         $cartdata = Cart::find($cart_id)->delete();
      }

      return redirect()->back();
   }


   public function stripe($totalprice)
   {
      return view('home.stripe', compact('totalprice'));
   }


   public function stripePost(Request $request, $totalprice)
   {

      Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      Stripe\Charge::create([
         "amount" => $totalprice * 100,
         "currency" => "usd",
         "source" => $request->stripeToken,
         "description" => "Thanks for Payment!"
      ]);

      Session::flash('success', 'Payment successful!');

      return back();
   }
   public function redirect()
   {
      $usertype = Auth::User()->usertype;
      if ($usertype == '1') {

         $totalproduct = Product::all()->count();
         $totalorder = Order::all()->count();
         $totalcustomer = User::all()->count();

         $order = Order::all();
         $totalrevenue = 0;
         foreach ($order as $order) {
            $totalrevenue = $totalrevenue + $order->price;
         }

         $totaldelivery = Order::where('delivery_status', '=', 'Delivered')->get()->count();
         $totalproccessing = Order::where('delivery_status', '=', 'proccessing')->get()->count();
         return view('admin.home', compact('totalproduct', 'totalorder', 'totalcustomer', 'totalrevenue', 'totaldelivery', 'totalproccessing'));
      } else {



         return view('home.userpage');
      }
   }


   public function show_order()
   {

      if (Auth::id()) {

         $user = Auth::User();
         $userid = $user->id;
         $order = Order::where('user_id', '=', $userid)->get();
         return view('home.order', compact('order'));
      } else {
         return redirect('login');
      }
   }
   public function cancel_order($id)
   {

      $order = Order::find($id);
      $order->delivery_status = 'Cancel your ordered';
      $order->save();
      return redirect()->back();
   }

   public function add_comment(Request $request)
   {

      if (Auth::id()) {


         $comment = Comment::create([
            'name' => Auth::User()->name,
            'user_id' => Auth::User()->id,
            'comment' => $request->comment
         ]);
         $comment->save();
         return redirect()->back();
      } else {

         return redirect('login');
      }
   }

   public function comment_reply(Request $request)
   {


      if (Auth::id()) {

         $user = Auth::User();
         $reply = Reply::create([
            'name' => $user->name,
            'comment_id' => $request->commentId,
            'reply' => $request->comment,
            'user_id' => $user->id
         ]);
         $reply->save();
         return redirect()->back();
      } else {

         return redirect('login');
      }
   }

   public function product_search(Request $request)
   {
      $comment = Comment::orderby('id', 'desc')->get();
      $reply = Reply::all();
      $searchtext = $request->search;
      $product = Product::where('title', 'LIKE', "%$searchtext%")->orWhere('category', 'LIKE', "$searchtext")->paginate(2);
      return view('home.userpage', compact('product', 'comment', 'reply'));
   }

   public function products()
   {
      $product = Product::paginate(3);
      $comment = Comment::all();
      $reply = Reply::all();

      return view('home.all_products', compact('product', 'comment', 'reply'));
   }

   public function search_product(Request $request)
   {
      $comment = Comment::orderby('id', 'desc')->get();
      $reply = Reply::all();
      $searchtext = $request->search;
      $product = Product::where('title', 'LIKE', "%$searchtext%")->orWhere('category', 'LIKE', "$searchtext")->paginate(2);
      return view('home.all_products', compact('product', 'comment', 'reply'));
   }
}