
@extends('layouts.Admin')
@section('title')
Disease Gallary
  @endsection

@section('contents')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gallary</h1>
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

                  <button type="button" class="btn yellowbtn" value="Submit" onclick="window.location.href='/add-disease-gal/{{$id}}'" id="renewbt1" style="float: right;">Add New</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Title(eng)</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <th>More Details</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($disgalleries as $disgal)
                    <tr>
                        <td>{{$disgal->id}}</td>
                        <td>{{$disgal->title_eng}}</td>
                         <td>{{$disgal->status}}</td>
                         <td><a href="{{ route('edit.disgal',$disgal->id)}}"><button class="btn btn-info">edit</button></a></td>
                         <td><a href="{{ route('disgaldetails',$disgal->id)}}"><button class="btn btn-dark">details</button></a></td>
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

