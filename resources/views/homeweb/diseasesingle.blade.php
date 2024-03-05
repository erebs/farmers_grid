@extends('homeweb.layouts.master')
@section('content')
    <!-- desease detail section  -->
    <div class="desease-single-main-div">
        <div class="container-main">
            <div class="row">
                <div class="col-lg-5">
                    <div class="img-box-desease">
                        <img src="{{ asset($dis->image) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="disease-detail">
                        <h3 class="mb-0 desease-name">{{ $dis->title_english }}</h3>
                        <p class="mb-0 sub-txt-desease">{!! $dis->common_procedure_eng !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- desease detail section end -->
    <!-- products  -->
    <div class="container-main">
        <div class="row">
            <div class="col-lg-12">
                <div class="trending-products-dv">
                    <h5 class="mb-0 trending-text">PRODUCTS</h5>
                </div>
            </div>
            @foreach ($productdis as $product)
                @php
                    $unitpr = DB::table('units')
                        ->where('prod_id', $product->prod_id)
                        ->where('default', '1')
                        ->first();
                @endphp
                <div class="col-lg-3 col-md-4 mb-4 col-sm-6 col-6">
                    <div class="product-box">
                        <a href="{{ route('product.single', $product->prod_id) }}">
                            <div class="prdct-img-box">
                                <img class="product-image" src="{{ asset($product->GetName->image1) }}" alt="">
                            </div>
                        </a>
                        <div class="price-detail-dv">
                            <div class="price-dv">
                                <h5 class="mb-0 product-name">{{ $product->GetName->name_english }}</h5>
                                <h5 class="mb-0 product-price">₹ {{$unitpr->offer_price}}</h5>
                            </div>
                            <div class="btn-cart">
                                <a href="{{ route('product.single', $product->prod_id) }}"
                                    class="add-to-cart primary-bg btn text-white">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="gallery-dv-main">
        <div class="container-main">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="galler-main">
                        <h1 class="mb-0 text-center primary-color">Gallery</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mb-4">
                    <div class="galler-box txt-box">
                        <h1 class="photos-txt text-black mb-0">Photos</h1>
                    </div>
                </div>
                @foreach ($disgallary as $disgal)
                    <div class="col-lg-3 col-md-4 mb-4">
                        <a onclick="readmore('{{ $disgal->title_eng }}','{{ $disgal->description_eng }}')">
                        <div class="galler-box" data-toggle="modal" data-target="#loginModal">
                            <img src="{{ asset($disgal->file) }}" alt="">
                            <h5 class="btn text-white primary-bg mt-1"
                                >Read
                                more</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="gallery-dv-main">
        <div class="container-main">
            <div class="row">

                <div class="col-lg-3 col-md-4 mb-4">
                    <div class="galler-box txt-box">
                        <h1 class="photos-txt text-black mb-0">Videos</h1>
                    </div>
                </div>
                @foreach ($disvideo as $disvid)
                    <div class="col-lg-3 col-md-4 mb-4">
                        <div class="galler-box">
                            <iframe width="100%" height="315" src="{{ asset($disvid->url_eng) }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            <a onclick="readmorevid('{{ $disvid->title_eng }}','{{ $disvid->description_eng }}')" class="btn text-white primary-bg" data-toggle="modal"
                                data-target="#loginModalvideo">Read more</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>





    <div style="z-index: 1200;" class="modal fade modal-home modal-menu" id="loginModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="padding: 0px;" role="document">
            <div style="width: 100%;border-radius: 10px;margin: auto;padding: 10px;"
                class="modal-content login-modal-home-p">
                <i class="ri-close-circle-line close" data-dismiss="modal" aria-label="Close"></i>
                <div class="modal-body modal-loginform pt-0">
                    <h2 class="text-center" id="title1"></h2>
                    <p class="mb-0  descriptn-gal" id="desc1"></p>
                </div>
            </div>
        </div>
    </div>


        <div style="z-index: 1200;" class="modal fade modal-home modal-menu" id="loginModalvideo" tabindex="-1"
            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="padding: 0px;" role="document">
                <div style="width: 100%;border-radius: 10px;margin: auto;padding: 10px;"
                    class="modal-content login-modal-home-p">
                    <i class="ri-close-circle-line close" data-dismiss="modal" aria-label="Close"></i>
                    <div class="modal-body modal-loginform pt-0">
                        <h2 class="text-center" id="vidtitle"></h2>
                        <p class="mb-0  descriptn-gal" id="viddisc"></p>
                    </div>
                </div>
            </div>
        </div>



    <script>
        function readmore(title, dis) {


            $('#loginModal').addClass('show');
            $('#loginModal').removeClass('fade');

            $('#title1').text(title);
            $('#desc1').html(dis);
        }


        function readmorevid(titlevid,disvid)
        {

            $('#loginModal').addClass('show');
            $('#loginModal').removeClass('fade');

            $('#vidtitle').text(titlevid);
            $('#viddisc').html(disvid);
        }
    </script>
@endsection
