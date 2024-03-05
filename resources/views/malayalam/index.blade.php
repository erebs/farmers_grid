@extends('malayalam.layouts.master')
@section('content')


	<!-- banner slider  -->
	<div id="customCarousel" class="carousel slide">
		<div class="carousel-inner">
            @foreach ($banners as $banner)
            <div class="carousel-item {{$banner['id']==1?'active':''}}" style="background-image: url({{$banner['image']}});">
				<div class="container-main">
					<div class="banner-content">

					</div>
				</div>
			</div>
            @endforeach

		</div>
		<!-- Navigation Controls -->
		<a class="carousel-control-prev" href="#customCarousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#customCarousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- slider end  -->
	<!-- shop disease  -->
    <div class="container-main mt-3">
        <div class="row" id="prodiv">
        </div>
    </div>
	<div class="container-main">
		<div class="space-dv">

			<div class="row">
				<div class="col-lg-12">
					<div class="shop-dv-heading">
						<h3 class="mb-0 shop-text text-center">Disease Category</h3>
					</div>
				</div>
                @foreach ($diseasecat as $diseasecategories)
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
					<div class="disese-box">
						<a href="{{route('discat',$diseasecategories->id)}}">
							<img class="disese-img" src="{{$diseasecategories->image}}" alt="">
							<h5 class="mb-0 disease-name">{{$diseasecategories->title_mal}}</h5>
						</a>
					</div>
				</div>
                @endforeach

				<div class="col-lg-12">
					<div class="veiw-dv">
						<a href="{{ route('dis')}}" class="view-all-btn primary-bg btn text-white">Shop By Disease <i class="ri-arrow-right-s-line"></i></a>
					</div>
				</div>
			</div> <hr>

            <div class="row">
				<div class="col-lg-12">
					<div class="shop-dv-heading">
						<h3 class="mb-0 shop-text text-center"> Featured Disease Category</h3>
					</div>
				</div>
                @foreach ($featdiseasecat as $featdiscat)
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
					<div class="disese-box">
						<a href="{{route('discat',$featdiscat->id)}}">
							<img class="disese-img" src="{{$featdiscat->image}}" alt="">
							<h5 class="mb-0 disease-name">{{$featdiscat->title_mal}}</h5>
						</a>
					</div>
				</div>
                @endforeach

				{{-- <div class="col-lg-12">
					<div class="veiw-dv">
						<a href="{{ route('disease')}}" class="view-all-btn primary-bg btn text-white">Shop By Disease <i class="ri-arrow-right-s-line"></i></a>
					</div>
				</div> --}}
			</div>
		</div>
	</div>

	<!-- products  -->
	<div class="container-main">
		<div class="row">
			<div class="col-lg-12">
				<div class="trending-products-dv">
					<h5 class="mb-0 trending-text">Trending Product categories</h5>
					<a href="{{ route('trending.product') }}" class="view-all-btn-products primary-bg btn text-white">View all <i class="ri-arrow-right-s-line"></i></a>
				</div>
			</div>
            @foreach ($trendproducts as $trendprod)
             <div class="col-lg-3 col-md-4 col-sm-6 col-6">
				<div class="product-box">
					<a href="{{ route('prodcateg.single',$trendprod->id) }}"><div class="prdct-img-box">
						<img class="product-image" src="{{asset($trendprod->image)}}" alt="">
					</div> </a>
					<div class="price-detail-dv">
						<div class="price-dv">
							<h5 class="mb-0 product-name">{{$trendprod->title_mal}}</h5>
							{{-- <h5 class="mb-0 product-price">₹ 20,000</h5> --}}
						</div>
						<div class="btn-cart">
							{{-- <a href="./cart.html" class="add-to-cart primary-bg btn text-white">Add to Cart </a> --}}
						</div>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</div>

	<!-- chat bg -->
	<div class="container-main">
		<div class="chat-main">
			<div class="chat-bg" style="background-image: url({{asset('homeweb/images/BlueBanner\ 1.png')}});background-repeat: no-repeat;background-size: 100% auto;background-position: center;background-repeat: no-repeat;background-size: cover;">
				<h1 class="mb-0 text-white medicine-text text-center">Don't Know how to find <br> a medicine</h1>
				<a href="#" class="view-all-btn primary-bg btn text-white">Chat with Us</a>
			</div>
		</div>
	</div>
	<!-- products  -->
	<div class="container-main">
		<div class="row">
			<div class="col-lg-12">
				<div class="trending-products-dv">
					<h5 class="mb-0 trending-text">Featured Product categories</h5>
					<a href="{{ route('featured.product') }}" class="view-all-btn-products primary-bg btn text-white">View all <i class="ri-arrow-right-s-line"></i></a>
				</div>
			</div>
			@foreach ($featuredproducts as $featuredprod)
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
				<div class="product-box">
					<a href="{{ route('prodcateg.single',$featuredprod->id) }}"><div class="prdct-img-box">
						<img class="product-image" src="{{asset($featuredprod->image)}}" alt="">
					</div></a>
					<div class="price-detail-dv">
						<div class="price-dv">
							<h5 class="mb-0 product-name">{{$featuredprod->title_mal}}</h5>
							{{-- <h5 class="mb-0 product-price">₹ 20,000</h5> --}}
						</div>
						<div class="btn-cart">
							{{-- <a href="#" class="add-to-cart primary-bg btn text-white">Add to Cart </a> --}}
						</div>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</div>
    @endsection


