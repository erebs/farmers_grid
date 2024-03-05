@extends('layouts.Admin')
@section('title')
    Orders-details
@endsection

@section('contents')
    <!-- /.content-header -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-10">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="background:#d11409; color:#fff;">
                                <h3 class="card-title text-white;">Order ID : #{{ $orders->id }}</h3>
                            </div>
                            <div class="card-body table-responsive ">
                                <div class="row" style="margin: 0px; padding: 0px;">
                                    @php
                                        $cust = DB::table('customers')
                                            ->where('id', $orders->customer_id)
                                            ->first();
                                        $custadrs = DB::table('custaddressses')
                                            ->where('id', $orders->address_id)
                                            ->first();
                                    @endphp
                                    <div class="col-md-5">
                                        Name:
                                        <b>{{ $cust->name }}</b><br>
                                        Number:
                                        <b>{{ $cust->mobile }}</b><br>
                                        Email:
                                        <b>{{ $cust->email }}</b><br>
                                        Address:
                                        <b>{{ $custadrs->address }},{{ $custadrs->district }},{{ $custadrs->state }}</b><br>
                                        Pincode:
                                        <b>{{ $custadrs->pincode }}</b><br>
                                        Landmark:
                                        <b>{{ $custadrs->landmark }}</b><br>
                                    </div>
                                    @php
                                        $items = DB::table('ordereditems')
                                            ->where('order_id', $orders->id)
                                            ->get();
                                    @endphp

                                    <div class="col-md-3" style="border-left: 1px solid #bbb;">
                                        @php
                                            $sum = 0;
                                        @endphp
                                        @foreach ($items as $oredritem)
                                            @php
                                                $unit = App\models\unit::where('id', $oredritem->unit_id)->first();
                                                $sum = $sum + $oredritem->amount * $oredritem->quantity;

                                            @endphp

                                            Name: <b>{{ $unit->GetProd->name_english }}</b><br>
                                            <!-- Price: <b>₹58</b><br>
                                            Offer Price: <b>₹55</b><br> -->
                                            Quantity: <b>{{ $oredritem->quantity }}</b><br>
                                            Total: <b
                                                class="text-primary">₹{{ $oredritem->quantity * $oredritem->amount }}</b><br>

                                            <hr>
                                        @endforeach
                                        Total Amount : <b>₹{{ $sum }}</b>
                                    </div>


                                    <div class="col-md-4" style="border-left: 1px solid #bbb;">
                                        <div class="row">
                                            <div class="col-md-12" style="margin-top:4px;">Payment Type:
                                                <b>{{ $orders->payment_type }}</b>
                                            </div>
                                            <div class="col-md-12" style="margin-top:4px;">Reference Id:
                                                <b>{{ $orders->reference_id }}</b>
                                            </div>
                                            <div class="col-md-12" style="margin-top:4px;">Note: <b></b></div>
                                            <div class="col-md-6" style="margin-top:4px;">Order Status:</div>
                                            <div class="col-md-6" style="margin-top:4px;">
                                                <select id="status" class="form-control  btn-primary" onchange="changeOrderStatus(this.value,{{ $orders->id }})"
                                                    style="max-width:140px; min-width: 100px; padding: 2px; height: auto;">
                                                    <option value="Pending"
                                                        @if ($orders->order_status == 'Pending') selected @endif>Pending </option>
                                                    <option value="Accepted"
                                                        @if ($orders->order_status == 'Accepted') selected @endif>Accepted</option>
                                                    <option value="Processing"
                                                        @if ($orders->order_status == 'Processing') selected @endif>Processing
                                                    </option>
                                                    <option value="Delivered"
                                                        @if ($orders->order_status == 'Delivered') selected @endif>Delivered</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6" style="margin-top:4px;">Payment Status:</div>
                                            <div class="col-md-6" style="margin-top:4px;">
                                                <select id="status" class="form-control" onchange="changePaymentStatus(this.value, {{ $orders->id }})"
                                                    style="max-width:140px; min-width: 100px; padding: 4px; height: auto;">
                                                    <option value="Pending"
                                                        @if ($orders->payment_status == 'Pending') selected @endif>Pending</option>
                                                    <option value="Success"
                                                        @if ($orders->payment_status == 'Success') selected @endif>Success</option>
                                                    <option value="Failed"
                                                        @if ($orders->payment_status == 'Failed') selected @endif>Failed</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <script>
        function changeOrderStatus(status, id) {
            data = new FormData();

            data.append('status', status);
            data.append('id', id);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/order-status-up",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {

                        window.location.href = window.location.href;
                    }
                }
            })
        }

        function changePaymentStatus(pstatus, id) {
            data = new FormData();

            data.append('pstatus', pstatus);
            data.append('id', id);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/payment-status-up",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {

                        window.location.href = window.location.href;
                    }
                }
            })
        }
    </script>
@endsection
