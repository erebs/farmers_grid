@extends('homeweb.layouts.master')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
@section('content')


	<div class="container-main">
		<div class="row">
			<div class="col-lg-12">
				<div class="signin-main-dv">
					<h3 class="text-center mb-0 signin-text">Edit Your Address</h3>
					<form>
						<div class="form-group">
							<input type="text" class="form-control" id="edname" aria-describedby="emailHelp" placeholder="Full Name" value="{{$address->name}}">
                            <div class="nameerror" style="color: red; font-size: 14px; "></div>
						</div>
                        <input type="hidden" id="ad_id" value="{{$address->id}}">
						<div class="form-group">
							<input type="text" class="form-control" id="edmobile" aria-describedby="emailHelp" placeholder="Phone Number" value="{{$address->mobile}}">
                            <div class="mobileerror" style="color: red; font-size: 14px; "></div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="edaddress" aria-describedby="emailHelp" placeholder="Address" value="{{$address->address}}">
                            <div class="addrserror" style="color: red; font-size: 14px; "></div>
						</div>
                        <div class="form-group">
							<input type="text" class="form-control" id="eddistrict" aria-describedby="emailHelp" placeholder="District" value="{{$address->district}}">
                            <div class="districterror" style="color: red; font-size: 14px; "></div>
						</div>
                        <div class="form-group">
							<input type="text" class="form-control" id="edstate" aria-describedby="emailHelp" placeholder="State" value="{{$address->state}}">
                            <div class="stateerror" style="color: red; font-size: 14px; "></div>
						</div>
                        <div class="form-group">
							<input type="text" class="form-control" id="edpincode" aria-describedby="emailHelp" placeholder="Pincode" value="{{$address->pincode}}">
                            <div class="pinerror" style="color: red; font-size: 14px; "></div>
						</div>
                        <div class="form-group">
							<input type="text" class="form-control" id="edlandmark" aria-describedby="emailHelp" placeholder="Landmark" value="{{$address->landmark}}">
                            <div class="landmerror" style="color: red; font-size: 14px; "></div>
						</div>

						<a href="#" onclick="editadrs()" class="signin-btn-main primary-bg btn text-white text-center">Submit</a>
					</form>
				</div>
			</div>
		</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script>

        function editadrs() {
            var name = $('input#edname').val();
            var mobile = $('input#edmobile').val();
            var address = $('input#edaddress').val();
            var district = $('input#eddistrict').val();
            var state = $('input#edstate').val();
            var pincode = $('input#edpincode').val();
            var landmark = $('input#edlandmark').val();
            var adrs_id=$('input#ad_id').val();


            if (name == '') {
                $('#edname').focus();
                $('#edname').css({
                    'border': '1px solid red'
                });
                $('.nameerror').show();
                $('.nameerror').text("enter name*");
                return false;
            } else

                $('#edname').css({
                    'border': '1px solid #CCC'
                });
            $('.nameerror').hide();

            if (mobile == '') {
                $('#edmobile').focus();
                $('#edmobile').css({
                    'border': '1px solid red'
                });
                $('.mobileerror').show();
                $('.mobileerror').text("enter phone number*");
                return false;
            } else

                $('#edmobile').css({
                    'border': '1px solid #CCC'
                });
            $('.mobileerror').hide();


            if (address == '') {
                $('#edaddress').focus();
                $('#edaddress').css({
                    'border': '1px solid red'
                });
                $('.addrserror').show();
                $('.addrserror').text("enter address*");
                return false;
            } else

                $('#edaddress').css({
                    'border': '1px solid #CCC'
                });
            $('.addrserror').hide();


            if (district == '') {
                $('#eddistrict').focus();
                $('#eddistrict').css({
                    'border': '1px solid red'
                });
                $('.districterror').show();
                $('.districterror').text("enter district*");
                return false;
            } else

                $('#eddistrict').css({
                    'border': '1px solid #CCC'
                });

            $('.districterror').hide();

            if (state == '') {
                $('#edstate').focus();
                $('#edstate').css({
                    'border': '1px solid red'
                });
                $('.stateerror').show();
                $('.stateerror').text("enter state*");
                return false;
            } else

                $('#edstate').css({
                    'border': '1px solid #CCC'
                });

            $('.stateerror').hide();

            if (pincode == '') {
                $('#edpincode').focus();
                $('#edpincode').css({
                    'border': '1px solid red'
                });
                $('.pinerror').show();
                $('.pinerror').text("enter pincode*");
                return false;
            } else

                $('#edpincode').css({
                    'border': '1px solid #CCC'
                });

            $('.pinerror').hide();

            if (landmark == '') {
                $('#edlandmark').focus();
                $('#edlandmark').css({
                    'border': '1px solid red'
                });
                $('.landmerror').show();
                $('.landmerror').text("enter landmark*");
                return false;
            } else

                $('#edlandmark').css({
                    'border': '1px solid #CCC'
                });

            $('.landmerror').hide();



            data = new FormData();

            data.append('edname', name);
            data.append('edmobile', mobile);
            data.append('edaddress', address);
            data.append('eddistrict', district);
            data.append('edstate', state);
            data.append('edpincode', pincode);
            data.append('edlandmark', landmark);
            data.append('ad_id', adrs_id);


            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/update-address",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {

                        Swal.fire({
                            title: 'Edited Successfully',
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
