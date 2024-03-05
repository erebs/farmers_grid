@extends('layouts.Admin')
@section('title')
    edit-disease-category
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Disease Category </h1>
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
                                        <input type="text" id="titleenglish" class="form-control"
                                            value="{{ $diseasecat->title_eng }}">
                                        <input type="hidden" id="id" value="{{ $diseasecat->id }}">
                                        <div class="titleerror1" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Title (Malayalam) *</label>
                                        <input type="text" id="TitleMal" class="form-control"
                                            value="{{ $diseasecat->title_mal }}">
                                        <div class="titleerror2" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Title (English & Malayalam) *</label>
                                        <input type="text" id="TitleEngMal" class="form-control"
                                            value="{{ $diseasecat->title_eng_mal }}">
                                        <div class="titleerror3" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Description (English) *</label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="DesEng">{{ $diseasecat->description_eng }}</textarea>
                                        <div class="deserror1" style="color: red; font-size: 14px; "></div>

                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description (Malayalam) * </label>
                                        <textarea class="form-control ckeditor" rows="3" cols="3" id="DesMal">{{ $diseasecat->description_mal }}</textarea>
                                        <div class="deserror2" style="color: red; font-size: 14px; "></div>

                                    </div>

                                    <div class="form-group">
                                        <label>Image *<br><span style="font-size:10px;">( 600px * 300px )</span></label><br>
                                        <input type="file" id="Dimg" value="{{ $diseasecat->image }}"
                                            style=" background: #ececec;color: black;padding: 1em;">
                                        <div class="imageerror" style="color: red; font-size: 14px; "></div>
                                        {{-- <div class="imgerror" style="color: red; font-size: 14px; "></div> --}}
                                    </div>

                                    <div class="form-group">
                                        <label>Featured *</label>
                                        <input type="checkbox" id="Featrd" value="1" @if ($diseasecat->featured==1) checked

                                        @endif>
                                        <div class="featurederror" style="color: red; font-size: 14px; "></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Display Order *</label>
                                        <input type="number" class="form-control" id="DisOrder"
                                            value="{{ $diseasecat->dis_order }}">
                                        <div class="ordererror" style="color: red; font-size: 14px; "></div>

                                    </div>
                                    <div> <label>Status*</label>
                                        <select id="dcstatus"
                                            style="width: 100%;padding:10px;border: 1px solid #ced4da;border-radius: 0.25rem;"
                                            class="form-select mb-3" aria-label="Default select example">
                                            <option value="active" {{ $diseasecat->status === 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ $diseasecat->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="selecterror" style="color: red; font-size: 14px; "></div>

                                </div>

                            </div>
                            <center>


                                <button type="button" class="btn yellowbtn" onclick="editCat()"
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
@endsection



<script>
    function editCat() {
        var Disid = $('input#id').val();

        var title_eng = $('input#titleenglish').val();
        var title_mal = $('input#TitleMal').val();
        var title_engmal = $('input#TitleEngMal').val();
        var des_eng = CKEDITOR.instances.DesEng.getData();
        var des_mal = CKEDITOR.instances.DesMal.getData();
        var image = $('input#Dimg').val();
        var featured = $('#Featrd').val();
        var order = $('input#DisOrder').val();
        var status = $('#dcstatus option:selected').val();


        if (title_eng == '') {
            $('#titleenglish').focus();
            $('#titleenglish').css({
                'border': '1px solid red'
            });
            $('.titleerror1').show();
            $('.titleerror1').text("enter title*");
            return false;
        } else

            $('#titleenglish').css({
                'border': '1px solid #CCC'
            });
        $('.titleerror1').hide();

        if (title_mal == '') {
            $('#TitleMal').focus();
            $('#TitleMal').css({
                'border': '1px solid red'
            });
            $('.titleerror2').show();
            $('.titleerror2').text("enter title*");
            return false;
        } else

            $('#TitleMal').css({
                'border': '1px solid #CCC'
            });
        $('.titleerror2').hide();


        if (title_engmal == '') {
            $('#TitleEngMal').focus();
            $('#TitleEngMal').css({
                'border': '1px solid red'
            });
            $('.titleerror3').show();
            $('.titleerror3').text("enter title*");
            return false;
        } else

            $('#TitleEngMal').css({
                'border': '1px solid #CCC'
            });
        $('.titleerror3').hide();


        if (des_eng == '') {
            $('#DesEng').focus();
            $('#DesEng').css({
                'border': '1px solid red'
            });
            $('.deserror1').show();
            $('.deserror1').text("enter description*");
            return false;
        } else

            $('#DesEng').css({
                'border': '1px solid #CCC'
            });

        $('.deserror1').hide();

        if (des_mal == '') {
            $('#DesMal').focus();
            $('#DesMal').css({
                'border': '1px solid red'
            });
            $('.deserror2').show();
            $('.deserror2').text("enter description*");
            return false;
        } else

            $('#DesMal').css({
                'border': '1px solid #CCC'
            });

        $('.deserror2').hide();



        if ($('#Featrd').prop('checked')) {
   var isfeatured = 1;
} else {
    var isfeatured = 0;
}



        if (order == '') {
            $('#DisOrder').focus();
            $('#DisOrder').css({
                'border': '1px solid red'
            });
            $('.ordererror').show();
            $('.ordererror').text("type display order*");
            return false;
        } else

            $('#DisOrder').css({
                'border': '1px solid #CCC'
            });

        $('.ordererror').hide();

        data = new FormData();
        data.append('did', Disid);

        data.append('titleenglish', title_eng);
        data.append('TitleMal', title_mal);
        data.append('TitleEngMal', title_engmal);
        data.append('DesEng', des_eng);
        data.append('DesMal', des_mal);
        data.append('Dimg', $('#Dimg')[0].files[0]);
        data.append('Featrd', isfeatured);
        data.append('DisOrder', order);
        data.append('dcstatus', status);



        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/update-disease-category",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {

                    Swal.fire({
                        title: 'Category Edited Successfully',
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
