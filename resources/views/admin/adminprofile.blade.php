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


                <div class="card">
                    <div class="card-body login-card-body">

                        <p class="login-box-msg" style="font-size: 20px;font-weight: bold;">PROFILE</p>

                        <img style="width: 100px;border-radius:50%;margin:auto;display:table;margin-bottom:20px;"
                            src="{{ asset('admin/img/user.avif') }}" alt="">
                        <form>

                            <h6 style="color: #d11409">Name *</h6>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Name" name="password"
                                    value="{{ $adm->name }}" id="cname">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        {{-- <span class="fa fa-eye" style="cursor: pointer;" onclick="Visibility()"
                                            id="eye"></span> --}}
                                    </div>
                                </div>
                            </div>
                            <h6 style="color: #d11409">User Name *</h6>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="User Name" name="password"
                                    value="{{ $adm->username }}" id="username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        {{-- <span class="fa fa-eye" style="cursor: pointer;" onclick="Visibility()"
                                            id="eye"></span> --}}
                                    </div>
                                </div>
                            </div>
                            <h6 style="color: #d11409">Mobile *</h6>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Mobile" name="password"
                                    value="{{ $adm->mobile }}" id="cmobile">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        {{-- <span class="fa fa-eye" style="cursor: pointer;" onclick="Visibility()"
                                            id="eye"></span> --}}
                                    </div>
                                </div>
                            </div>
                            <h6 style="color: #d11409">Email *</h6>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Email" name="password"
                                    value="{{ $adm->mail_id }}" id="cmail">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        {{-- <span class="fa fa-eye" style="cursor: pointer;" onclick="Visibility()"
                                            id="eye"></span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="file" id="pdf_file">
                                <div class="imageerror" style="color: red; font-size: 14px; "></div>

                            </div>

                            <center>
                                <div class="error" style="font-weight: bold;"></div>
                                <div class="success" style="font-weight: bold;"></div>
                            </center>

                            <div class="row">

                                <div class="col-12 mb-3">
                                    <button type="button" class="btn yellowbtn w-100" onclick="adprofup()"
                                        id="a1">Update Profile</button>
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
            function adprofup() {
                var name = $('input#cname').val();
                var username = $('input#username').val();
                var mobile = $('input#cmobile').val();
                var mail_id = $('input#cmail').val();
                var image = $('input#pdf_file').val();



                data = new FormData();
                data.append('cname', name);
                data.append('username', username);
                data.append('cmobile', mobile);
                data.append('cmail', mail_id);
                data.append('image', $('#pdf_file')[0].files[0]);



                data.append('_token', '{{ csrf_token() }}');
                $.ajax({

                    type: "POST",
                    url: "/ad-profile-update",
                    data: data,
                    dataType: "json",
                    contentType: false,
                    //cache: false,
                    processData: false,

                    success: function(data) {
                        if (data['success']) {

                            Swal.fire({
                                title: 'Profile Updated Successfully',
                                // text: "You won't be able to revert this!",
                                icon: 'success',
                                // showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = window.location.href;
                                }
                            })
                        }
                    }
                })
            }
        </script>
    @endsection
