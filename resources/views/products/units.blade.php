
@extends('layouts.Admin')
@section('title')
Units
  @endsection

@section('contents')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Units</h1>
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
          <div class="col-12">


            <div class="card">
              <div class="card-header">

                  <button type="button" class="btn yellowbtn" value="Submit" onclick="window.location.href='/add-units/{{$id}}'" id="renewbt1" style="float: right;">  Add New</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Offer Price</th>
                    <th>Default</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($units as $unit)
                    <tr>
                        <td>{{$unit->id}}</td>
                        <td>{{$unit->name}}</td>
                         <td>{{$unit->price}}</td>
                         <td>{{$unit->offer_price}}</td>
                         <td>{{$unit->default}}</td>
                         <td>{{$unit->status}}</td>
                         <td><a href="{{ route('edit.units',$unit->id)}}"><button class="btn btn-info">edit</button></a></td>
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

<script>





</script>


@endsection

