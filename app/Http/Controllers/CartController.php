<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Custaddresss;
use App\Models\order;
use App\Models\ordereditem;
use App\Models\product;
use App\Models\unit;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function AddtoCart(Request $req){
        if (auth()->check()) {
            $customer_id= auth()->user()->id;
            // $product_id=$pid;
            $unit_id=$req->unit_id;



            if (cart::where('customer_id',$customer_id)->where('unit_id',$unit_id)->exists())
             {
              $cartitems=cart::where('customer_id',$customer_id)->where('unit_id',$unit_id)->first();
              cart::where('id',$cartitems->id)->update([
                'quantity'=> $cartitems->quantity + $req->quantity
              ]);
            }else {
                $cart=cart::create([
                    'customer_id'=>$customer_id,
                    'unit_id'=>$unit_id,
                    'quantity'=>$req->quantity,
                ]);
            }

                $data['success']= 'success';
        }else {
            $data['loginerror']= 'loginerror';
        }

        echo json_encode($data);
    }



    public function CartItems(){
        // $cart = cart::join('units', 'carts.unit_id', '=', 'units.id')
        // ->join('products', 'units.prod_id', '=', 'products.id')
        // ->select('carts.*', 'units.*', 'products.*')
        // ->where('carts.customer_id', auth()->user()->id)
        // ->get();
        $cart=cart::where('customer_id',auth()->user()->id)->get();
        return view('homeweb.cart',compact('cart'));
    }

    public function DelCartItem(Request $req){
        cart::where('id',$req->cid)->where('customer_id',auth()->user()->id)->delete();
        $data['success'] = 'success';
        echo json_encode($data);
    }



    public function AddQuantity(Request $request)
    {
        $addquantity=cart::where('id',$request->cid)->first();

        $addquantity->update([
            'quantity'=>$addquantity->quantity + 1
        ]);

        $data['success']='success';

        echo json_encode($data);


    }

    public function SubQuantity(Request $request)
    {
        $addquantity=cart::where('id',$request->cid)->first();

        $addquantity->update([
            'quantity'=>$addquantity->quantity - 1
        ]);

        $data['success']='success';

        echo json_encode($data);


    }







    public function address(){
        return view('homeweb.addressadd');
    }
    public function SaveAddress(Request $request){
        if (Custaddresss::where('cust_id',auth()->user()->id)->where('status','active')->exists()) {
            $addrsave=Custaddresss::create([
                'cust_id'=>auth()->user()->id,
                'name'=>$request->name,
                'mobile'=>$request->mobile,
                'address'=>$request->address,
                'district'=>$request->district,
                'state'=>$request->state,
                'pincode'=>$request->pincode,
                'landmark'=>$request->landmark,
            ]);
        }else {
            $addrsave=Custaddresss::create([
                'cust_id'=>auth()->user()->id,
                'name'=>$request->name,
                'mobile'=>$request->mobile,
                'address'=>$request->address,
                'district'=>$request->district,
                'state'=>$request->state,
                'pincode'=>$request->pincode,
                'landmark'=>$request->landmark,
                'default'=>1,
            ]);
        }



        if ($addrsave) {
            $data['success']= 'success';
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }
    public function EditAddress($id){
        $address=Custaddresss::where('id',$id)->where('cust_id',auth()->user()->id)->first();
        return view('homeweb.addressedit',compact('address'));
    }
    public function UpdateAddress(Request $request){

        $addredit=Custaddresss::where('id',$request->ad_id)->where('cust_id',auth()->user()->id)->update([
            'cust_id'=>auth()->user()->id,
            'name'=>$request->edname,
            'mobile'=>$request->edmobile,
            'address'=>$request->edaddress,
            'district'=>$request->eddistrict,
            'state'=>$request->edstate,
            'pincode'=>$request->edpincode,
            'landmark'=>$request->edlandmark,
        ]);

        if ($addredit) {
            $data['success']= 'success';
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }
    public function DeleteAddress(Request $req){
        $addressrow=Custaddresss::where('id',$req->aid)->first();
        if ($addressrow->default == 1) {
           $newaddres= Custaddresss::where('cust_id',$addressrow->cust_id)->where('status','active')->where('id','!=',$req->aid)->orderBy('id','DESC')->limit(1)->first();
           if($newaddres)
           {
            Custaddresss::where('id',$newaddres->id)->update([

                    'default'=>1

                ]);
                Custaddresss::where('id',$req->aid)->update([

                    'default'=>0,
                    'status'=>'inactive',

                ]);
           }
          else
        {
            Custaddresss::where('id',$req->aid)->update([

                'default'=>0,
                'status'=>'inactive',

            ]);
        }
        }
        else
        {
            Custaddresss::where('id',$req->aid)->update([

                'default'=>0,
                'status'=>'inactive',

            ]);
        }

        $data['success'] = 'success';
        echo json_encode($data);
    }

    public function CustAddrsDef(Request $req)
    {
        $adressdefault = Custaddresss::where('id', $req->aid)->update([
            'default' => '1',
        ]);
        $adressnotdefault = Custaddresss::where('id', '!=', $req->aid)->update([
            'default' => '0'
        ]);
        if ($adressdefault) {
            $data['success']= 'success';
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }




    public function checkout(){
        $cust_addresses = Custaddresss::where('cust_id', auth()->user()->id)->where('status', 'active')->orderBy('default','DESC')->get();
        $cart=cart::where('customer_id',auth()->user()->id)->get();
        return view('homeweb.checkout',compact('cust_addresses','cart'));
    }

    public function PlaceOrder()
    {
        $address=Custaddresss::where('cust_id',auth()->user()->id)->where('default','1')->first();
        $orders = order::create([
            'customer_id' => auth()->user()->id,
            'address_id' => $address->id,
            'reference_id' => 0,
            'payment_type' => 'cod',
            'order_status'=>'pending',
            'ordered_on' => date('Y-m-d'),
        ]);

        $lastinsertedrow = order::latest()->first();
        $cust_id = auth()->user()->id;
        $order_id = $lastinsertedrow->id;
        $cartItems = cart::where('customer_id', $cust_id)->get();

        foreach ($cartItems as $item) {
            $unit = unit::where('id', $item->unit_id)->first();
            $data = new ordereditem();

            $data->order_id = $order_id;
            $data->customer_id = $cust_id;
            $data->unit_id = $item->unit_id;
            $data->quantity = $item->quantity;
            $data->amount = $unit->offer_price;

            $data->save();
            cart::where('id', $item->id)->delete();
        }
        if ($orders) {
            $data['success']= 'success';
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }
}



