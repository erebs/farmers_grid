@extends('layouts.Admin')
@section('title')
    edit-disease-gallary
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Disease gallary </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="/dis-gallery/{id}"><i class="fa fa-arrow-left"
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
                                        <input type="text" id="edenggal" class="form-control"
                                            value="{{ $disgallery->title_eng }}">
                                        <input type="hidden" id="edgal" value="{{ $disgallery->id }}">
                                        <div class="titleerror1" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Title (Malayalam) *</label>
                                        <input type="text" id="edmalgal" class="form-control"
                                            value="{{ $disgallery->title_mal }}">
                                        <div class="titleerror2" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Description (English) *</label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="eddesenggal">{{ $disgallery->description_eng }}</textarea>
                                        <div class="deserror1" style="color: red; font-size: 14px; "></div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description (Malayalam) * </label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="eddesmalgal">{{ $disgallery->description_mal }}</textarea>
                                        <div class="deserror2" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Upload File *</label>
                                        <input type="file" id="edfile" value="{{ $disgallery->file }}"
                                            style=" background: #ececec;color: black;padding: 1em;">
                                        <div class="fileerror" style="color: red; font-size: 14px; "></div>
                                    </div>
                                    <div> <label>Status*</label>
                                        <select id="dgstatus"
                                            style="width: 100%;padding:10px;border: 1px solid #ced4da;border-radius: 0.25rem;"
                                            class="form-select mb-3" aria-label="Default select example">
                                            <option value="active"{{ $disgallery->status === 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive"{{ $disgallery->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="selecterror" style="color: red; font-size: 14px; "></div>

                                </div>

                            </div>
                            <center>


                                <button type="button" class="btn yellowbtn" onclick="EditDisGal()"
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
        function EditDisGal() {
            var id = $('input#edgal').val();

            var title_eng = $('input#edenggal').val();
            var title_mal = $('input#edmalgal').val();
            var des_eng = CKEDITOR.instances.eddesenggal.getData();
            var des_mal = CKEDITOR.instances.eddesmalgal.getData();
            var file = $('input#edfile').val();
            var status = $('select#dgstatus').val();



            if (title_eng == '') {
                $('#edenggal').focus();
                $('#edenggal').css({
                    'border': '1px solid red'
                });
                $('.titleerror1').show();
                $('.titleerror1').text("enter title*");
                return false;
            } else

                $('#edenggal').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerror1').hide();

            if (title_mal == '') {
                $('#edmalgal').focus();
                $('#edmalgal').css({
                    'border': '1px solid red'
                });
                $('.titleerror2').show();
                $('.titleerror2').text("enter title*");
                return false;
            } else

                $('#edmalgal').css({
                    'border': '1px solid #CCC'
                });
            $('.titleerror2').hide();


            if (des_eng == '') {
                $('#eddesenggal').focus();
                $('#eddesenggal').css({
                    'border': '1px solid red'
                });
                $('.deserror1').show();
                $('.deserror1').text("enter description*");
                return false;
            } else

                $('#eddesenggal').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror1').hide();

            if (des_mal == '') {
                $('#eddesmalgal').focus();
                $('#eddesmalgal').css({
                    'border': '1px solid red'
                });
                $('.deserror2').show();
                $('.deserror2').text("enter description*");
                return false;
            } else

                $('#eddesmalgal').css({
                    'border': '1px solid #CCC'
                });

            $('.deserror2').hide();


            data = new FormData();
            data.append('edgal', id);
            data.append('edenggal', title_eng);
            data.append('edmalgal', title_mal);
            data.append('eddesenggal', des_eng);
            data.append('eddesmalgal', des_mal);
            data.append('edfile', $('#edfile')[0].files[0]);
            data.append('dgstatus', status);

            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/update-disease-gal",
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
                                window.location.href = '/dis-gallery/' + '{{ $disgallery->dis_id }}';
                            }
                        })
                    }
                }
            })

        }
    </script>
@endsection
