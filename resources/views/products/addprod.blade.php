@extends('layouts.Admin')
@section('title')
    add-products
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="/products"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    Back</a></li>
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
                                    <div> <label>Product Category *</label>
                                        <select id="prodcat"
                                            style="width: 100%;padding:10px;border: 1px solid #ced4da;border-radius: 0.25rem;"
                                            class="form-select mb-3" aria-label="Default select example">
                                            <option value="">Choose</option>

                                            @foreach ($prodcategories as $productcat)
                                                <option value="{{ $productcat->id }}">{{ $productcat->title_eng }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                    <div class="selecterror" style="color: red; font-size: 14px; "></div>

                                    <div class="form-group">
                                        <label>Name (English) *</label>
                                        <input type="text" id="apenglishname" class="form-control" value="">
                                        <div class="nameerroreng" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Name (Malayalam) *</label>
                                        <input type="text" id="apmalname" class="form-control" value="">
                                        <div class="nameerrormal" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Name (English & Malayalam) *</label>
                                        <input type="text" id="apengmalname" class="form-control" value="">
                                        <div class="nameerrorem" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Description(English) *</label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="apdeseng"></textarea>
                                        <div class="deserror" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Description(Malayalam) * </label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="apdesmal"></textarea>
                                        <div class="deserror2" style="color: red; font-size: 14px; "></div>
                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <label>Add Unit * </label>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" id="unitname" class="form-control" value="">
                                            <div class="unitnamerr" style="color: red; font-size: 14px; "></div>

                                        </div>
                                        <div class="form-group">
                                            <label>Price </label>
                                            <input type="text" id="unitprice" class="form-control" value="">
                                            <div class="unitpricerr" style="color: red; font-size: 14px; "></div>

                                        </div>
                                        <div class="form-group">
                                            <label>Offer Price</label>
                                            <input type="text" id="unitop" class="form-control" value="">
                                            <div class="unitoperr" style="color: red; font-size: 14px; "></div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>How To Use(English) * </label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="aphweng"></textarea>
                                        <div class="hwerror" style="color: red; font-size: 14px; "></div>
                                    </div>
                                    <div class="form-group">
                                        <label>How To Use(Malayalam) * </label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="aphwmal"></textarea>
                                        <div class="hwerror2" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Image 1*<br><span style="font-size:10px;">( 600px * 300px
                                                )</span></label><br>
                                        <input type="file" id="img1" onchange=""
                                            style=" background: #ececec;color: black;padding: 1em;">
                                        <div class="imgerror1" style="color: red; font-size: 14px; "></div>
                                        {{-- <div class="imgerror" style="color: red; font-size: 14px; "></div> --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Image 2*<br><span style="font-size:10px;">( 600px * 300px
                                                )</span></label><br>
                                        <input type="file" id="img2" onchange=""
                                            style=" background: #ececec;color: black;padding: 1em;">
                                        <div class="imgerror2" style="color: red; font-size: 14px; "></div>
                                        {{-- <div class="imgerror" style="color: red; font-size: 14px; "></div> --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Image 3*<br><span style="font-size:10px;">( 600px * 300px
                                                )</span></label><br>
                                        <input type="file" id="img3" onchange=""
                                            style=" background: #ececec;color: black;padding: 1em;">
                                        <div class="imgerror3" style="color: red; font-size: 14px; "></div>
                                        {{-- <div class="imgerror" style="color: red; font-size: 14px; "></div> --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Image 4*<br><span style="font-size:10px;">( 600px * 300px
                                                )</span></label><br>
                                        <input type="file" id="img4" onchange=""
                                            style=" background: #ececec;color: black;padding: 1em;">
                                        <div class="imgerror4" style="color: red; font-size: 14px; "></div>
                                        {{-- <div class="imgerror" style="color: red; font-size: 14px; "></div> --}}
                                    </div>

                                </div>

                            </div>

                        </div>
                        <center>


                            <button type="button" class="btn yellowbtn" onclick="AddProd()"
                                id="submitButton">Submit</button>
                            <button type="button" class="btn yellowbtn" id="submitButton1"> <i
                                    class="fa fa-spinner fa-spin"></i>Submit</button>

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
        function AddProd() {
            var prod_cat = $('select#prodcat').val();
            var name_eng = $('input#apenglishname').val();
            var name_mal = $('input#apmalname').val();
            var name_engmal = $('input#apengmalname').val();
            var des_eng = CKEDITOR.instances.apdeseng.getData();
            var des_mal = CKEDITOR.instances.apdesmal.getData();
            var name = $('input#unitname').val();
            var price = $('input#unitprice').val();
            var offer_price = $('input#unitop').val();
            var hw_eng = CKEDITOR.instances.aphweng.getData();
            var hw_mal = CKEDITOR.instances.aphwmal.getData();
            var image1 = $('input#img1').val();
            var image2 = $('input#img2').val();
            var image3 = $('input#img3').val();
            var image4 = $('input#img4').val();

            if (prod_cat == '') {
                $('#prodcat').focus();
                $('#prodcat').css({
                    'border': '1px solid red'
                });
                $('.selecterror').show();
                $('.selecterror').text("choose category*");
                return false;
            } else

                $('#prodcat').css({
                    'border': '1px solid #CCC'
                });
            $('.selecterror').hide();

            if (name_eng == '') {
                $('#apenglishname').focus();
                $('#apenglishname').css({
                    'border': '1px solid red'
                });
                $('.nameerroreng').show();
                $('.nameerroreng').text("enter name*");
                return false;
            } else

                $('#apenglishname').css({
                    'border': '1px solid #CCC'
                });
            $('.nameerroreng').hide();

            if (name_mal == '') {
                $('#apmalname').focus();
                $('#apmalname').css({
                    'border': '1px solid red'
                });
                $('.nameerrormal').show();
                $('.nameerrormal').text("enter name*");
                return false;
            } else

                $('#apmalname').css({
                    'border': '1px solid #CCC'
                });
            $('.nameerrormal').hide();


            if (name_engmal == '') {
                $('#apengmalname').focus();
                $('#apengmalname').css({
                    'border': '1px solid red'
                });
                $('.nameerrorem').show();
                $('.nameerrorem').text("enter name*");
                return false;
            } else

                $('#apengmalname').css({
                    'border': '1px solid #CCC'
                });
            $('.nameerrorem').hide();


            if (des_eng == '') {
                $('#apdeseng').focus();
                $('#apdeseng').css({
                    'border': '1px solid red'
                });
                $('.deserror').show();
                $('.deserror').text("enter the field*");
                return false;
            } else

                $('#apdeseng').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror').hide();

            if (des_mal == '') {
                $('#apdesmal').focus();
                $('#apdesmal').css({
                    'border': '1px solid red'
                });
                $('.deserror2').show();
                $('.deserror2').text("enter the field*");
                return false;
            } else

                $('#apdesmal').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror2').hide(); //unit val

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




            ////

            if (hw_eng == '') {
                $('#aphweng').focus();
                $('#aphweng').css({
                    'border': '1px solid red'
                });
                $('.hwerror').show();
                $('.hwerror').text("enter the field*");
                return false;
            } else

                $('#aphweng').css({
                    'border': '1px solid #CCC'
                });

            $('.hwerror').hide();

            if (hw_mal == '') {
                $('#aphwmal').focus();
                $('#aphwmal').css({
                    'border': '1px solid red'
                });
                $('.hwerror2').show();
                $('.hwerror2').text("enter the field*");
                return false;
            } else

                $('#aphwmal').css({
                    'border': '1px solid #CCC'
                });

            $('.hwerror2').hide();


            if (image1 == '') {
                $('#img1').focus();
                $('#img1').css({
                    'border': '1px solid red'
                });
                $('.imgerror1').show();
                $('.imgerror1').text("choose an image*");
                return false;
            } else

                $('#img1').css({
                    'border': '1px solid #CCC'
                });

            $('.imgerror1').hide();

            if (image2 == '') {
                $('#img2').focus();
                $('#img2').css({
                    'border': '1px solid red'
                });
                $('.imgerror2').show();
                $('.imgerror2').text("choose an image*");
                return false;
            } else

                $('#img2').css({
                    'border': '1px solid #CCC'
                });

            $('.imgerror2').hide();

            if (image3 == '') {
                $('#img3').focus();
                $('#img3').css({
                    'border': '1px solid red'
                });
                $('.imgerror3').show();
                $('.imgerror3').text("choose an image*");
                return false;
            } else

                $('#img3').css({
                    'border': '1px solid #CCC'
                });

            $('.imgerror3').hide();

            if (image4 == '') {
                $('#img4').focus();
                $('#img4').css({
                    'border': '1px solid red'
                });
                $('.imgerror4').show();
                $('.imgerror4').text("choose an image*");
                return false;
            } else

                $('#img4').css({
                    'border': '1px solid #CCC'
                });

            $('.imgerror4').hide();

            data = new FormData();
            data.append('prodcat', prod_cat);
            data.append('apenglishname', name_eng);
            data.append('apmalname', name_mal);
            data.append('apengmalname', name_engmal);
            data.append('apdeseng', des_eng);
            data.append('apdesmal', des_mal);
            data.append('unitname', name); /////////
            data.append('unitprice', price);
            data.append('unitop', offer_price);
            // data.append('def_item', def_item); //////////
            data.append('aphweng', hw_eng);
            data.append('aphwmal', hw_mal);
            data.append('image1', $('#img1')[0].files[0]);
            data.append('image2', $('#img2')[0].files[0]);
            data.append('image3', $('#img3')[0].files[0]);
            data.append('image4', $('#img4')[0].files[0]);

            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/save-products",
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
                                window.location.href = '/products';
                            }
                        })
                    }
                }
            })

        }
    </script>
@endsection
