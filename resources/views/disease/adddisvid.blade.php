@extends('layouts.Admin')
@section('title')
    add-disease-video
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Disease video </h1>
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
                                        <input type="text" id="adengtitle" class="form-control" value="">
                                        <div class="titleerror1" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Title (Malayalam) *</label>
                                        <input type="text" id="admaltitle" class="form-control" value="">
                                        <div class="titleerror2" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Description (English) *</label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="addeseng"></textarea>
                                        <div class="deserror1" style="color: red; font-size: 14px; "></div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description (Malayalam) * </label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="addesmal"></textarea>
                                        <div class="deserror2" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>URL (English) *</label>
                                        <input type="text" id="adurleng" class="form-control" value="">
                                        <div class="urlerror1" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>URL (Malayalam) *</label>
                                        <input type="text" id="adurlmal" class="form-control" value="">
                                        <div class="urlerror2" style="color: red; font-size: 14px; "></div>
                                    </div>

                                </div>

                            </div>
                            <center>


                                <button type="button" class="btn yellowbtn" onclick="AddDisVid()"
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
        function AddDisVid() {
            var title_eng = $('input#adengtitle').val();
            var title_mal = $('input#admaltitle').val();
            var des_eng = CKEDITOR.instances.addeseng.getData();
            var des_mal = CKEDITOR.instances.addesmal.getData();
            var url_eng = $('input#adurleng').val();
            var url_mal = $('input#adurlmal').val();

            if (title_eng == '') {
                $('#adengtitle').focus();
                $('#adengtitle').css({
                    'border': '1px solid red'
                });
                $('.titleerror1').show();
                $('.titleerror1').text("enter title*");
                return false;
            } else

                $('#adengtitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerror1').hide();

            if (title_mal == '') {
                $('#admaltitle').focus();
                $('#admaltitle').css({
                    'border': '1px solid red'
                });
                $('.titleerror2').show();
                $('.titleerror2').text("enter title*");
                return false;
            } else

                $('#admaltitle').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerror2').hide();


            if (des_eng == '') {
                $('#addeseng').focus();
                $('#addeseng').css({
                    'border': '1px solid red'
                });
                $('.deserror1').show();
                $('.deserror1').text("enter description*");
                return false;
            } else

                $('#addeseng').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror1').hide();

            if (des_mal == '') {
                $('#addesmal').focus();
                $('#addesmal').css({
                    'border': '1px solid red'
                });
                $('.deserror2').show();
                $('.deserror2').text("enter description*");
                return false;
            } else

                $('#addesmal').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror2').hide();

            if (url_eng == '') {
                $('#adurleng').focus();
                $('#adurleng').css({
                    'border': '1px solid red'
                });
                $('.urlerror1').show();
                $('.urlerror1').text("enter url*");
                return false;
            } else

                $('#adurleng').css({
                    'border': '1px solid #CCC'
                });
            $('.urlerror1').hide();

            if (url_mal == '') {
                $('#adurlmal').focus();
                $('#adurlmal').css({
                    'border': '1px solid red'
                });
                $('.urlerror2').show();
                $('.urlerror2').text("enter url*");
                return false;
            } else

                $('#adurlmal').css({
                    'border': '1px solid #CCC'
                });
            $('.urlerror2').hide();


            data = new FormData();

            data.append('adengtitle', title_eng);
            data.append('admaltitle', title_mal);
            data.append('addeseng', des_eng);
            data.append('addesmal', des_mal);
            data.append('adurleng', url_eng);
            data.append('adurlmal', url_mal);
            data.append('dis_id', '{{$id}}');

            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/save-disease-vid",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {

                        Swal.fire({
                            title: 'Video Added  Successfully',
                            // text: "You won't be able to revert this!",
                            icon: 'success',
                            // showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/dis-video/' + '{{$id}}';
                            }
                        })
                    }
                }
            })

        }
    </script>
@endsection
