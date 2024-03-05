@extends('layouts.Admin')
@section('title')
    edit-products
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="/products"><i class="fa fa-arrow-left"
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
                                   <div> <label>Product Category *</label>
                                    <select id="edprodcat" style="width: 100%;padding:10px;border: 1px solid #ced4da;border-radius: 0.25rem;" class="form-select mb-3" aria-label="Default select example">
                                        <option value="">Choose</option>

                                        @foreach ($prodcategories as $productcat)
                                        <option value="{{$productcat->id}}"@if ($productcat->id == $prod->product_category)selected @endif>{{$productcat->title_eng}}</option>
                                        @endforeach

                                      </select></div>
                                      <div class="selecterror" style="color: red; font-size: 14px; "></div>

                                    <div class="form-group">
                                        <label>Name (English) *</label>
                                        <input type="text" id="epenglishname" class="form-control" value="{{$prod->name_english}}">
                                        <input type="hidden" id="prodid" value="{{$prod->id}}">
                                        <div class="nameerroreng" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Name (Malayalam) *</label>
                                        <input type="text" id="epmalname" class="form-control" value="{{$prod->name_malayalam}}">
                                        <div class="nameerrormal" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Name (English & Malayalam) *</label>
                                        <input type="text" id="epengmalname" class="form-control" value="{{$prod->name_english_malayalam}}">
                                        <div class="nameerrorem" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Description(English) *</label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="epdeseng">{{$prod->description_eng}}</textarea>
                                        <div class="deserror" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Description(Malayalam) * </label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="epdesmal">{{$prod->description_mal}}</textarea>
                                        <div class="deserror2" style="color: red; font-size: 14px; "></div>
                                    </div>
                                    <div> <label>Status*</label>
                                        <select id="pstatus"
                                            style="width: 100%;padding:10px;border: 1px solid #ced4da;border-radius: 0.25rem;"
                                            class="form-select mb-3" aria-label="Default select example">
                                            <option value="active"{{ $prod->status === 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive"{{ $prod->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="selecterror" style="color: red; font-size: 14px; "></div>


                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>How To Use(English) * </label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="ephweng">{{$prod->how_to_use_eng}}</textarea>
                                        <div class="hwerror" style="color: red; font-size: 14px; "></div>
                                    </div>
                                    <div class="form-group">
                                        <label>How To Use(Malayalam) * </label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="ephwmal">{{$prod->how_to_use_mal}}</textarea>
                                        <div class="hwerror2" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Image 1*<br><span style="font-size:10px;">( 600px * 300px )</span></label><br>
                                        <input type="file" value="{{$prod->image1}}" id="edimg1" onchange=""
                                            style=" background: #ececec;color: black;padding: 1em;">
                                        <div class="imgerror1" style="color: red; font-size: 14px; "></div>
                                        {{-- <div class="imgerror" style="color: red; font-size: 14px; "></div> --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Image 2*<br><span style="font-size:10px;">( 600px * 300px )</span></label><br>
                                        <input type="file" value="{{$prod->image2}}" id="edimg2" onchange=""
                                            style=" background: #ececec;color: black;padding: 1em;">
                                        <div class="imgerror2" style="color: red; font-size: 14px; "></div>
                                        {{-- <div class="imgerror" style="color: red; font-size: 14px; "></div> --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Image 3*<br><span style="font-size:10px;">( 600px * 300px )</span></label><br>
                                        <input type="file" value="{{$prod->image3}}" id="edimg3" onchange=""
                                            style=" background: #ececec;color: black;padding: 1em;">
                                        <div class="imgerror3" style="color: red; font-size: 14px; "></div>
                                        {{-- <div class="imgerror" style="color: red; font-size: 14px; "></div> --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Image 4*<br><span style="font-size:10px;">( 600px * 300px )</span></label><br>
                                        <input type="file" value="{{$prod->image4}}" id="edimg4" onchange=""
                                            style=" background: #ececec;color: black;padding: 1em;">
                                        <div class="imgerror4" style="color: red; font-size: 14px; "></div>
                                        {{-- <div class="imgerror" style="color: red; font-size: 14px; "></div> --}}
                                    </div>

                                </div>

                            </div>

                        </div>
                        <center>


                            <button type="button" class="btn yellowbtn" onclick="EditProd()" id="submitButton">Submit</button>
                            <button type="button" class="btn yellowbtn" id="submitButton1"> <i class="fa fa-spinner fa-spin"></i>Submit</button>

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

        function EditProd() {
            var id = $('input#prodid').val();
            var prod_cat = $('select#edprodcat').val();
            var name_eng = $('input#epenglishname').val();
            var name_mal = $('input#epmalname').val();
            var name_engmal = $('input#epengmalname').val();
            var des_eng = CKEDITOR.instances.epdeseng.getData();
            var des_mal = CKEDITOR.instances.epdesmal.getData();
            var hw_eng = CKEDITOR.instances.ephweng.getData();
            var hw_mal = CKEDITOR.instances.ephwmal.getData();
            var image1 = $('input#edimg1').val();
            var image2 = $('input#edimg2').val();
            var image3 = $('input#edimg3').val();
            var image4 = $('input#edimg4').val();
            var status = $('select#pstatus').val();

            if (prod_cat == '') {
                $('#edprodcat').focus();
                $('#edprodcat').css({
                    'border': '1px solid red'
                });
                $('.selecterror').show();
                $('.selecterror').text("choose category*");
                return false;
            } else

                $('#edprodcat').css({
                    'border': '1px solid #CCC'
                });
            $('.selecterror').hide();

            if (name_eng  == '') {
                $('#epenglishname').focus();
                $('#epenglishname').css({
                    'border': '1px solid red'
                });
                $('.nameerroreng').show();
                $('.nameerroreng').text("enter name*");
                return false;
            } else

                $('#epenglishname').css({
                    'border': '1px solid #CCC'
                });
            $('.nameerroreng').hide();

            if (name_mal == '') {
                $('#epmalname').focus();
                $('#epmalname').css({
                    'border': '1px solid red'
                });
                $('.nameerrormal').show();
                $('.nameerrormal').text("enter name*");
                return false;
            } else

                $('#epmalname').css({
                    'border': '1px solid #CCC'
                });
            $('.nameerrormal').hide();


            if (name_engmal == '') {
                $('#epengmalname').focus();
                $('#epengmalname').css({
                    'border': '1px solid red'
                });
                $('.nameerrorem').show();
                $('.nameerrorem').text("enter name*");
                return false;
            } else

                $('#epengmalname').css({
                    'border': '1px solid #CCC'
                });
            $('.nameerrorem').hide();


            if (des_eng == '') {
                $('#epdeseng').focus();
                $('#epdeseng').css({
                    'border': '1px solid red'
                });
                $('.deserror').show();
                $('.deserror').text("enter the field*");
                return false;
            } else

                $('#epdeseng').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror').hide();

            if (des_mal == '') {
                $('#epdesmal').focus();
                $('#epdesmal').css({
                    'border': '1px solid red'
                });
                $('.deserror2').show();
                $('.deserror2').text("enter the field*");
                return false;
            } else

                $('#epdesmal').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror2').hide();

            if (hw_eng == '') {
                $('#ephweng').focus();
                $('#ephweng').css({
                    'border': '1px solid red'
                });
                $('.hwerror').show();
                $('.hwerror').text("enter the field*");
                return false;
            } else

                $('#ephweng').css({
                    'border': '1px solid #CCC'
                });

            $('.hwerror').hide();

            if (hw_mal == '') {
                $('#ephwmal').focus();
                $('#ephwmal').css({
                    'border': '1px solid red'
                });
                $('.hwerror2').show();
                $('.hwerror2').text("enter the field*");
                return false;
            } else

                $('#ephwmal').css({
                    'border': '1px solid #CCC'
                });

            $('.hwerror2').hide();


            data = new FormData();
            data.append('prodid', id);

            data.append('edprodcat',prod_cat);
            data.append('epenglishname',name_eng );
            data.append('epmalname',name_mal);
            data.append('epengmalname',name_engmal);
            data.append('epdeseng',des_eng);
            data.append('epdesmal',des_mal);
            data.append('ephweng',hw_eng);
            data.append('ephwmal',hw_mal);
            data.append('edimg1', $('#edimg1')[0].files[0]);
            data.append('edimg2', $('#edimg2')[0].files[0]);
            data.append('edimg3', $('#edimg3')[0].files[0]);
            data.append('edimg4', $('#edimg4')[0].files[0]);
            data.append('pstatus',status);

            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/update-products",
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
                                window.location.href = '/products';
                            }
                        })
                    }
                }
            })

        }
    </script>
@endsection
