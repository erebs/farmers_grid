
@extends('layouts.Admin')
@section('title')
Product Category
  @endsection

@section('contents')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Category</h1>
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

                  <button type="button" class="btn yellowbtn" value="Submit" onclick="window.location.href='/add-product-category'" id="renewbt1" style="float: right;"> Add New</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Title(eng)</th>
                    <th>Featured</th>
                    <th>Trending</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <th>More Details</th>

                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($prodcategories as $prodcategory)
                    <tr>
                        <td>{{$prodcategory->id}}</td>
                        <td>{{$prodcategory->title_eng}}</td>
                         @if ($prodcategory->featured==1)
                         <td>featured</td>
                         @else
                         <td>not featured</td>
                         @endif

                         @if ($prodcategory->trending==1)
                         <td>trending</td>
                         @else
                         <td>not trending</td>
                         @endif

                         <td>{{$prodcategory->status}}</td>
                         <td><a href="{{ route('edit.prodcat',$prodcategory->id)}}"><button class="btn btn-info">edit</button></a></td>
                         <td><a href="{{ route('prodcatdetails',$prodcategory->id)}}"><button class="btn btn-dark">detials</button></a></td>
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

