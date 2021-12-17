@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <!-- Content Wrappert -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'category', 'key'=>'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                            @can('category-add')
                            <div class="col-12"><a href="{{route('categories.create')}}"
                                                   class="btn btn-success float-right">Thêm mới</a></div>
                            @endcan
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table ">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Tên danh mục</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $categoriesItem)
                                    <tr>
                                        <td>{{$categoriesItem->id}}</td>
                                        <td>{{$categoriesItem->name}}</td>
                                        <td>
                                            @can('category-edit')
                                                <a href="{{route('categories.edit',['id'=>$categoriesItem->id])}}"
                                                   class="btn btn-default">Edit</a>
                                            @endcan
                                            @can('category-delete')
                                                <a href="{{route('categories.delete',['id'=>$categoriesItem->id])}}"
                                                   class="btn btn-danger">Delete</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$categories->links('pagination::bootstrap-4')}}

                        </div>

                        <!-- /.card-body -->
                    </div>

                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- content-wrapper -->

@endsection








