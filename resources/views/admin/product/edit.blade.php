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
    @include('partials.content-header',['name'=>'Product', 'key'=>'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-green">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
                            </div>
                            <form id="quickForm" action="{{route('product.update',['id' =>$product->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label >Tên sản phẩm</label>
                                        <input type="text"
                                               name="name"
                                               class="form-control"
                                               placeholder="Tên sản phẩm"
                                               value="{{$product->name}}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label >Giá sản phẩm</label>
                                        <input type="text"
                                               name="price"
                                               class="form-control"
                                               placeholder="Nhập giá sản phẩm"
                                               value="{{$product->price}}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label >Ảnh đại diện</label>
                                        <input type="file"
                                               name="feature_image_path"
                                               class="form-control-file">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <img style="width: 10%" src="{{$product->feature_image_path}}" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label >Ảnh chi tiết</label>
                                        <input type="file"
                                               multiple
                                               name="image_path[]"
                                               class="form-control-file">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                @foreach($product->productImages as $productImageItem)
                                                <div class="col-sm-3">
                                                    <img style="width: 50%" src="{{$productImageItem->image_path}}" alt="">
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Chọn danh mục </label>
                                        <select class="form-control select2 select_product" style="width: 100%;"
                                                name="category_id"
                                        >
                                            <option value="0">Chọn danh mục</option>
                                            {!! $htmlOption !!}
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Nhập tag cho sản phẩm</label>
                                        <select name="tags[]" class="form-control tag_select_choose" multiple="multiple">
                                            @foreach($product->tags as $tagItem)
                                            <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Nhập nội dung</label>
                                        <textarea id="about" name="contents" class="form-control my-editor " rows="12">
                                           {{$product->content}}
                                        </textarea>
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























