@extends('layouts.Admin')
@section('title')
    add-units
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Units</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="/units/{id}"><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i> Back</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form>
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-default">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input type="text" id="unitname" class="form-control" value="">
                                        <div class="unitnamerr" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Price *</label>
                                        <input type="text" id="unitprice" class="form-control" value="">
                                        <div class="unitpricerr" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Offer Price*</label>
                                        <input type="text" id="unitop" class="form-control" value="">
                                        <div class="unitoperr" style="color: red; font-size: 14px; "></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Default</label>
                                        <input type="checkbox" value="1" id="default1">
                                        <div class="deferror" style="color: red; font-size: 14px; "></div>
                                    </div>
                                </div>

                            </div>
                            <center>

                                <button type="button" class="btn yellowbtn" onclick="AddUnit()" id="submitButton"> Submit
                                </button>
                                <button type="button" class="btn yellowbtn" id="submitButton1"> <i
                                        class="fa fa-spinner fa-spin"></i> Submit</button>

                            </center>
                        </div>
                    </div>
            </section>
        </form>


        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>





    <script>
        function AddUnit() {

          var name = $('input#unitname').val();
            var price = $('input#unitprice').val();
            var offer_price = $('input#unitop').val();
            // var default = $('input#default1').val();

            if (name == '') {
                $('#unitname').focus();
                $('#unitname').css({
                    'border': '1px solid red'
                });
                $('.unitnamerr').show();
                $('.unitnamerr').text("enter the field*");
                return false;
            } else

                $('#unitname').css({
                    'border': '1px solid #CCC'
                });
            $('.unitnamerr').hide();

            if (price == '') {
                $('#unitprice').focus();
                $('#unitprice').css({
                    'border': '1px solid red'
                });
                $('.unitpricerr').show();
                $('.unitpricerr').text("enter the field*");
                return false;
            } else

                $('#unitprice').css({
                    'border': '1px solid #CCC'
                });
            $('.unitpricerr').hide();


            if (offer_price == '') {
                $('#unitop').focus();
                $('#unitop').css({
                    'border': '1px solid red'
                });
                $('.unitoperr').show();
                $('.unitoperr').text("enter the field*");
                return false;
            } else

                $('#unitop').css({
                    'border': '1px solid #CCC'
                });
            $('.unitoperr').hide();


            if ($('#default1').prop('checked')) {
                var def_item = 1;
            } else {
                var def_item = 0;
            }


            data = new FormData();
            data.append('id', '{{ $id }}');
            data.append('unitname', name);
            data.append('unitprice', price);
            data.append('unitop', offer_price);
            data.append('def_item',def_item);

            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/save-units",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {

                        Swal.fire({
                            title: 'Submitted  Successfully',
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
