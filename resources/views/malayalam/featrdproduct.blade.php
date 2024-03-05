@extends('malayalam.layouts.master')
@section('content')

	<!-- products  -->
	<div class="container-main">
		<div class="row">
			<div class="col-lg-12">
				<div class="trending-products-dv">
					<h4 class="mb-0 trending-text">Featured Product Categories</h4>
				</div>
			</div>
            @foreach ($featrdprods as $featprod)
            <div class="col-lg-3 col-md-4 col-sm-6 col-6" >
				<div class="product-box">
					<a href="{{ route('prodcateg.single',$featprod->id) }}"><div class="prdct-img-box">
						<img class="product-image" src="{{asset($featprod->image)}}" alt="">
					</div></a>
					<div class="price-detail-dv">
						<div class="price-dv">
							<h5 class="mb-0 product-name">{{$featprod->title_mal}}</h5>
						</div>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</div>

@endsection


