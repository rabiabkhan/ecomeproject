<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\MyFirstNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use PDF;


class AdminController extends Controller
{
  public function view_category()
  {
    $category = Category::get();
    return view('admin.category', compact('category'));
  }
  public function add_category(Request $request)
  {

    $category = Category::create([
      'category_name' => $request->name
    ]);
    $category->save();
    return redirect()->back()->with('message', 'Category Added succuessfylly!');
  }
  public function dele_category($id)
  {
    Category::find($id)->delete();

    return redirect()->back()->with('message', 'Category delete successfully');
  }

  public function view_product()
  {
    $category = Category::all();

    return view('admin.product', compact('category'));
  }

  public function add_product(Request $request)
  {
    $product = Product::create([
      'title' => $request->title,
      'description' => $request->description,
      'category' => $request->category,
      'quntity' => $request->quantity,
      'price' => $request->price,
      'discount' => $request->discount,
    ]);

    if ($request->image) {
      $image = $request->image;
      $imagename = time() . '.' . $image->getClientOriginalExtension();
      $request->image->move('product', $imagename);
      $product['image'] = $imagename;
    }


    $product->save();
    return redirect()->back()->with('message', 'product Added successfully!');
  }

  public function show_product()
  {
    $product = Product::all();


    return view('admin.showproduct', compact('product'));
  }

  public function edit_product($id)
  {
    $product = Product::find($id);
    $category = Category::all();

    return view('admin.productedit', compact('product', 'category'));
  }

  public function product_update(Request $request, $id)
  {

    $product = Product::find($id);
    $product->title = $request->title;
    $product->description = $request->description;
    $product->category = $request->category;
    $product->quntity = $request->quantity;
    $product->price = $request->price;
    $product->discount = $request->discount;
    if ($request->image) {
      $image = $request->image;
      $imagename = time() . '.' . $image->getClientOriginalExtension();
      $request->image->move('product', $imagename);
      $product['image'] = $imagename;
    }

    $product->save();
    return redirect()->route('show_product');
  }

  public function product_delete($id)
  {
    Product::find($id)->delete();
    return redirect()->back()->with('message', 'product delete successfully!');
  }

  public function view_order()
  {
    $order = Order::all();


    return view('admin.order', compact('order'));
  }

  public function deliverd($id)
  {
    $data = Order::find($id);
    $data->delivery_status = 'Delivered';
    $data->payment_satus = 'Paid';
    $data->save();
    return redirect()->back();
  }

  public function print_pdf($id)
  {
    $order = Order::find($id);


    $pdf = PDF::loadView('admin.pdf', compact('order'));

    return $pdf->download('order_details.pdf');
  }

  public function send_email($id)
  {
    $mail = Order::find($id);

    return view('admin.mailinfo', compact('mail'));
  }

  public function user_send_email(Request $request, $id)
  {

    $order = Order::find($id);
    $detail = [
      'greeting' => $request->greeting,
      'firstline' => $request->firstline,
      'body' => $request->body,
      'emailbutton' => $request->emailbutton,
      'emailurl' => $request->emailurl,
      'emaillastline' => $request->emaillastline,
    ];

    Notification::send($order, new MyFirstNotification($detail));
    return redirect()->back();
  }

  public function search(Request $request)
  {
    $searchtext = $request->search;
    $order = Order::where('name', 'LIKE', "%$searchtext%")->orwhere('product_title', 'LIKE', "%$searchtext%")->orwhere('phone', 'LIKE', "%$searchtext%")->get();
    return view('admin.order', compact('order'));
  }
}
