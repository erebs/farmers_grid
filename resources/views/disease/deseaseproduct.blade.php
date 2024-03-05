@extends('layouts.Admin')
@section('title')
    products
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="/girokab-admin/customer-area"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li> -->

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-header">
                                <div style="width: 100%">
                                    <label>Add Products *</label>
                                    <div class="main" style="display: flex">
                                        <select id="product_select"
                                            style="width: 50%;padding:10px;border: 1px solid #ced4da;border-radius: 0.25rem;"
                                            class="form-select mb-3" aria-label="Default select example">
                                            <option value="">Choose</option>

                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name_english }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="selecterror" style="color: red; font-size: 14px; "></div>

                                    <button type="button" style="display: flex;padding: 7px 30px;" class="btn yellowbtn"
                                        id="renewbt1" onclick="addProd('{{ $id }}')">Add</button>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>Products</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($diseaseproducts as $disease)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $disease->GetName->name_english }}</td>
                                                <td>{{ $disease->status }}</td>
                                                <td><a class="btn btn-info text-light" href="{{ route('delete.prod', ['disease_id' => $disease->id, 'id' => $id]) }}">delete</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->





    <!-- Page specific script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>

        function addProd(dis_id) {
            var prod_id = $('select#product_select').val();




            data = new FormData();

            data.append('dis_id', dis_id);
            data.append('prod_id', prod_id);


            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/add-dis-prod",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {
                        Swal.fire({
                            title: 'Product Added  Successfully',
                            // text: "You won't be able to revert this!",
                            icon: 'success',
                            // showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = window.location.href;
                            }
                        })
                    }
                    if (data['error']) {
                        Swal.fire({
                            title: 'Product already exists',
                            // text: "You won't be able to revert this!",
                            icon: 'error',
                            // showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        })
                    }
                }
            })
        }
    </script>
@endsection
