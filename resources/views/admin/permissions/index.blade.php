@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <!-- Content Wrappert -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'Menu', 'key'=>'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                            <div class="col-12"><a href="{{route('permissions.create')}}" class="btn btn-success float-right">Thêm mới</a></div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table ">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Key code</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permission as $permissionItem)
                                    <tr>
                                        <td>{{$permissionItem->id}}</td>
                                        <td>{{$permissionItem->name}}</td>
                                        <td>{{$permissionItem->display_name}}</td>
                                        <td>{{$permissionItem->key_code}}</td>
                                        <td>
                                            <a href="" class="btn btn-default">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
{{--                                            <a href="{{route('menus.edit',['id'=>$dataMenuItem->id])}}" class="btn btn-default">Edit</a>--}}
{{--                                            <a href="{{route('menus.delete',['id'=>$dataMenuItem->id])}}" class="btn btn-danger">Delete</a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$permission->links('pagination::bootstrap-4')}}

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection








