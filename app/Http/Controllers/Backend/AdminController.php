<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::User()->usertype;
        if ($usertype == '1') {
            return view('backend.dashboard.index');
        } else {
            return view('/');
        }
    }

    public function eloquent()
    {
        // $comments = Post::with('comments')->get();
        // $post = Comment::find(1);
        // $comment = Post::with('comments')->get();
        // return ($comment);
        // return $comment;
        // return view('backend.eloquent', compact('comment'));



        $comment = Post::with('comments')->get();
        return view('backend.eloquent', compact('comment'));

        // return $post;
    }


    public function index()
    {

        $total_product = Product::all()->count();
        $total_order = Order::all()->count();
        $total_user = User::all()->count();

        // $orders = Order::all();
        // $total_revenue = 0;
        // foreach ($orders as $order); {
        //     $total_revenue = $total_revenue + $order->price;
        // }
        // $total_delivered = Order::where('delivery_status', '=', 'delivered')->get()->count();
        return view('backend.dashboard.index', compact('total_product', 'total_order', 'total_user'));
    }
    public function view_category()
    {
        $data = Category::all();
        return view('backend.category.view_category', compact('data'));
    }
    public function add_category(Request $request)
    {
        $data = new Category;
        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'Category Added Sucessfully!');
    }
    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully!');
    }
    public function view_products()
    {
        $category = Category::all();
        return view('backend.category.add_products', compact('category'));
    }

    public function add_products(Request $request)
    {
        $product = new Product;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . uniqid('P', 20) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/product/');
            $image->move($destinationPath, $imageName);
            $product->image = $imageName;
        } else {
            $product->image = null;
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $product->save();
        return redirect()->back()->with('message', 'Product Added Successfully');
    }
    public function show_products()
    {
        $product = Product::paginate(5);
        return view('backend.category.show_products', compact('product'));
    }
    public function delete_products($id)
    {
        $product = Product::where('id', $id)->delete();

        // $product->delete();
        return redirect()->back()->with('msg', 'Product deleted successfully!');
    }
    public function edit_products($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('backend.category.update_products', compact('product', 'category'));
    }
    public function update_products(Request $request, $id)
    {
        $product = new Product;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . uniqid('P', 20) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/product/');
            $image->move($destinationPath, $imageName);
            $product->image = $imageName;
        } else {
            $product->image = null;
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $product->save();
        return redirect()->back()->with('message', 'Product Added Successfully');
    }
    public function order()
    {
        $orders = Order::all();
        return view('backend.category.order', compact('orders'));
    }
    public function delivered($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "delivered";
        $order->save();
        return redirect()->back();
    }
    public function print_pdf($id)
    {
        $order = Order::find($id);
        $pdf = PDF::loadView('backend.category.pdf', compact('order'));
        return $pdf->download('order_details.pdf');
    }
    public function send_email($id)
    {
        $order = Order::findOrFail($id);

        return view('backend.category.email_info', compact('order'));
    }
    public function send_user_email(Request $request, $id)
    {
        $order = Order::find($id);

        $details = [
            'greeting' => $request->greeting,
            'fistline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,

        ];
        Notification::send($order, new SendEmailNotification($details));
        return redirect()->back();
    }
    public function searchdata(Request $request)
    {
        $searchText = $request->search;
        $order = Order::where('name', 'LIKE', "%searchText%")->orwhere('name', 'LIKE', "%searchText%");

        return view('backend.category.order', compact('order'));
    }
}
