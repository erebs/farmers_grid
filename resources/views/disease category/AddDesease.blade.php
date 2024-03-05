@extends('layouts.Admin')
@section('title')
    add-disease-category
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Disease Category </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="/disease-category"><i class="fa fa-arrow-left"
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
                                <div class="col-md-6">


                                    <div class="form-group">
                                        <label>Title (English) *</label>
                                        <input type="text" id="engtitle" class="form-control" value="">
                                        <div class="titleerror1" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Title (Malayalam) *</label>
                                        <input type="text" id="maltitle" class="form-control" value="">
                                        <div class="titleerror2" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Title (English & Malayalam) *</label>
                                        <input type="text" id="eng_maltitle" class="form-control" value="">
                                        <div class="titleerror3" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Description (English) *</label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="deseng"></textarea>
                                        <div class="deserror1" style="color: red; font-size: 14px; "></div>

                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description (Malayalam) * </label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="desmal"></textarea>
                                        <div class="deserror2" style="color: red; font-size: 14px; "></div>

                                    </div>

                                    <div class="form-group">
                                        <label>Image *<br><span style="font-size:10px;">( 600px * 300px )</span></label><br>
                                        <input type="file" id="pdf_file"
                                            style=" background: #ececec;color: black;padding: 1em;">
                                        <div class="imageerror" style="color: red; font-size: 14px; "></div>
                                        {{-- <div class="imgerror" style="color: red; font-size: 14px; "></div> --}}
                                    </div>

                                    <div class="form-group">
                                        <label>Featured *</label>
                                        <input type="checkbox" value="1" id="featured">
                                        <div class="featurederror" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Display Order *</label>
                                        <input type="number" class="form-control" id="order">
                                        <div class="ordererror" style="color: red; font-size: 14px; "></div>

                                    </div>

                                </div>

                            </div>
                            <center>


                                <button type="button" class="btn yellowbtn" onclick="AddCat()"
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

        function AddCat() {
            var title_eng = $('input#engtitle').val();
            var title_mal = $('input#maltitle').val();
            var title_engmal = $('input#eng_maltitle').val();
            var des_eng = CKEDITOR.instances.deseng.getData();
            var des_mal = CKEDITOR.instances.desmal.getData();
            var image = $('input#pdf_file').val();
            var featured = $('#featured').val();
            var order = $('input#order').val();

            if (title_eng == '') {
                $('#engtitle').focus();
                $('#engtitle').css({
                    'border': '1px solid red'
                });
                $('.titleerror1').show();
                $('.titleerror1').text("enter title*");
                return false;
            } else

                $('#engtitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerror1').hide();

            if (title_mal == '') {
                $('#maltitle').focus();
                $('#maltitle').css({
                    'border': '1px solid red'
                });
                $('.titleerror2').show();
                $('.titleerror2').text("enter title*");
                return false;
            } else

                $('#maltitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerror2').hide();


            if (title_engmal == '') {
                $('#eng_maltitle').focus();
                $('#eng_maltitle').css({
                    'border': '1px solid red'
                });
                $('.titleerror3').show();
                $('.titleerror3').text("enter title*");
                return false;
            } else

                $('#eng_maltitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerror3').hide();


            if (des_eng == '') {
                $('#deseng').focus();
                $('#deseng').css({
                    'border': '1px solid red'
                });
                $('.deserror1').show();
                $('.deserror1').text("enter description*");
                return false;
            } else

                $('#deseng').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror1').hide();

            if (des_mal == '') {
                $('#desmal').focus();
                $('#desmal').css({
                    'border': '1px solid red'
                });
                $('.deserror2').show();
                $('.deserror2').text("enter description*");
                return false;
            } else

                $('#desmal').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror2').hide();


            if (image == '') {
                $('#pdf_file').focus();
                $('#pdf_file').css({
                    'border': '1px solid red'
                });
                $('.imageerror').show();
                $('.imageerror').text("choose an image*");
                return false;
            } else

                $('#pdf_file').css({
                    'border': '1px solid #CCC'
                });

            $('.imageerror').hide();

            if ($('#featured').prop('checked')) {
                var isfeatured = 1;
            } else {
                var isfeatured = 0;
            }


            if (order == '') {
                $('#order').focus();
                $('#order').css({
                    'border': '1px solid red'
                });
                $('.ordererror').show();
                $('.ordererror').text("type display order*");
                return false;
            } else

                $('#order').css({
                    'border': '1px solid #CCC'
                });

            $('.ordererror').hide();

            data = new FormData();

            data.append('titleeng', title_eng);
            data.append('titlemal', title_mal);
            data.append('title_engmal', title_engmal);
            data.append('des_eng', des_eng);
            data.append('des_mal', des_mal);
            data.append('image', $('#pdf_file')[0].files[0]);
            data.append('featured', isfeatured);
            data.append('order', order);


            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/save-disease-category",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {

                        Swal.fire({
                            title: 'Submited Successfully',
                            // text: "You won't be able to revert this!",
                            icon: 'success',
                            // showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/disease-category';
                            }
                        })
                    }
                }
            })

        }
    </script>
@endsection
