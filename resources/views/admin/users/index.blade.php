@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection
@section('js')
    <script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/actionDelete.js')}}"></script>
@endsection

@section('content')
    <!-- Content Wrappert -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'Users', 'key'=>'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                            <div class="col-12"><a href="{{route('users.create')}}" class="btn btn-success float-right">Thêm mới</a></div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table ">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dataUser as $dataUserItem)
                                    <tr>
                                        <td>{{$dataUserItem->id}}</td>
                                        <td>{{$dataUserItem->name}}</td>
                                        <td>{{$dataUserItem->email}}</td>
                                        <td>
                                            <a href="{{route('users.edit',['id'=>$dataUserItem->id])}}" class="btn btn-default">Edit</a>
                                            <a
                                                data-url="{{route('users.delete',['id'=>$dataUserItem->id])}}"
                                                href="" class="btn btn-danger action-delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$dataUser->links('pagination::bootstrap-4')}}

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection








