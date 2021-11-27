@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('../../adminV2/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('content')
    <!-- Content Wrappert -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Slider', 'key'=>'edit'])
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
                            <form id="quickForm" action="{{route('slider.update', ['id' => $slider->id])}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên Slider</label>
                                        <input type="text" name="name"
                                               class="form-control @error('name', 'post') is-invalid @enderror"
                                               placeholder="Nhập tên slider"
                                               value="{{$slider->name}}"
                                        >
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Mô tả Slider</label>
                                        <textarea id="about"
                                                  name="description"
                                                  placeholder="Nhập mô tả"
                                                  class="form-control my-editor @error('description', 'post') is-invalid @enderror" rows="12">
                                            {{$slider->description}}
                                        </textarea>
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file"
                                               name="image_path"
                                               class="form-control-file @error('image_path', 'post') is-invalid @enderror">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <img src="{{$slider->image_path}}" alt="">
                                            </div>
                                        </div>
                                        @error('image_path')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
    <script src="https://cdn.tiny.cloud/1/1dtvvmm1y7snmzyc7octk6rredwfyykamidbve2qd763kpfq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('../../adminV2/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>

@endsection
























