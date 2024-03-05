@extends('homeweb.layouts.master')
@section('content')


	<div class="container-main checkout-page">
		<div class="row">
			<div class="col-lg-12">
				<div class="choose-addrss-dv">
					<h4 class="mb-0 text-center choose-text">Choose Address</h4>
				</div>
			</div>
			<div class="col-lg-12">
                @foreach ($cust_addresses as $cusaddrs)
                <div class="address-boxs mb-4">
					<div class="addrss-details">
						<h5 class="user-name-address mb-0">{{$cusaddrs->name}}</h5>
						<h5 class="user-name-address mb-0">{{$cusaddrs->address}}, {{$cusaddrs->district}}</h5>
						<h5 class="user-name-address mb-0">{{$cusaddrs->state}}, {{$cusaddrs->pincode}}</h5>
						<h5 class="user-name-address mb-0">{{$cusaddrs->landmark}}</h5>
					</div>
					<div class="addrs-tick">
						<input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="defaultadd('{{$cusaddrs->id}}')" @if ($cusaddrs->default==1) checked @endif>
					</div>
				</div>
                @endforeach

			</div>
			<div class="col-lg-12 mb-5">
				<div class="add-adrrss-btn">
					<a href="{{ route('address') }}" class="add-adress-btn"> + Add Address</a>
				</div>
			</div>
			<div class="container-main">
				<div class="checkout-products-dv">
					<div class="col-lg-12">
						<div class="products-checkouts">
							<div class="product-name-price-dv">
								<h5 class="mb-0 product-name-txt">Product Name</h5>
								<h5 class="mb-0 price-txt">Price</h5>
							</div>
							<hr>
						</div>
					</div>
                    @php
                    $sum = 0;
                @endphp
                    @foreach ($cart as $cartitems)
                    @php
                    $product = DB::table('products')
                        ->where('id', $cartitems->GetUnit->prod_id)
                        ->first();
                    $sum = $sum + $cartitems->GetUnit->offer_price * $cartitems->quantity;
                    // $cnt = $cnt + $cartitems->quantity;
                @endphp
                    <div class="col-lg-12">
						<div class="product-chekout">
							<div class="main-dv-chekout">
								<div class="product-dv">
									<img class="checkout-product-image" src="{{$product->image1}}" alt="">
								</div>
								<div class="product-name-dv">
									<h4 class="check-product-name">{{$product->name_english}}</h4>
                                    <h6 class="mb-0 cart-product-name">{{ $cartitems->GetUnit->name }} *
                                        {{ $cartitems->quantity }}</h6>
								</div>
							</div>
							<div class="price-dv-checkout">
								<h5 class="check-out-orgnl-price mb-0">₹{{$cartitems->GetUnit->offer_price * $cartitems->quantity}}</h5>
                                <h5 class="check-out-dscnt-price mb-0">₹{{$cartitems->GetUnit->price * $cartitems->quantity}}</h5>
							</div>
						</div>
						<hr>
					</div>
                    @endforeach

                    <div class="col-lg-12 mt-3">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
							<label class="form-check-label" for="flexRadioDefault1">
								COD
							</label>
						</div>
					</div>
					{{-- <div class="col-lg-12 mt-1">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
							<label class="form-check-label" for="flexRadioDefault1">
								Online Payment
							</label>
						</div>
					</div> --}}
					<div class="col-lg-12">
						<div class="total-main-dv">
							<h4 class="mb-0 grand-total">Grand Total</h4>
							<h4 class="mb-0 grand-total">₹{{$sum}}</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 mt-4">
				<div class="place-order-dv">
					<a class="btn primary-bg place-rdr-btn text-white" onclick="placeorder()">Place Order</a>
				</div>
			</div>
		</div>
	</div>
    <script>
         function defaultadd(aid) {

var defaultadd = $('#defadd').val();

// if ($('#defadd').prop('checked')) {
//     var defaultadd = 1;
// } else {
//     var defaultadd = 0;
// }



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

function placeorder(){

    data = new FormData();

            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/place-order",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {

                        Swal.fire({
                            title: 'Order Placed Successfully',
                            // text: "You won't be able to revert this!",
                            icon: 'success',
                            // showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/profile';
                            }
                        })
                    }
                }
            })
}


    </script>

@endsection

