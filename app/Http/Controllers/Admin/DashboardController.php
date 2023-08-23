<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Orderitems;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Usersales;

class DashboardController extends Controller
{
    public function index(){

        $startpoint = Carbon::now()->subDays(6)->startOfDay(); 
        $today = Carbon::now()->endOfDay();

        $users = User::whereBetween('created_at', [$startpoint, $today])->orderBy('created_at')->get();
        $orders = Order::whereBetween('created_at', [$startpoint, $today])->orderBy('created_at')->get();
        $items = Orderitems::whereBetween('created_at', [$startpoint, $today])->orderBy('created_at')->get();

        $xline = [];
        $data_user = [];
        $data_order = [];
        $data_item = [];

        $currentdate = $startpoint->copy();
        while ($currentdate <= $today) {
             $date = $currentdate->format('M d');
            $xline[] = $date;

            $userCount = $users->filter(function ($user) use ($currentdate) {
                return $user->created_at->format('Y-m-d') === $currentdate->format('Y-m-d');
            })->count();
            $data_user[] = $userCount;

            $orderCount = $orders->filter(function ($order) use ($currentdate) {
                return $order->created_at->format('Y-m-d') === $currentdate->format('Y-m-d');
            })->count();
            $data_order[] = $orderCount;

            $itemCount = $items->filter(function ($item) use ($currentdate) {
                return $item->created_at->format('Y-m-d') === $currentdate->format('Y-m-d');
            })->count();
            $data_item[] = $itemCount;
    
            $currentdate->addDay();


            $topprod = Product::orderBy('soldcount', 'desc')->take(5)->get();

                $prods = $topprod->pluck('name')->toArray();
                $soldcount = $topprod->pluck('soldcount')->toArray();


                $totalsales = Usersales::sum('totalsales'); 
                $totalcustomers = User::where('role','0')->count();  
                $totalproducts = Product::count();
                $totalorders = Order::count();



        }
        return view('admin.dashboard', compact('xline', 'data_user', 'data_order','data_item','soldcount','prods','totalsales','totalcustomers','totalproducts','totalorders'));
}
}