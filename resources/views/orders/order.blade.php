@extends('layouts.Admin')
@section('title')
    Orders
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Orders</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="/girokab-admin/customer-area"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li> -->

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header">

                                <button type="button" class="btn yellowbtn" value="Submit"
                                    onclick="window.location.href='/add-product-category'" id="renewbt1"
                                    style="float: right;"> Add New</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Order Details</th>
                                            <th>Customer Details</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            @php
                                                $cust = DB::table('customers')
                                                    ->where('id', $order->customer_id)
                                                    ->first();
                                                $custadrs = DB::table('custaddressses')
                                                    ->where('id', $order->address_id)
                                                    ->first();
                                            @endphp
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    Payment Type: <b>{{ $order->payment_type }}</b><br>
                                                    Reference Id: <b>{{ $order->reference_id }}</b><br>
                                                    Order On: <b>{{ $order->ordered_on }}</b><br>
                                                </td>
                                                <td>
                                                    Name: <b>{{ $cust->name }}</b><br>
                                                    Mobile: <b>{{ $cust->mobile }}</b><br>
                                                    Email: <b>{{ $cust->email }}</b><br>
                                                    Address: <b>{{ $custadrs->address }}</b><br>
                                                </td>
                                                <td>
                                                    <small>Order Status:</small><br>
                                                    <select id="status" class="form-control  btn-primary"
                                                        onchange="changeOrderStatus(this.value,{{ $order->id }})"
                                                        style="max-width:140px; min-width: 100px; padding: 2px; height: auto;">
                                                        <option value="Pending"
                                                            @if ($order->order_status == 'Pending') selected @endif>Pending
                                                        </option>
                                                        <option value="Accepted"
                                                            @if ($order->order_status == 'Accepted') selected @endif>Accepted
                                                        </option>
                                                        <option value="Processing"
                                                            @if ($order->order_status == 'Processing') selected @endif>Processing
                                                        </option>
                                                        <option value="Delivered"
                                                            @if ($order->order_status == 'Delivered') selected @endif>Delivered
                                                        </option>
                                                    </select>

                                                    <small>Payment Status:</small><br>
                                                    <select id="pstatus" class="form-control"
                                                        onchange="changePaymentStatus(this.value, {{ $order->id }})"
                                                        style="max-width:140px; min-width: 100px; padding: 2px; height: auto;">
                                                        <option value="Pending"
                                                            @if ($order->payment_status == 'Pending') selected @endif>Pending
                                                        </option>
                                                        <option value="Success"
                                                            @if ($order->payment_status == 'Success') selected @endif>Success
                                                        </option>
                                                        <option value="Failed"
                                                            @if ($order->payment_status == 'Failed') selected @endif>Failed
                                                        </option>
                                                    </select>

                                                    <a href="{{ route('view.orders', $order->id) }}"
                                                        class="btn btn-secondary btn-sm" title="Edit Product"
                                                        style="color: white; font-size:15px; font-weight: 600; margin:2px;">
                                                        <i class="fa fa-eye" style="font-size:16px"></i> View Details
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>


                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->





    <!-- Page specific script -->

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
