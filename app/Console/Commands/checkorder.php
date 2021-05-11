<?php

namespace App\Console\Commands;

use App\Order;
use App\Jersey;
use Carbon\Carbon;
use App\OrderDetail;
use Illuminate\Console\Command;

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
    protected $description = 'Checking if payment more then 24 hours';

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

        $date_now = Carbon::now();
        $ordersdate = Order::select('status','updated_at','id')->where('status','!=',0)->get();
        
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

        $count_orders = Order::where('status',3)->count();
        echo 'Checking... ';
        if($count_orders){
            echo ' failed orders : ' . $count_orders;
        }else{
            echo ' not found ';
        }

        
    }
}
