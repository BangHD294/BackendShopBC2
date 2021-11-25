@extends('layouts.admin')

@section('title')
    <title>Add Product</title>
@endsection

@section('css')
    /*<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />*/
{{--    <link rel="stylesheet" href="{{asset('../../adminV2/plugins/select2/css/select2.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('../../adminV2/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="content-wrapper">
    @include('partials.content-header',['name'=>'Product', 'key'=>'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-green">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
                            </div>
                            <form id="quickForm" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label >Tên sản phẩm</label>
                                        <input type="text"
                                               name="name"
                                               class="form-control @error('name', 'post') is-invalid @enderror"
                                               placeholder="Tên sản phẩm">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label >Giá sản phẩm</label>
                                        <input type="text"
                                               name="price"
                                               class="form-control @error('price', 'post') is-invalid @enderror"
                                               placeholder="Nhập giá sản phẩm">
                                        @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label >Ảnh đại diện</label>
                                        <input type="file"
                                               name="feature_image_path"
                                               class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label >Ảnh chi tiết</label>
                                        <input type="file"
                                               multiple
                                               name="image_path[]"
                                               class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label>Chọn danh mục </label>
                                        <select class="form-control select2 select_product @error('category_id', 'post') is-invalid @enderror" style="width: 100%;"
                                                name="category_id"
                                        >
                                            <option value="0">Chọn danh mục</option>
                                            {!! $htmlOption !!}
                                        </select>
                                        @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="">Nhập tag cho sản phẩm</label>
                                        <select name="tags[]" class="form-control tag_select_choose" multiple="multiple">

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Nhập nội dung</label>
                                        <textarea id="about" name="contents" class="form-control my-editor @error('contents', 'post') is-invalid @enderror" rows="12">
                                            {{old('contents')}}
                                        </textarea>
                                        @error('contents')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="https://cdn.tiny.cloud/1/1dtvvmm1y7snmzyc7octk6rredwfyykamidbve2qd763kpfq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('../../adminV2/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>

@endsection























