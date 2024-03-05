@extends('layouts.Admin')
@section('title')
    edit-disease-video
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Disease video </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="/dis-video/{id}"><i class="fa fa-arrow-left"
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
                                        <input type="hidden" id="edvid" value="{{$disvid->id}}">
                                        <input type="text" id="edengtitle" class="form-control" value="{{$disvid->title_eng}}">
                                        <div class="titleerror1" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Title (Malayalam) *</label>
                                        <input type="text" id="edmaltitle" class="form-control" value="{{$disvid->title_mal}}">
                                        <div class="titleerror2" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Description (English) *</label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="eddeseng">{{$disvid->description_eng}}</textarea>
                                        <div class="deserror1" style="color: red; font-size: 14px; "></div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description (Malayalam) * </label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="eddesmal">{{$disvid->description_mal}}</textarea>
                                        <div class="deserror2" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>URL (English) *</label>
                                        <input type="text" id="edurleng" class="form-control" value="{{$disvid->url_eng}}">
                                        <div class="urlerror1" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>URL (Malayalam) *</label>
                                        <input type="text" id="edurlmal" class="form-control" value="{{$disvid->url_mal}}">
                                        <div class="urlerror2" style="color: red; font-size: 14px; "></div>
                                    </div>
                                    <div> <label>Status*</label>
                                        <select id="dvstatus"
                                            style="width: 100%;padding:10px;border: 1px solid #ced4da;border-radius: 0.25rem;"
                                            class="form-select mb-3" aria-label="Default select example">
                                            <option value="active"{{ $disvid->status === 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive"{{ $disvid->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="selecterror" style="color: red; font-size: 14px; "></div>


                                </div>

                            </div>
                            <center>


                                <button type="button" class="btn yellowbtn" onclick="EditDisVid()"
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
        function EditDisVid() {
            var id = $('input#edvid').val();
            var title_eng = $('input#edengtitle').val();
            var title_mal = $('input#edmaltitle').val();
            var des_eng = CKEDITOR.instances.eddeseng.getData();
            var des_mal = CKEDITOR.instances.eddesmal.getData();
            var url_eng = $('input#edurleng').val();
            var url_mal = $('input#edurlmal').val();
            var status = $('select#dvstatus').val();

            if (title_eng == '') {
                $('#edengtitle').focus();
                $('#edengtitle').css({
                    'border': '1px solid red'
                });
                $('.titleerror1').show();
                $('.titleerror1').text("enter title*");
                return false;
            } else

                $('#edengtitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerror1').hide();

            if (title_mal == '') {
                $('#edmaltitle').focus();
                $('#edmaltitle').css({
                    'border': '1px solid red'
                });
                $('.titleerror2').show();
                $('.titleerror2').text("enter title*");
                return false;
            } else

                $('#edmaltitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerror2').hide();


            if (des_eng == '') {
                $('#eddeseng').focus();
                $('#eddeseng').css({
                    'border': '1px solid red'
                });
                $('.deserror1').show();
                $('.deserror1').text("enter description*");
                return false;
            } else

                $('#eddeseng').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror1').hide();

            if (des_mal == '') {
                $('#eddesmal').focus();
                $('#eddesmal').css({
                    'border': '1px solid red'
                });
                $('.deserror2').show();
                $('.deserror2').text("enter description*");
                return false;
            } else

                $('#eddesmal').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror2').hide();

            if (url_eng == '') {
                $('#edurleng').focus();
                $('#edurleng').css({
                    'border': '1px solid red'
                });
                $('.urlerror1').show();
                $('.urlerror1').text("enter url*");
                return false;
            } else

                $('#edurleng').css({
                    'border': '1px solid #CCC'
                });
            $('.urlerror1').hide();

            if (url_mal == '') {
                $('#edurlmal').focus();
                $('#edurlmal').css({
                    'border': '1px solid red'
                });
                $('.urlerror2').show();
                $('.urlerror2').text("enter url*");
                return false;
            } else

                $('#edurlmal').css({
                    'border': '1px solid #CCC'
                });
            $('.urlerror2').hide();


            data = new FormData();
            data.append('edvid', id);

            data.append('edengtitle', title_eng);
            data.append('edmaltitle', title_mal);
            data.append('eddeseng', des_eng);
            data.append('eddesmal', des_mal);
            data.append('edurleng', url_eng);
            data.append('edurlmal', url_mal);
            data.append('dvstatus', status);

            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/update-disease-vid",
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
                                window.location.href = '/dis-video/' + '{{$disvid->dis_id}}';
                            }
                        })
                    }
                }
            })

        }
    </script>
@endsection
