@extends('layouts.Admin')
@section('title')
    dashboard
@endsection

@section('contents')
    <style type="text/css">

    </style>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">


                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- COLOR PALETTE -->


                <div class="row">
                    <div class="col-md-4 col-xl-3">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h4>Disease Category</h4>

                                <p>categories</p>
                            </div>
                            <a href="/disease-category" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-md-4 col-xl-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4>Disease</h4>

                                <p>Diseases</p>
                            </div>
                            <a href="/disease" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- <div class="col-md-4 col-xl-3">
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h4 style="color:white;"></h4>

                    <p style="color:white;">Frauds</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-user-secret"></i>
                  </div>
                  <a href="/frauds" class="small-box-footer" style="color:white !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div> -->

                    <div class="col-md-4 col-xl-3">
                        <div class="small-box" style="background-color:#c4789b;">
                            <div class="inner">
                                <h4 style="color:white;">Product Category</h4>

                                <p style="color:white;">Categories</p>
                            </div>
                            <a href="/product-category" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-md-4 col-xl-3">
                        <div class="small-box" style="background-color:#1ea683;">
                            <div class="inner">
                                <h4 style="color:white;">Product</h4>

                                <p style="color:white;">Products</p>
                            </div>
                            <a href="/products" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <br>

                        <!-- Today's Ride Bookings -->

                        <!-- Today's Service Bookings -->


                    </div>

                    <!-- Today's Service Bookings -->

                    <!-- Ads -->

                    <div class="col-md-4">

                    </div>

                </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
