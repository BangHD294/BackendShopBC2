@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('js')

    <script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/product/index/list.js')}}"></script>
@endsection
@section('content')
    <!-- Content Wrappert -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'Product', 'key'=>'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                            <div class="col-12"><a href="{{route('product.create')}}" class="btn btn-success float-right">Thêm mới</a></div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table ">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Hình ảnh</th>
                                    <th>Danh mục</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product as $productItem)
                                    <tr>
                                        <td>{{$productItem->id}}</td>
                                        <td>{{$productItem->name}}</td>
                                        <td>{{number_format($productItem->price)}}</td>
                                        <td><img style="width: 100px" src="{{$productItem->feature_image_path}}" alt=""></td>
                                        <td>{{optional($productItem->category)->name}}</td>
                                        <td>
{{--                                            <a href="" class="btn btn-default">Edit</a>--}}
{{--                                            <a href="" class="btn btn-danger">Delete</a>--}}
                                            <a href="{{route('product.edit',['id'=>$productItem->id])}}" class="btn btn-default">Edit</a>
                                            <a
                                                data-url="{{route('product.delete',['id'=>$productItem->id])}}"
                                                href=""
                                                class="btn btn-danger action-delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$product->links('pagination::bootstrap-4')}}

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection








