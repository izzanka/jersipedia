<?php

namespace App\Console\Commands;

use App\Order;
use App\Jersey;
use Carbon\Carbon;
use App\OrderDetail;
use App\Mail\SendMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class checkorder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkorder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if payment is more than 24 hours';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
     
        \Log::info('Checking orders is running');

        $ordersdate = Order::select('status','updated_at','id')->whereNotIn('status',2)->get();
        
        foreach($ordersdate as $order){
           $result = $order->updated_at->diffInDays();

           if($result == 1){
               $order->status = 3;
               $order->update();
               
               $orderdetails = OrderDetail::where('order_id',$order->id)->get();
                foreach($orderdetails as $orderdetail){
                    $jersey = Jersey::where('id',$orderdetail->jersey_id)->first();
                    $jersey->stock += $orderdetail->total_order;
                    $jersey->update();
                }    
           }
        }

        $orders = Order::where('status',3)->get();

        $count_orders = $orders->count();
        echo 'Failed Orders = ';
        if($count_orders){
            echo $count_orders;
        }else{
            echo 0;
        }

        foreach($orders as $order){
            $orderdetails = OrderDetail::where('order_id',$order->id)->with('order')->get();
            foreach($orderdetails as $orderdetail){
                $email = $orderdetail->order->user->email;
                $data = [
                    'title' => 'Your order failed to be confirmed',
                    'url' => route('history'),
                    'code' => $orderdetail->order->code
                ];
                Mail::to($email)->send(new SendMail($data));
            }
            $order->status = 4;
            $order->save();
        }

       
        
        
    }
}
