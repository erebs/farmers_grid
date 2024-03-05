@extends('layouts.Admin')
@section('title')
    add-disease-gallary
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Disease gallary </h1>
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
                                        <input type="text" id="adenggal" class="form-control" value="">
                                        <div class="titleerror1" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Title (Malayalam) *</label>
                                        <input type="text" id="admalgal" class="form-control" value="">
                                        <div class="titleerror2" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Description (English) *</label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="addesenggal"></textarea>
                                        <div class="deserror1" style="color: red; font-size: 14px; "></div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description (Malayalam) * </label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="addesmalgal"></textarea>
                                        <div class="deserror2" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Upload File *</label>
                                      <input type="file" id="file1" style=" background: #ececec;color: black;padding: 1em;">
                                      <div class="fileerror" style="color: red; font-size: 14px; "></div>
                                      </div>
                                </div>

                            </div>
                            <center>


                                <button type="button" class="btn yellowbtn" onclick="AddDisGal()"
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
        function AddDisGal() {
            var title_eng = $('input#adenggal').val();
            var title_mal = $('input#admalgal').val();
            var des_eng = CKEDITOR.instances.addesenggal.getData();
            var des_mal = CKEDITOR.instances.addesmalgal.getData();
            var file= $('input#file1').val();


            if (title_eng == '') {
                $('#adenggal').focus();
                $('#adenggal').css({
                    'border': '1px solid red'
                });
                $('.titleerror1').show();
                $('.titleerror1').text("enter title*");
                return false;
            } else

                $('#adenggal').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerror1').hide();

            if (title_mal == '') {
                $('#admalgal').focus();
                $('#admalgal').css({
                    'border': '1px solid red'
                });
                $('.titleerror2').show();
                $('.titleerror2').text("enter title*");
                return false;
            } else

                $('#admalgal').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerror2').hide();


            if (des_eng == '') {
                $('#addesenggal').focus();
                $('#addesenggal').css({
                    'border': '1px solid red'
                });
                $('.deserror1').show();
                $('.deserror1').text("enter description*");
                return false;
            } else

                $('#addesenggal').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror1').hide();

            if (des_mal == '') {
                $('#addesmalgal').focus();
                $('#addesmalgal').css({
                    'border': '1px solid red'
                });
                $('.deserror2').show();
                $('.deserror2').text("enter description*");
                return false;
            } else

                $('#addesmalgal').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror2').hide();

            if (file == '') {
            $('#file1').focus();
            $('#file1').css({
                'border': '1px solid red'
            });
            $('.fileerror').show();
            $('.fileerror').text("choose an image*");
            return false;
        } else

            $('#file1').css({
                'border': '1px solid #CCC'
            });

        $('.fileerror').hide();


            data = new FormData();
            data.append('dis_id', '{{$id}}');
            data.append('adenggal', title_eng);
            data.append('admalgal', title_mal);
            data.append('addesenggal', des_eng);
            data.append('addesmalgal', des_mal);
            data.append('file1', $('#file1')[0].files[0]);

            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/save-disease-gal",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {

                        Swal.fire({
                            title: 'Added  Successfully',
                            // text: "You won't be able to revert this!",
                            icon: 'success',
                            // showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/dis-gallery/' + '{{$id}}';
                            }
                        })
                    }
                }
            })

        }
    </script>
@endsection
