@extends('homeweb.layouts.master')
@section('content')
    <div class="container-main">
        <div class="profile-space-main">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-main-dv">
                        <h4 class="mb-0 tab-name" onclick="showTab(0)">Profile</h4>
                        <h4 class="mb-0 tab-name" onclick="showTab(1)">Orders</h4>
                        <h4 class="mb-0 tab-name" onclick="showTab(2)">Addresses</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-main">
        <div class="row">
            <div class="tab-content">
                <div class="col-lg-12">
                    <div class="profile-dv tab-pane" id="tab1">
                        <form>

                            <div class="form-group">
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                    placeholder="" value="{{ $profile->name }}">
                            </div>
                            <div class="form-group">
                                <input type="text	" class="form-control" id="mobile" aria-describedby="emailHelp"
                                    value="{{ $profile->mobile }}">
                            </div>
                            <div class="form-group">
                                <input type="text	" class="form-control" id="email" aria-describedby="emailHelp"
                                    value="{{ $profile->email }}">
                            </div>
                            {{-- <div class="form-group">
							<input type="text	" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
						</div> --}}
                            {{-- <a href="{{ route('update.profile') }}" class="signin-btn-main primary-bg btn text-white text-center mt-4">Update Profile</a> --}}
                            <button type="" onclick="updateprof()"
                                class="signin-btn-main primary-bg btn text-white text-center mt-4">Update Profile</button>
                            <div class="log-out">
                                <a href="{{ route('user.logout') }}" class="logout-btn text-center"><i
                                        class="ri-logout-box-line"></i> Logout</a>
                            </div>


                        </form>
                    </div>
                </div>
                <div class="profile-dv tab-pane" id="tab2">
                    <div class="container-main">
                        @foreach ($orders as $order)
                            @php
                                $items = DB::table('ordereditems')
                                    ->where('order_id', $order->id)
                                    ->get();
                            @endphp
                            <div class="address-box">
                                <div class="order-box-fl">
                                    <h5 class="id-order mb-0">Order Id :#{{ $order->id }}</h5>
                                </div>
                                @foreach ($items as $item)
                                    @php
                                        $unit = App\models\unit::where('id', $item->unit_id)->first();
                                    @endphp


                                    <div class="mn">
                                        <div class="product-chekouts">
                                            <div class="main-dv-chekout">
                                                <div class="product-dv">
                                                    <img class="checkout-product-image" src="{{ $unit->GetProd->image1 }}"
                                                        alt="">
                                                </div>
                                                <div class="product-name-dv">
                                                    <h4 class="check-product-name">{{ $unit->GetProd->name_english }} *
                                                        {{ $item->quantity }}</h4>
                                                    <h4 class="check-product-name">{{ $unit->name }}</h4>
                                                </div>
                                            </div>
                                            <div class="price-dv-checkout">
                                                <h5 class="check-out-orgnl-price mb-0">
                                                    ₹{{ $item->amount * $item->quantity }}</h5>
                                                {{-- <a href="{{ route('product.single',$unit->id) }}" class="primary-color view-product-name">View Product</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="profile-dv tab-pane" id="tab3">
                    <div class="container-main">
                        @foreach ($cust_addresses as $custadrs)
                            <div class="address-boxs mb-4">
                                <div class="addrss-details">
                                    <h5 class="user-name-address mb-0">{{ $custadrs->name }}</h5>
                                    <h5 class="user-name-address mb-0">{{ $custadrs->address }}, {{ $custadrs->district }}
                                    </h5>
                                    <h5 class="user-name-address mb-0">{{ $custadrs->state }}, {{ $custadrs->pincode }}
                                    </h5>
                                    <h5 class="user-name-address mb-0">{{ $custadrs->landmark }}</h5>
                                </div>

                                <div class="addrs-btns">
                                    <div class="addrs-tick" style="float: right">

                                        <input type="checkbox" class="form-check-input" id="defadd"
                                            onclick="defaultadd('{{ $custadrs->id }}')"
                                            @if ($custadrs->default == 1) checked @endif>
                                    </div>
                                    <br>
                                    <div class="one-btn mt-3">
                                        <a href="{{ route('edit.address', $custadrs->id) }}"
                                            class="edit-btn text-white">Edit</a>
                                    </div>
                                    <div class="two-btn">
                                        <a onclick="deladrs('{{ $custadrs->id }}')" class="btns-addrss dlt-btn">Delete</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12">
                            <div class="add-adrrss-btn">
                                <a href="{{ route('address') }}" class="add-adress-btn"> + Add Address</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleCartt() {
            document.querySelector('.sidebar').classList.toggle('open-cart');
        }
        // add quantity product script
        let quantityInput = document.getElementById('quantity');

        function subtractQuantity() {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 0) {
                quantityInput.value = currentValue - 1;
            }
        }

        function addQuantity() {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Show the content of the first tab when the page loads
            showTab(0);
        });

        function showTab(tabIndex) {
            // Get all tab name elements
            const tabNames = document.querySelectorAll('.tab-name');

            // Remove the 'active' class from all tab names
            tabNames.forEach(tabName => {
                tabName.classList.remove('active');
            });

            // Add the 'active' class to the selected tab name
            tabNames[tabIndex].classList.add('active');

            // Get all tab content elements
            const tabContents = document.querySelectorAll('.tab-pane');

            // Hide all tab content
            tabContents.forEach(tabContent => {
                tabContent.classList.remove('active');
            });

            // Show the selected tab content
            tabContents[tabIndex].classList.add('active');
        }
        // image changing



        function changeImage(newImage) {
            document.getElementById('main-image').src = newImage;
        }


        function updateprof() {
            var name = $('input#name').val();
            var mobile = $('input#mobile').val();
            var email = $('input#email').val();


            if (name == '') {
                $('#name').focus();
                $('#name').css({
                    'border': '1px solid red'
                });
                $('.nameerror').show();
                $('.nameerror').text("enter name*");
                return false;
            } else

                $('#name').css({
                    'border': '1px solid #CCC'
                });
            $('.nameerror').hide();

            if (mobile == '') {
                $('#mobile').focus();
                $('#mobile').css({
                    'border': '1px solid red'
                });
                $('.nameerror').show();
                $('.nameerror').text("enter mobile*");
                return false;
            } else

                $('#mobile').css({
                    'border': '1px solid #CCC'
                });
            $('.nameerror').hide();

            if (email == '') {
                $('#email').focus();
                $('#email').css({
                    'border': '1px solid red'
                });
                $('.nameerror').show();
                $('.nameerror').text("enter name*");
                return false;
            } else

                $('#email').css({
                    'border': '1px solid #CCC'
                });
            $('.nameerror').hide();

            data = new FormData();

            data.append('name', name);
            data.append('mobile', mobile);
            data.append('email', email);

            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/update-profile",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,
                success: function(data) {
                    if (data['success']) {

                        Swal.fire({
                            title: 'Profile Updated Successfully',
                            // text: "You won't be able to revert this!",
                            icon: 'success',
                            // showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/profile'; //refresh issue
                            }
                        })
                    }
                }
            })
        }

        function defaultadd(aid) {

            var defaultadd = $('#defadd').val();

            data = new FormData();

            data.append('defadd', defaultadd);
            data.append('aid', aid);
            data.append('_token', '{{ csrf_token() }}');


            $.ajax({

                type: "POST",
                url: "/address-default",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {

                        window.location.href = window.location
                            .href;

                    }
                }
            })
        }


        function deladrs(aid) {

            data = new FormData();

            data.append('aid', aid);
            data.append('_token', '{{ csrf_token() }}');

            Swal.fire({
                title: 'Do You Want To Delete ?',
                // text: "You won't be able to revert this!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({

                        type: "POST",
                        url: "/delete-address",
                        data: data,
                        dataType: "json",
                        contentType: false,
                        //cache: false,
                        processData: false,

                        success: function(data) {
                            if (data['success']) {

                                Swal.fire({
                                    title: 'Address Deleted SuccessFully',
                                    // text: "You won't be able to revert this!",
                                    icon: 'success',
                                    // showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            }
                        }
                    })
                }
            })
        }
    </script>
@endsection
