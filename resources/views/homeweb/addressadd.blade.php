@extends('homeweb.layouts.master')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
@section('content')


	<div class="container-main">
		<div class="row">
			<div class="col-lg-12">
				<div class="signin-main-dv">
					<h3 class="text-center mb-0 signin-text">Address</h3>
					<form>
						<div class="form-group">
							<input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Full Name">
                            <div class="nameerror" style="color: red; font-size: 14px; "></div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="mobile" aria-describedby="emailHelp" placeholder="Phone Number">
                            <div class="mobileerror" style="color: red; font-size: 14px; "></div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Address">
                            <div class="addrserror" style="color: red; font-size: 14px; "></div>
						</div>
                        <div class="form-group">
							<input type="text" class="form-control" id="district" aria-describedby="emailHelp" placeholder="District">
                            <div class="districterror" style="color: red; font-size: 14px; "></div>
						</div>
                        <div class="form-group">
							<input type="text" class="form-control" id="state" aria-describedby="emailHelp" placeholder="State">
                            <div class="stateerror" style="color: red; font-size: 14px; "></div>
						</div>
                        <div class="form-group">
							<input type="text" class="form-control" id="pincode" aria-describedby="emailHelp" placeholder="Pincode">
                            <div class="pinerror" style="color: red; font-size: 14px; "></div>
						</div>
                        <div class="form-group">
							<input type="text" class="form-control" id="landmark" aria-describedby="emailHelp" placeholder="Landmark">
                            <div class="landmerror" style="color: red; font-size: 14px; "></div>
						</div>

						<a href="#" onclick="addadrs()" class="signin-btn-main primary-bg btn text-white text-center">Submit</a>
					</form>
				</div>
			</div>
		</div>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script>

        function addadrs() {
            var name = $('input#name').val();
            var mobile = $('input#mobile').val();
            var address = $('input#address').val();
            var district = $('input#district').val();
            var state = $('input#state').val();
            var pincode = $('input#pincode').val();
            var landmark = $('input#landmark').val();


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
                $('.mobileerror').show();
                $('.mobileerror').text("enter phone number*");
                return false;
            } else

                $('#mobile').css({
                    'border': '1px solid #CCC'
                });
            $('.mobileerror').hide();


            if (address == '') {
                $('#address').focus();
                $('#address').css({
                    'border': '1px solid red'
                });
                $('.addrserror').show();
                $('.addrserror').text("enter address*");
                return false;
            } else

                $('#address').css({
                    'border': '1px solid #CCC'
                });
            $('.addrserror').hide();


            if (district == '') {
                $('#district').focus();
                $('#district').css({
                    'border': '1px solid red'
                });
                $('.districterror').show();
                $('.districterror').text("enter district*");
                return false;
            } else

                $('#district').css({
                    'border': '1px solid #CCC'
                });

            $('.districterror').hide();

            if (state == '') {
                $('#state').focus();
                $('#state').css({
                    'border': '1px solid red'
                });
                $('.stateerror').show();
                $('.stateerror').text("enter state*");
                return false;
            } else

                $('#state').css({
                    'border': '1px solid #CCC'
                });

            $('.stateerror').hide();

            if (pincode == '') {
                $('#pincode').focus();
                $('#pincode').css({
                    'border': '1px solid red'
                });
                $('.pinerror').show();
                $('.pinerror').text("enter pincode*");
                return false;
            } else

                $('#pincode').css({
                    'border': '1px solid #CCC'
                });

            $('.pinerror').hide();

            if (landmark == '') {
                $('#landmark').focus();
                $('#landmark').css({
                    'border': '1px solid red'
                });
                $('.landmerror').show();
                $('.landmerror').text("enter landmark*");
                return false;
            } else

                $('#landmark').css({
                    'border': '1px solid #CCC'
                });

            $('.landmerror').hide();



            data = new FormData();

            data.append('name', name);
            data.append('mobile', mobile);
            data.append('address', address);
            data.append('district', district);
            data.append('state', state);
            data.append('pincode', pincode);
            data.append('landmark', landmark);


            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/save-address",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {

                        Swal.fire({
                            title: 'Submitted Successfully',
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
