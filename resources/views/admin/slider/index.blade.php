@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <!-- Content Wrappert -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'Slider', 'key'=>'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                            <div class="col-12"><a href="{{route('slider.create')}}" class="btn btn-success float-right">Thêm mới</a></div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table ">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Tên Slider</th>
                                    <th>Description</th>
                                    <th>Hình ảnh</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $slidersItem)
                                    <tr>
                                        <td>{{$slidersItem->id}}</td>
                                        <td>{{$slidersItem->name}}</td>
                                        <td>{{$slidersItem->description}}</td>
                                        <td><img src="{{$slidersItem->image_path}}" alt=""></td>
                                        <td>

                                            <a href="{{route('slider.edit',['id'=>$slidersItem->id])}}" class="btn btn-default">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
{{--                                            <a href="{{route('menus.delete',['id'=>$dataMenuItem->id])}}" class="btn btn-danger">Delete</a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$sliders->links('pagination::bootstrap-4')}}

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection








