@extends('homeweb.layouts.master')
@section('content')
    <!-- cart  -->
    <div class="container-main">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-main-head-div">
                    <h3 class="mb-0 shop-text text-center">Cart Items</h3>
                </div>
            </div>
        </div>
        <div class="cart-main-dv">
            <div class="row">

                @php
                    $sum = 0;
                    $cnt = 0;
                @endphp

                @foreach ($cart as $cartitems)
                    @php
                        $product = DB::table('products')
                            ->where('id', $cartitems->GetUnit->prod_id)
                            ->first();
                        $sum = $sum + $cartitems->GetUnit->offer_price * $cartitems->quantity;
                        $cnt = $cnt + $cartitems->quantity;
                    @endphp
                    <div class="col-lg-12">
                        <div class="cart-box">
                            <div class="cart-img-box">
                                <img class="cart-product-image" src="{{ $product->image1 }}" alt="">
                            </div>
                            <div class="cart-content-box">
                                <h4 class="mb-0 cart-product-name">{{ $product->name_english }}</h4>
                                <h4 class="mb-0 cart-product-name">{{ $cartitems->GetUnit->name }} *
                                    {{ $cartitems->quantity }}</h4>


                                <p class="mb-0 cart-sub-text">{!! $product->description_eng !!}</p>
                                <div class="cart-price-dv">
                                    <h3 class="cart-price mb-0">
                                        ₹{{ $cartitems->GetUnit->offer_price * $cartitems->quantity }}</h3>
                                    <h3 class="mb-0 discount-price-cart">
                                        ₹{{ $cartitems->GetUnit->price * $cartitems->quantity }}</h3>
                                </div>
                                <div class="quantity-delet-icon">
                                    <div class="qntity">
                                        <h5 class="mb-0 symbol-q" onclick="subtractQuantity('{{$cartitems->id}}')">-</h5>
                                        <input type="text" class="text-center" name="quantity" id="quantity"
                                            value="{{ $cartitems->quantity }}" min="1">
                                        <h5 class="mb-0 symbol-q" onclick="addQuantity('{{$cartitems->id}}')">+</h5>
                                    </div>
                                    <div class="delete-icon">
                                        <a onclick="delcartitem('{{$cartitems->id}}')"><i
                                                class="ri-delete-bin-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                @endforeach


                <!-- price  -->
                <div class="col-lg-12">
                    <div class="sub-total-dv">
                        <h4 class="cart-sub-total-text">Sub Total({{ $cnt }} Items):
                            <span>₹{{ $sum }}</span></h4>
                            @if (sizeOf($cart))
                            <a href="{{ route('checkout') }}" class="btn proceed-btn primary-bg text-white">Proceed to Buy</a>
                            @else
                            <a class="btn proceed-btn primary-bg text-white" style="background-color: grey">Proceed to Buy</a>
                            @endif

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


        function subtractQuantity(cid) {
            var cur_qty = $('input#quantity').val();
            if (cur_qty > 1) {
                qty = parseInt(cur_qty) - 1;
                $('#quantity').val(qty);
            }

            data = new FormData();
            data.append('cid', cid);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/sub-quantity",
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

        function addQuantity(cid) {
            var cur_qty = $('input#quantity').val();
            qty = parseInt(cur_qty) + 1;
            $('#quantity').val(qty);


            data = new FormData();
            data.append('cid', cid);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/add-quantity",
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

        function delcartitem(cid) {

            data = new FormData();

            data.append('cid', cid);
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
                        url: "/cart-item-delete",
                        data: data,
                        dataType: "json",
                        contentType: false,
                        //cache: false,
                        processData: false,

                        success: function(data) {
                            if (data['success']) {

                                Swal.fire({
                                    title: 'Deleted SuccessFully',
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
