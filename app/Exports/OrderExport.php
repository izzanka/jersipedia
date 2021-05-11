<?php

namespace App\Exports;

use App\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class OrderExport implements FromView
{
    public function view(): View
    {
        return view('admin.order-export-excel',[
            'orders' =>  Order::whereNotIn('status',[0,3])->latest()->get()
        ]);
    }
}
