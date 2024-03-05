@extends('layouts.Admin')
@section('title')
Details
  @endsection

@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary" style="border-top: 3px solid #d11409 ;">
              <div class="card-body box-profile">
                <div class="text-center">
                    {{-- <h3 class="profile-username text-center">{{$disease->title_english}}</h3>
                    <h3 class="profile-username text-center">{{$disease->title_malayalam}}</h3> --}}
                    <h3 class="profile-username text-center">{{$disease->title_english_malayalam}}</h3> <br>

                  <img class="img-fluid" height="100px" width="100px"
                       src="{{ asset($disease->image) }}"
                       alt="User profile picture">
                </div> <br>

                {{-- <p class="text-muted text-center">Software Engineer</p> --}}


                <a href="{{ route('edit.dis',$disease->id)}}" class="btn btn-primary btn-block" style=" background-color: #d11409; border-color: #d11409;"><b>Edit</b></a>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                    {{-- buttons --}}
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Details</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">

                    <!-- Post -->
                    <div class="post">
                        <div class="user-block">
                          <span class="username">
                            <h5 style="margin-left: -45px">Disease Category</h5>
                          </span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                            {{$disease->GetCat->title_eng}}
                        </p>
                      </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <span class="username">
                          <h5 style="margin-left: -45px">Common Procedure Eng</h5>
                        </span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        {!!$disease->common_procedure_eng!!}
                      </p>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                        <div class="user-block">
                          <span class="username">
                            <h5 style="margin-left: -45px">Common Procedure Mal</h5>
                          </span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                            {!!$disease->common_procedure_mal!!}
                        </p>
                      </div>
                    <!-- /.post -->

                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
