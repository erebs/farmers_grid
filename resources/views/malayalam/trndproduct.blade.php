@extends('malayalam.layouts.master')
@section('content')

	<!-- products  -->
	<div class="container-main">
		<div class="row">
			<div class="col-lg-12">
				<div class="trending-products-dv">
					<h4 class="mb-0 trending-text">Trending Product categories</h4>
                    {{-- try to show products --}}
					{{-- <form class="option-select-product" action="">
						<select name="products" id="products">
							<option value="volvo">Sort By</option>
							<option value="saab">Diseases</option>
							<option value="opel">Products</option>
						</select>
					</form> --}}
				</div>
			</div>
            @foreach ($trendingprods as $trndprod)
            <div class="col-lg-3 col-md-4 col-sm-6 col-6" >
				<div class="product-box">
					<a href="{{ route('prodcateg.single',$trndprod->id) }}"><div class="prdct-img-box">
						<img class="product-image" src="{{asset($trndprod->image)}}" alt="">
					</div></a>
					<div class="price-detail-dv">
						<div class="price-dv">
							<h5 class="mb-0 product-name">{{$trndprod->title_mal}}</h5>

						</div>

					</div>
				</div>
			</div>
            @endforeach
		</div>
	</div>

@endsection


