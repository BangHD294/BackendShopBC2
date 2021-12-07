@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{asset('../../adminV2/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/roles/add.css')}}">

@endsection
@section('js')
    <script src="{{asset('admins/roles/add.js')}}"></script>
@endsection
@section('content')
    <!-- Content Wrappert -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Roles', 'key'=>'Edit'])
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
                            <form id="quickForm" action="{{route('roles.update', ['id'=>$role->id])}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên vai trò</label>
                                        <input type="text" name="name"
                                               class="form-control "
                                               placeholder="Nhập tên vai trò"
                                               value="{{$role->name}}"
                                        >

                                    </div>

                                    <div class="form-group">
                                        <label>Mô tả vai trò</label>
                                        <textarea id="about"
                                                  name="display_name" placeholder="Nhập mô tả" class="form-control my-editor " rows="6">{{$role->display_name}}</textarea>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <label>
                                        <input type="checkbox" class="checkall">
                                        checkall
                                    </label>
                                </div>
                                <!-- /.card-body -->
                                @foreach($permissionsParent as $key=>$value)
                                    <div class="card card-checked bg-light mb-3 col-md-12">
                                        <div class="card-header backgrout-color">
                                            <label for="">
                                                <input type="checkbox" value="" class="checkbox_wrapper">
                                            </label>
                                            Module {{$value->name}}
                                        </div>

                                        <div class="row">
                                            @foreach($value->permissionChildrent as $key=>$valueChildrent)
                                                <div class="card-body col-md-3">
                                                    <h5 class="card-title">
                                                        <label for="">
                                                            <input type="checkbox"
                                                                   {{$pemissionsChecked->contains('id',$valueChildrent->id) ? 'checked' : ''}}
                                                                   class="checkbox_childrent"
                                                                   name="permission_id[]"
                                                                   value="{{$valueChildrent->id}}">
                                                        </label>
                                                        {{$valueChildrent->name}}
                                                    </h5>
                                                </div>
                                            @endforeach

                                        </div>


                                    </div>
                                @endforeach

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
    <script src="https://cdn.tiny.cloud/1/1dtvvmm1y7snmzyc7octk6rredwfyykamidbve2qd763kpfq/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('../../adminV2/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>

@endsection
























