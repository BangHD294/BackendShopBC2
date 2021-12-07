@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <!-- Content Wrappert -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Permission', 'key'=>'add'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-green">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="{{route('permissions.store')}}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Chọn tên module</label>
                                        <select class="form-control select2" style="width: 100%;"
                                                name="module_parent"
                                        >
                                            <option value="">Chọn tên module</option>
                                            @foreach(config('permissions.table_module') as $tableItem)
                                                <option value="{{$tableItem}}">{{$tableItem}}</option>
                                            @endforeach
                                            {{--                                            {!! $optionSelect !!}--}}
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            @foreach(config('permissions.module_childrent') as $tableItemchildrent)

                                                <div class="col-md-3">
                                                    <label for="">
                                                        <input type="checkbox" value="{{$tableItemchildrent}}" name="module_childrent[]">
                                                        {{$tableItemchildrent}}
                                                    </label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- content-wrapper -->

@endsection
























