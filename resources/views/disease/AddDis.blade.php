@extends('layouts.Admin')
@section('title')
    add-disease
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Disease</h1>
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
                                    <select id="discatdis" style="width: 100%;padding:10px;border: 1px solid #ced4da;border-radius: 0.25rem;" class="form-select mb-3" aria-label="Default select example">
                                        <option value="">Choose</option>

                                        @foreach ($diseasecategories as $diseasecategory)
                                        <option value="{{$diseasecategory->id}}">{{$diseasecategory->title_eng}}</option>
                                        @endforeach
                                      </select></div>
                                      <div class="selecterror" style="color: red; font-size: 14px; "></div>

                                    <div class="form-group">
                                        <label>Title (English) *</label>
                                        <input type="text" id="englishtitle" class="form-control" value="">
                                        <div class="titleerroreng" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Title (Malayalam) *</label>
                                        <input type="text" id="malaylmtitle" class="form-control" value="">
                                        <div class="titleerrormal" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Title (English & Malayalam) *</label>
                                        <input type="text" id="english_maltitle" class="form-control" value="">
                                        <div class="titleerrorem" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Common Procedure (English) *</label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="cpeng"></textarea>
                                        <div class="cperror1" style="color: red; font-size: 14px; "></div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Common Procedure (Malayalam) * </label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="cpmal"></textarea>
                                        <div class="cperror2" style="color: red; font-size: 14px; "></div>

                                    </div>

                                    <div class="form-group">
                                        <label>Image *<br><span style="font-size:10px;">( 600px * 300px )</span></label><br>
                                        <input type="file" id="imgdis" onchange=""
                                            style=" background: #ececec;color: black;padding: 1em;">
                                        <div class="imgerror" style="color: red; font-size: 14px; "></div>
                                        {{-- <div class="imgerror" style="color: red; font-size: 14px; "></div> --}}
                                    </div>

                                </div>

                            </div>

                        </div>
                        <center>


                            <button type="button" class="btn yellowbtn" onclick="AddDis()" id="submitButton">Submit</button>
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

        function AddDis() {
            var dis_cat = $('select#discatdis').val();
            var title_eng = $('input#englishtitle').val();
            var title_mal = $('input#malaylmtitle').val();
            var title_engmal = $('input#english_maltitle').val();
            var cp_eng = CKEDITOR.instances.cpeng.getData();
            var cp_mal = CKEDITOR.instances.cpmal.getData();
            var image = $('input#imgdis').val();

            if (dis_cat == '') {
                $('#discatdis').focus();
                $('#discatdis').css({
                    'border': '1px solid red'
                });
                $('.selecterror').show();
                $('.selecterror').text("choose category*");
                return false;
            } else

                $('#discatdis').css({
                    'border': '1px solid #CCC'
                });
            $('.selecterror').hide();

            if (title_eng == '') {
                $('#englishtitle').focus();
                $('#englishtitle').css({
                    'border': '1px solid red'
                });
                $('.titleerroreng').show();
                $('.titleerroreng').text("enter title*");
                return false;
            } else

                $('#englishtitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerroreng').hide();

            if (title_mal == '') {
                $('#malaylmtitle').focus();
                $('#malaylmtitle').css({
                    'border': '1px solid red'
                });
                $('.titleerrormal').show();
                $('.titleerrormal').text("enter title*");
                return false;
            } else

                $('#malaylmtitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerrormal').hide();


            if (title_engmal == '') {
                $('#english_maltitle').focus();
                $('#english_maltitle').css({
                    'border': '1px solid red'
                });
                $('.titleerrorem').show();
                $('.titleerrorem').text("enter title*");
                return false;
            } else

                $('#english_maltitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerrorem').hide();


            if (cp_eng == '') {
                $('#cpeng').focus();
                $('#cpeng').css({
                    'border': '1px solid red'
                });
                $('.cperror1').show();
                $('.cperror1').text("enter the field*");
                return false;
            } else

                $('#cpeng').css({
                    'border': '1px solid #CCC'
                });

            $('.cperror1').hide();

            if (cp_mal == '') {
                $('#cpmal').focus();
                $('#cpmal').css({
                    'border': '1px solid red'
                });
                $('.cperror2').show();
                $('.cperror2').text("enter the field*");
                return false;
            } else

                $('#cpmal').css({
                    'border': '1px solid #CCC'
                });

            $('.cperror2').hide();


            if (image == '') {
                $('#imgdis').focus();
                $('#imgdis').css({
                    'border': '1px solid red'
                });
                $('.imgerror').show();
                $('.imgerror').text("choose an image*");
                return false;
            } else

                $('#imgdis').css({
                    'border': '1px solid #CCC'
                });

            $('.imgerror').hide();

            data = new FormData();
            data.append('discatdis', dis_cat);
            data.append('englishtitle', title_eng);
            data.append('malaylmtitle', title_mal);
            data.append('title_engmal', title_engmal);
            data.append('cpeng', cp_eng);
            data.append('cpmal', cp_mal);
            data.append('image', $('#imgdis')[0].files[0]);

            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/save-disease",
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
                                window.location.href = '/disease';
                            }
                        })
                    }
                }
            })

        }
    </script>
@endsection
