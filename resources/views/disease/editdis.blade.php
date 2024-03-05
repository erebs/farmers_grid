@extends('layouts.Admin')
@section('title')
    edit-disease
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>edit Disease</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="/disease"><i class="fa fa-arrow-left"
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
                                   <div> <label>Disease Category *</label>
                                    <select id="editdiscat" style="width: 100%;padding:10px;border: 1px solid #ced4da;border-radius: 0.25rem;" class="form-select mb-3" aria-label="Default select example">

                                        @foreach ( $dis_categories as $diseasecategory)
                                        <option value="{{$diseasecategory->id}}" @if ($diseasecategory->id == $dis->disease_category)selected @endif>{{$diseasecategory->title_eng}}</option>
                                        @endforeach

                                      </select></div>
                                      <div class="selecterror" style="color: red; font-size: 14px; "></div>

                                    <div class="form-group">
                                        <label>Title (English) *</label>
                                        <input type="text" id="edenglishtitle" class="form-control" value="{{$dis->title_english}}">
                                        <input type="hidden" id="id" value="{{$dis->id}}">
                                        <div class="titleerroreng" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Title (Malayalam) *</label>
                                        <input type="text" id="edmalaylmtitle" class="form-control" value="{{$dis->title_malayalam}}">
                                        <div class="titleerrormal" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Title (English & Malayalam) *</label>
                                        <input type="text" id="edenglish_maltitle" class="form-control" value="{{$dis->title_english_malayalam}}">
                                        <div class="titleerrorem" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Common Procedure (English) *</label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="edcpeng">{{$dis->common_procedure_eng}}</textarea>
                                        <div class="cperror1" style="color: red; font-size: 14px; "></div>

                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Common Procedure (Malayalam) * </label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="edcpmal">{{$dis->common_procedure_mal}}</textarea>
                                        <div class="cperror2" style="color: red; font-size: 14px; "></div>

                                    </div>

                                    <div class="form-group">
                                        <label>Image *<br><span style="font-size:10px;">( 600px * 300px )</span></label><br>
                                        <input type="file" id="edimg" value="{{$dis->image}}"  onchange=""
                                            style=" background: #ececec;color: black;padding: 1em;">
                                        <div class="imgerror" style="color: red; font-size: 14px; "></div>
                                        {{-- <div class="imgerror" style="color: red; font-size: 14px; "></div> --}}
                                    </div>
                                    <div> <label>Status*</label>
                                        <select id="distatus"
                                            style="width: 100%;padding:10px;border: 1px solid #ced4da;border-radius: 0.25rem;"
                                            class="form-select mb-3" aria-label="Default select example">
                                            <option value="active"{{ $dis->status === 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive"{{ $dis->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="selecterror" style="color: red; font-size: 14px; "></div>


                                </div>

                            </div>

                        </div>
                        <center>


                            <button type="button" class="btn yellowbtn" onclick="editDis()" id="submitButton">Submit</button>
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

        function editDis() {
            var id = $('input#id').val();

            var dis_cat = $('select#editdiscat').val();
            var title_eng = $('input#edenglishtitle').val();
            var title_mal = $('input#edmalaylmtitle').val();
            var title_engmal = $('input#edenglish_maltitle').val();
            var cp_eng = CKEDITOR.instances.edcpeng.getData();
            var cp_mal = CKEDITOR.instances.edcpmal.getData();
            var image = $('input#edimg').val();
            var status = $('select#distatus').val();

            // if (dis_cat == '') {
            //     $('#editdiscat').focus();
            //     $('#editdiscat').css({
            //         'border': '1px solid red'
            //     });
            //     $('.selecterror').show();
            //     $('.selecterror').text("choose category*");
            //     return false;
            // } else

            //     $('#editdiscat').css({
            //         'border': '1px solid #CCC'
            //     });
            // $('.selecterror').hide();

            if (title_eng == '') {
                $('#edenglishtitle').focus();
                $('#edenglishtitle').css({
                    'border': '1px solid red'
                });
                $('.titleerroreng').show();
                $('.titleerroreng').text("enter title*");
                return false;
            } else

                $('#edenglishtitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerroreng').hide();

            if (title_mal == '') {
                $('#edmalaylmtitle').focus();
                $('#edmalaylmtitle').css({
                    'border': '1px solid red'
                });
                $('.titleerrormal').show();
                $('.titleerrormal').text("enter title*");
                return false;
            } else

                $('#edmalaylmtitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerrormal').hide();


            if (title_engmal == '') {
                $('#edenglish_maltitle').focus();
                $('#edenglish_maltitle').css({
                    'border': '1px solid red'
                });
                $('.titleerrorem').show();
                $('.titleerrorem').text("enter title*");
                return false;
            } else

                $('#edenglish_maltitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerrorem').hide();


            if (cp_eng == '') {
                $('#edcpeng').focus();
                $('#edcpeng').css({
                    'border': '1px solid red'
                });
                $('.cperror1').show();
                $('.cperror1').text("enter the field*");
                return false;
            } else

                $('#edcpeng').css({
                    'border': '1px solid #CCC'
                });

            $('.cperror1').hide();

            if (cp_mal == '') {
                $('#edcpmal').focus();
                $('#edcpmal').css({
                    'border': '1px solid red'
                });
                $('.cperror2').show();
                $('.cperror2').text("enter the field*");
                return false;
            } else

                $('#edcpmal').css({
                    'border': '1px solid #CCC'
                });

            $('.cperror2').hide();


            // if (image == '') {
            //     $('#edimg').focus();
            //     $('#edimg').css({
            //         'border': '1px solid red'
            //     });
            //     $('.imgerror').show();
            //     $('.imgerror').text("choose an image*");
            //     return false;
            // } else

            //     $('#edimg').css({
            //         'border': '1px solid #CCC'
            //     });

            // $('.imgerror').hide();

            data = new FormData();
            data.append('id', id);

            data.append('editdiscat', dis_cat);
            data.append('edenglishtitle', title_eng);
            data.append('edmalaylmtitle', title_mal);
            data.append('edenglish_maltitle', title_engmal);
            data.append('edcpeng', cp_eng);
            data.append('edcpmal', cp_mal);
            data.append('edimg', $('#edimg')[0].files[0]);
            data.append('distatus', status);


            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/update-disease",
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
                                window.location.href = '/disease';
                            }
                        })
                    }
                }
            })

        }
    </script>
@endsection

