@extends('layouts.Admin')
@section('title')
    banner
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>banner</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div style="width: 100%">
                                    <label>Add banner *</label>
                                    <div class="main" style="display: flex">
                                            <form>
                                                <section class="content">
                                                    <div class="container-fluid">
                                                        <div class="card card-default">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Image *<br><span style="font-size:10px;">( 600px * 300px )</span></label><br>
                                                                            <input type="file" id="banner"
                                                                                style=" background: #ececec;color: black;padding: 1em;">
                                                                            <div class="imageerror" style="color: red; font-size: 14px; "></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <center>
                                                                    <button type="button" class="btn yellowbtn" onclick="AddBanner()"
                                                                        id="submitButton">Submit</button>
                                                                    <button type="button" class="btn yellowbtn" id="submitButton1"> <i
                                                                            class="fa fa-spinner fa-spin"></i> Submit</button>

                                                                </center>
                                                            </div>
                                                        </div>
                                                </section>
                                            </form>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($banners as $banner)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{asset( $banner->image)}}" alt="" height="60" width="60"></td>
                                                <td><a class="btn btn-info text-light" href="{{ route('delete.banner',encrypt($banner->id))}}">delete</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->





    <!-- Page specific script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>

        function AddBanner(){
            var image = $('input#banner').val();

            if (image == '') {
                $('#banner').focus();
                $('#banner').css({
                    'border': '1px solid red'
                });
                $('.imageerror').show();
                $('.imageerror').text("choose an image*");
                return false;
            } else

                $('#banner').css({
                    'border': '1px solid #CCC'
                });

            $('.imageerror').hide();


            data = new FormData();

            data.append('image', $('#banner')[0].files[0]);


            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/save-banner",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {
                        Swal.fire({
                            title: 'Image Added  Successfully',
                            // text: "You won't be able to revert this!",
                            icon: 'success',
                            // showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/banner';
                            }
                        })
                    }
                }
            })
        }
    </script>
@endsection
