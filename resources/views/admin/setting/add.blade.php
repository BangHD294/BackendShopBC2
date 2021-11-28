@extends('layouts.admin')

@section('title')
    <title>Setting</title>
@endsection
@section('css')
    <link rel="stylesheet"
          href="{{asset('../../adminV2/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
    <!-- Content Wrappert -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Setting', 'key'=>'add'])
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
                            <form id="quickForm" action="{{route('setting.store') . '?type='. request()->type }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Config key</label>
                                        <input type="text"
                                               name="config_key"
                                               class="form-control @error('config_key', 'post') is-invalid @enderror"
                                               placeholder="Nhập config key">
                                        @error('config_key')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @if(request()->type==='Text')
                                        <div class="form-group">
                                            <label>Config Value</label>
                                            <input type="text"
                                                   name="config_value"
                                                   class="form-control @error('config_value', 'post') is-invalid @enderror"
                                                   placeholder="Nhập config value">
                                            @error('config_value')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @elseif(request()->type==='Textarea')
                                        <div class="form-group">
                                            <label>Config Value</label>
                                            <textarea id="about" name="config_value"
                                                      class="form-control my-editor @error('config_value', 'post') is-invalid @enderror"
                                                      rows="12">
                                            </textarea>
                                            @error('config_value')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    @endif
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
    <script src="https://cdn.tiny.cloud/1/1dtvvmm1y7snmzyc7octk6rredwfyykamidbve2qd763kpfq/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('../../adminV2/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>

@endsection























