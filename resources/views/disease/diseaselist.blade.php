
@extends('layouts.Admin')
@section('title')
Disease
  @endsection

@section('contents')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Disease</h1>
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

                  <button type="button" class="btn yellowbtn" value="Submit" onclick="window.location.href='/add-disease'" id="renewbt1" style="float: right;">  Add New</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Disease Category</th>
                    <th>Title(eng)</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <th>Video</th>
                    <th>Gallery</th>
                    <th>Products</th>
                    <th>More Details</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($diseases as $disease)
                    <tr>
                         <td>{{$disease->id}}</td>
                         <th>{{$disease->GetCat->title_eng}}</th>
                         <td>{{$disease->title_english}}</td>
                         <td>{{$disease->status}}</td>
                         <td><a href="{{ route('edit.dis',$disease->id)}}"><button class="btn btn-info">edit</button></a></td>
                         <td><a href="{{ route('dis.video',$disease->id)}}"><button class="btn btn-warning">Video</button></a></td>
                         <td><a href="{{ route('dis.gallery',$disease->id)}}"><button class="btn btn-success">Gallary</button></a></td>
                         <td><a href="{{ route('productsdesease',$disease->id)}}"><button class="btn btn-primary">products</button></a></td>
                         <td><a href="{{ route('disdetails',$disease->id)}}"><button class="btn btn-dark">Details</button></a></td>
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

