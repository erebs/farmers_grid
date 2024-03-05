@extends('layouts.Admin')
@section('title')
    edit-units
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Units</h1>
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
                                        <input type="text" id="edunitname" class="form-control" value="{{$uni->name}}">
                                        <input type="hidden" id="unid" value="{{$uni->id}}">
                                        <div class="unitnamerr" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Price *</label>
                                        <input type="text" id="edunitprice" class="form-control" value="{{$uni->price}}">
                                        <div class="unitpricerr" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Offer Price*</label>
                                        <input type="text" id="edunitop" class="form-control" value="{{$uni->offer_price}}">
                                        <div class="unitoperr" style="color: red; font-size: 14px; "></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Default *</label>
                                        <input type="checkbox" value="1" id="eddefault" @if ($uni->default==1) checked @endif>
                                        <div class="deferror" style="color: red; font-size: 14px; "></div>
                                    </div>
                                    <div> <label>Status*</label>
                                        <select id="unistatus"
                                            style="width: 100%;padding:10px;border: 1px solid #ced4da;border-radius: 0.25rem;"
                                            class="form-select mb-3" aria-label="Default select example">
                                            <option value="active"{{ $uni->status === 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive"{{ $uni->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="selecterror" style="color: red; font-size: 14px; "></div>
                                </div>

                            </div>
                            <center>

                                <button type="button" class="btn yellowbtn" onclick="EditUnit()"
                                    id="submitButton">Submit</button>
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
        function EditUnit() {


            var id = $('input#unid').val();
            var name = $('input#edunitname').val();
            var price = $('input#edunitprice').val();
            var offer_price = $('input#edunitop').val();
            // var default = $('#eddefault').val();
            var status = $('select#unistatus').val();

            if (name == '') {
                $('#edunitname').focus();
                $('#edunitname').css({
                    'border': '1px solid red'
                });
                $('.unitnamerr').show();
                $('.unitnamerr').text("enter the field*");
                return false;
            } else

                $('#edunitname').css({
                    'border': '1px solid #CCC'
                });
            $('.unitnamerr').hide();

            if (price == '') {
                $('#edunitprice').focus();
                $('#edunitprice').css({
                    'border': '1px solid red'
                });
                $('.unitpricerr').show();
                $('.unitpricerr').text("enter the field*");
                return false;
            } else

                $('#edunitprice').css({
                    'border': '1px solid #CCC'
                });
            $('.unitpricerr').hide();


            if (offer_price == '') {
                $('#edunitop').focus();
                $('#edunitop').css({
                    'border': '1px solid red'
                });
                $('.unitoperr').show();
                $('.unitoperr').text("enter the field*");
                return false;
            } else

                $('#edunitop').css({
                    'border': '1px solid #CCC'
                });
            $('.unitoperr').hide();



            if ($('#eddefault').prop('checked')) {
                var def_item = 1;
            } else {
                var def_item = 0;
            }


            data = new FormData();
            data.append('unid', id);
            data.append('edunitname', name);
            data.append('edunitprice', price);
            data.append('edunitop', offer_price);
            data.append('def_item', def_item);
            data.append('unistatus', status);

            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/update-units",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {

                        Swal.fire({
                            title: 'Edited  Successfully',
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
