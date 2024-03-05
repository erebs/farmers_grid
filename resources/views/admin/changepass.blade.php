@extends('layouts.Admin')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@section('title')
    dashboard
@endsection

@section('contents')
    <div class="container-fluid">

        <div class="col-left">
            <div class="login-box">

                <!-- <div class="login-logo">
                    <a><b><img src="{{ asset('homeweb/images/Logo-main.png') }}" alt="logo" style="width: 70%;"></b></a>
                    </div> -->
                <!-- /.login-logo -->
                <div class="card">
                    <div class="card-body login-card-body">
                        <center>
                            <img src="{{ asset('homeweb/images/Logo-main.png') }}" alt="logo" style="width: 60%;">
                        </center>
                        <p class="login-box-msg" style="font-size: 20px;font-weight: bold;">Change Password</p>


                        <form>

                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="current password" name="password"
                                    id="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fa fa-eye" style="cursor: pointer;" onclick="Visibility()"
                                            id="eye"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="old password" name="password"
                                    id="oldpass">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fa fa-eye" style="cursor: pointer;" onclick="Visibility()"
                                            id="eye"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="new password" name="password"
                                    id="newpass">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fa fa-eye" style="cursor: pointer;" onclick="Visibility()"
                                            id="eye"></span>
                                    </div>
                                </div>
                            </div>

                            <center>
                                <div class="error" style="font-weight: bold;"></div>
                                <div class="success" style="font-weight: bold;"></div>
                            </center>

                            <div class="row">

                                <div class="col-md-12 ">
                                    <div class="mb-3 text-right">
                                        <!-- <a href="/forgot-password">I forgot my password</a> -->
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <button type="button" class="btn yellowbtn w-100" onclick="changepass()"
                                        id="a1">Change Password</button>
                                    {{-- <button type="button" class="btn yellowbtn w-100" id="a2" disabled=""> <i
                                        class="fa fa-spinner fa-spin"></i> Sign In</button> --}}
                                </div>
                                <!-- /.col -->
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script>
            function changepass() {
                var currentpass = $('input#password').val();
                var oldpass = $('input#oldpass').val();
                var newpass = $('input#newpass').val();



                if (currentpass == '') {
                    $('#password').focus();
                    $('#password').css({
                        'border': '1px solid red'
                    });
                    return false;
                } else {

                    $('#password').css({
                        'border': '1px solid #CCC'
                    });
                }

                if (oldpass == '') {
                    $('#oldpass').focus();
                    $('#oldpass').css({
                        'border': '1px solid red'
                    });
                    return false;
                } else {

                    $('#oldpass').css({
                        'border': '1px solid #CCC'
                    });
                }
                if (newpass == '') {
                    $('#newpass').focus();
                    $('#newpass').css({
                        'border': '1px solid red'
                    });
                    return false;
                } else {

                    $('#newpass').css({
                        'border': '1px solid #CCC'
                    });
                }


                data = new FormData();
                data.append('password', currentpass);
                data.append('oldpass', oldpass);
                data.append('newpass', newpass);


                data.append('_token', '{{ csrf_token() }}');
                $.ajax({

                    type: "POST",
                    url: "/password-update",
                    data: data,
                    dataType: "json",
                    contentType: false,
                    //cache: false,
                    processData: false,

                    success: function(data) {
                        if (data['success']) {

                            Swal.fire({
                                title: 'Password Changed Successfully',
                                // text: "You won't be able to revert this!",
                                icon: 'success',
                                // showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/adminhome';
                                }
                            })
                        }else{
                            Toastify({
                        text: "passwords doesn't match",
                        duration: 1000,
                        newWindow: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, red, red)",
                        },
                        callback: function() {

                        },
                    }).showToast();
                        }
                    }
                })
            }
        </script>
    @endsection
