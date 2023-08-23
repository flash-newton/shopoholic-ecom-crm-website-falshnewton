<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $duration ="1";

    public function changestatus($order_id){
        $order = Order::where('id',$order_id)->first();

        if ($order->status === 'In progress') {
            $order->status = 'Delivered';
            $order->save();
        }
        else if($order->status === 'Delivered'){
            $order->status = 'In progress';
            $order->save();
        }
    }

    public function render()
    {
        $sq = Order::query();

        if ($this->duration === '1') {
            $sq->whereDate('created_at', now()->format('Y-m-d'));
        } elseif ($this->duration === '7') {
            $sq->whereDate('created_at', '>=', now()->subDays(7)->format('Y-m-d'));
        }

        $ord = $sq->orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.orders.main',['ord'=>$ord]);
    }
}
