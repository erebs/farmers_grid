@extends('malayalam.layouts.master')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css"> --}}
@section('content')
    <div class="product-single-page">
        <div class="container-main">
            <div class="row">
                <div class="col-lg-5">
                    <div class="main-dv-p">
                        <div class="product-main-image-dv">
                            <img class="prodcut-single-image" id="main-image" src="{{ asset($prod->image1) }}" alt="Product Image">
                        </div>
                        <div class="small-image">
                            <img src="{{ asset($prod->image1) }}" class="product-thumbnail" alt="Thumbnail 1"
                                onclick="changeImage('{{ asset($prod->image1) }}')">
                            <img src="{{ asset($prod->image2) }}" class="product-thumbnail" alt="Thumbnail 1"
                                onclick="changeImage('{{ asset($prod->image2) }}')">
                            <img src="{{ asset($prod->image3) }}" class="product-thumbnail" alt="Thumbnail 1"
                                onclick="changeImage('{{ asset($prod->image3) }}')">
                            <img src="{{ asset($prod->image4) }}" class="product-thumbnail" alt="Thumbnail 1"
                                onclick="changeImage('{{ asset($prod->image4) }}')">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="product-details-dv-main">
                        <h4 class="mb-0 product-main-name">{{ $prod->name_malayalam }}</h4>
                        <p class="mb-0 product-main-subtxt">{!! $prod->description_mal !!}</p>
                        <div class="single-page-price" id="unpricediv">
                            <h4 class="mb-0 single-orgnl-price">₹{{ $defaultunit->offer_price }}</h4>
                            <h4 class="mb-0 single-dcnt-price">₹{{ $defaultunit->price }}</h4>
                        </div>
                        <div class="qnt-unt">
                            <div class="qntity">
                                <h5 class="mb-0 symbol-q" onclick="subtractQuantity()">-</h5>
                                <input type="number" class="text-center" name="quantity" id="quantity" value="1"
                                    min="1">
                                <h5 class="mb-0 symbol-q" onclick="addQuantity()">+</h5>
                            </div>

                            <form class="option-select-product" action="">
                                <select name="products" id="products" onchange="getprice(this.value)">
                                    <option value=" ">Units</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            @if ($unit->default == 1) selected @endif> {{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <div class="btns-p-single">
                            <a onclick="AddToCart()" class="btn text-white cart-btn primary-bg">Add to Cart</a>
                        </div>
                        <div class="dropdown-dv">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne"  data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                        <i class="ri-add-fill"></i>
                                        <h5 class="mb-0 qstn-dropdown">How to Use?</h5>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p class="anser-drpdown">{!! $prod->how_to_use_mal !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- products  -->
        <div class="container-main mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="related-products">
                        <h4 class="rel-txt mb-0">Related Products</h4>
                    </div>
                </div>
                @foreach ($relatedprod as $reltdprd)
                    @php
                        $unitpr = DB::table('units')
                            ->where('prod_id', $reltdprd->id)
                            ->where('default', '1')
                            ->first();
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="product-box">
                            <a href="{{ route('prod.single', $reltdprd->id) }}">
                                <div class="prdct-img-box">
                                    <img class="product-image" src="{{ asset($reltdprd->image1) }}" alt="">
                                </div>
                            </a>
                            <div class="price-detail-dv">
                                <div class="price-dv">
                                    <h5 class="mb-0 product-name">{{ $reltdprd->name_malayalam }}</h5>
                                    <h5 class="mb-0 product-price">₹ {{ $unitpr->offer_price }}</h5>
                                </div>
                                <div class="btn-cart">
                                    <a href="{{ route('prod.single', $reltdprd->id) }}"
                                        class="add-to-cart primary-bg btn text-white">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
<script>
function changeImage(newImage) {
            document.getElementById('main-image').src = newImage;
        }
</script>

    <script>
        function getprice(val) {

            $.post("/get-price", {
                unit_id: val,
                _token: "{{ csrf_token() }}"
            }, function(result) {

                $('#unpricediv').html(result);
            });

        }

        function subtractQuantity() {
            var cur_qty = $('input#quantity').val();
            if (cur_qty > 1) {
                qty = parseInt(cur_qty) - 1;
                $('#quantity').val(qty);
            }
        }

        function addQuantity() {
            var cur_qty = $('input#quantity').val();
            qty = parseInt(cur_qty) + 1;
            $('#quantity').val(qty);

        }



        function AddToCart() {
            var unit_id = $('#products option:selected').val();
            var quantity = $('input#quantity').val();


            data = new FormData();

            data.append('unit_id', unit_id);
            data.append('quantity', quantity);


            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/add-to-cart",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {

                        Swal.fire({
                            title: 'Added to cart Successfully',
                            // text: "You won't be able to revert this!",
                            icon: 'success',
                            // showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/cart-items';
                            }
                        })
                    }else if(data['loginerror']){
                        window.location.href = '/sign-in';
                    }
                }
            })
        }
    </script>
@endsection
