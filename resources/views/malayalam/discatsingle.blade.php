@extends('malayalam.layouts.master')
@section('content')

	<!-- desease detail section  -->
	<div class="desease-single-main-div">
		<div class="container-main">
            <div class="row">
				<div class="col-lg-5">
					<div class="img-box-desease">
						<img src="{{asset($discat->image)}}" alt="">
					</div>
				</div>
				<div class="col-lg-7">
					<div class="disease-detail">
						<h3 class="mb-0 desease-name">{{$discat->title_mal}}</h3>
						<p class="mb-0 sub-txt-desease">{!!$discat->description_mal!!}</p>
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
					<h5 class="mb-0 trending-text">DISEASE</h5>
				</div>
			</div>
            @foreach ($diseases as $disease)
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="disese-box">
                    <a href="{{ route ('dis.single',$disease->id)}}">
                        <img class="disese-img" src="{{asset($disease->image)}}" alt="">
                        <h5 class="mb-0 disease-name">{{$disease->title_malayalam}}</h5>
                    </a>
                </div>
            </div>

            @endforeach


		</div>
	</div>
    @endsection
