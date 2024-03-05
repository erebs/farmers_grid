@extends('layouts.Admin')
@section('title')
    Chats
@endsection

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chats</h1>
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>name</th>
                                            <th>chats</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($chats as $chat)

                                        @php
                                        $newmsgcount=DB::table('chats')->where('sender',$chat->sender)->where('view_status','0')->count();

                                        @endphp

                                            <tr>
                                                <td>{{ $chat->id }}</td>
                                                <td>{{ $chat->GetSender->name}}</td>
                                                <td style="display: flex !important;">
                                                    <div class="d-flex-main">
                                                        <a href="/chat-single/{{$chat->sender}}">
                                                            <button class="btn btn-info">chat</button>
                                                        </a>
                                                    <div style="background-color: red; color: #fff; padding: 3px; height: 20px ; width: 20px;border-radius: 50%; text-align: center;    z-index: 2;font-size: 13px; margin-left: 5px;                                            ">
                                                    @if ($newmsgcount>0){{$newmsgcount}}@endif</div> 
                                                    </div>
                                                  
                                                </td>
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


@endsection
