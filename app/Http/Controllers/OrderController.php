<?php

namespace App\Http\Controllers;

use App\Models\Custaddresss;
use App\Models\customer;
use App\Models\order;
use App\Models\ordereditem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders(){
        $header = "order";
        $orders=order::all();
        return view('orders.order',compact('orders'), ['header' => $header]);
    }

    public function OrderStaUpd(Request $req){
        $orderstatusupdate=order::where('id',$req->id)->first();
        $orderstatusupdate->update([
            'order_status'=>$req->status
        ]);

        $data['success']='success';

        echo json_encode($data);
    }
    public function PaymentStaUpd(Request $req)
    {
        $paymentstatusupdate=order::where('id',$req->id)->first();
        $paymentstatusupdate->update([
            'payment_status'=>$req->pstatus
        ]);

        $data['success']='success';

        echo json_encode($data);
    }

    public function ViewOrders($id){
        $header = "order";
        $orders=order::where('id', $id)->first();
        return view('orders.vieworder',compact('orders'), ['header' => $header]);
    }
}
