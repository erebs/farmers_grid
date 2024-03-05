@extends('layouts.Admin')
@section('title')
    add-product-category
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Product Category </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="/product-category"><i class="fa fa-arrow-left"
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
                                        <input type="text" id="pcengtitle" class="form-control" value="">
                                        <div class="titleerror1" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Title (Malayalam) *</label>
                                        <input type="text" id="pcmaltitle" class="form-control" value="">
                                        <div class="titleerror2" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Title (English & Malayalam) *</label>
                                        <input type="text" id="pcengmaltitle" class="form-control" value="">
                                        <div class="titleerror3" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Description (English) *</label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="pcpcdeseng"></textarea>
                                        <div class="deserror1" style="color: red; font-size: 14px; "></div>

                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description (Malayalam) * </label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="pcdesmal"></textarea>
                                        <div class="deserror2" style="color: red; font-size: 14px; "></div>

                                    </div>

                                    <div class="form-group">
                                        <label>Image *<br><span style="font-size:10px;">( 600px * 300px )</span></label><br>
                                        <input type="file" id="pcimg" onchange="Checkformat()"
                                            style=" background: #ececec;color: black;padding: 1em;">
                                        <div class="imageerror" style="color: red; font-size: 14px; "></div>
                                        {{-- <div class="imgerror" style="color: red; font-size: 14px; "></div> --}}
                                    </div>

                                    <div class="form-group">
                                        <label>Featured *</label>
                                        <input type="checkbox" value="1" id="pcfeatured">
                                        <div class="featurederror" style="color: red; font-size: 14px; "></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Trending *</label>
                                        <input type="checkbox" value="1" id="pctrending">
                                        <div class="trendingerror" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Display Order *</label>
                                        <input type="number" class="form-control" id="pcorder">
                                        <div class="ordererror" style="color: red; font-size: 14px; "></div>

                                    </div>

                                </div>

                            </div>
                            <center>


                                <button type="button" class="btn yellowbtn" onclick="AddProdCat()"
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
        function AddProdCat() {
            var title_eng = $('input#pcengtitle').val();
            var title_mal = $('input#pcmaltitle').val();
            var title_engmal = $('input#pcengmaltitle').val();
            var des_eng = CKEDITOR.instances.pcpcdeseng.getData();
            var des_mal = CKEDITOR.instances.pcdesmal.getData();
            var image = $('input#pcimg').val();
            var featured = $('#pcfeatured').val();
            var trending = $('#pctrending').val();
            var order = $('input#pcorder').val();

            if (title_eng == '') {
                $('#pcengtitle').focus();
                $('#pcengtitle').css({
                    'border': '1px solid red'
                });
                $('.titleerror1').show();
                $('.titleerror1').text("enter title*");
                return false;
            } else

                $('#pcengtitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerror1').hide();

            if (title_mal == '') {
                $('#pcmaltitle').focus();
                $('#pcmaltitle').css({
                    'border': '1px solid red'
                });
                $('.titleerror2').show();
                $('.titleerror2').text("enter title*");
                return false;
            } else

                $('#pcmaltitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerror2').hide();


            if (title_engmal == '') {
                $('#pcengmaltitle').focus();
                $('#pcengmaltitle').css({
                    'border': '1px solid red'
                });
                $('.titleerror3').show();
                $('.titleerror3').text("enter title*");
                return false;
            } else

                $('#pcengmaltitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerror3').hide();


            if (des_eng == '') {
                $('#pcdeseng').focus();
                $('#pcdeseng').css({
                    'border': '1px solid red'
                });
                $('.deserror1').show();
                $('.deserror1').text("enter description*");
                return false;
            } else

                $('#pcdeseng').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror1').hide();

            if (des_mal == '') {
                $('#pcdesmal').focus();
                $('#pcdesmal').css({
                    'border': '1px solid red'
                });
                $('.deserror2').show();
                $('.deserror2').text("enter description*");
                return false;
            } else

                $('#pcdesmal').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror2').hide();


            if (image == '') {
                $('#pcimg').focus();
                $('#pcimg').css({
                    'border': '1px solid red'
                });
                $('.imageerror').show();
                $('.imageerror').text("choose an image*");
                return false;
            } else

                $('#pcimg').css({
                    'border': '1px solid #CCC'
                });

            $('.imageerror').hide();



            if ($('#pcfeatured').prop('checked')) {
                var isfeatured = 1;
            } else {
                var isfeatured = 0;
            }

            if ($('#pctrending').prop('checked')) {
                var istrending = 1;
            } else {
                var istrending = 0;
            }



            if (order == '') {
                $('#pcorder').focus();
                $('#pcorder').css({
                    'border': '1px solid red'
                });
                $('.ordererror').show();
                $('.ordererror').text("type display order*");
                return false;
            } else

                $('#pcorder').css({
                    'border': '1px solid #CCC'
                });

            $('.ordererror').hide();

            data = new FormData();

            data.append('pcengtitle', title_eng);
            data.append('pcmaltitle', title_mal);
            data.append('pcengmaltitle', title_engmal);
            data.append('pcdeseng', des_eng);
            data.append('pcdesmal', des_mal);
            data.append('image', $('#pcimg')[0].files[0]);
            data.append('pcfeatured', isfeatured);
            data.append('pctrending', istrending);
            data.append('ordpcorderer', order);


            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/save-product-category",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {

                        Swal.fire({
                            title: 'Category Submitted  Successfully',
                            // text: "You won't be able to revert this!",
                            icon: 'success',
                            // showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/product-category';
                            }
                        })
                    }
                }
            })

        }
    </script>
@endsection

