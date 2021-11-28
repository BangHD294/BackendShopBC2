@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('adminV2/plugins/select2/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Wrappert -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Users', 'key'=>'add'])
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
                            <form id="quickForm" action="{{route('users.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên </label>
                                        <input type="text"
                                               name="name"
                                               class="form-control "
                                               placeholder="Nhập tên"
                                               value="{{old('name')}}"
                                        >

                                    </div>
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="email"
                                               name="email"
                                               class="form-control "
                                               placeholder="Nhập tên email"
                                               value="{{old('email')}}"
                                        >

                                    </div>
                                    <div class="form-group">
                                        <label>Password </label>
                                        <input type="password" name="password"
                                               class="form-control "
                                               placeholder="Nhập Password"
                                        >

                                    </div>
                                    <div class="form-group">
                                        <label>Chọn vai trò </label>
                                        <select class="form-control  select2_init" name="role_id[]" id="" multiple>
                                            <option value=""></option>
                                            @foreach($dataRole as $roleItem)
                                                <option value="{{$roleItem->id}}">{{$roleItem->name}}</option>
                                            @endforeach
                                        </select>

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
@section('js')
    <script src="{{asset('adminV2/plugins/select2/js/select2.min.js')}}"></script>
    <script>
        $('.select2_init').select2({
            'placeholder': 'Chọn vai trò'
        })
    </script>

@endsection
























