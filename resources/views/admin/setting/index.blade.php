@extends('layouts.admin')

@section('title')
    <title>Setting</title>
@endsection

@section('js')
    <script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/actionDelete.js')}}"></script>
@endsection
@section('content')
    <!-- Content Wrappert -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'Setting', 'key'=>'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-12">
                        <div class="card-header">

                            <div class="col-12">
                                <div class=" btn-group float-right">
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Add Setting
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('setting.create').'?type=Text'}}">Text</a>
                                        <a class="dropdown-item" href="{{route('setting.create').'?type=Textarea'}}">Text Area</a>

                                    </div>
                                </div>
{{--                                <a href="{{route('setting.create')}}" class="btn btn-success float-right">Thêm mới</a>--}}
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table ">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Config Key</th>
                                    <th>Config Value</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dataSetting as $dataSettingItem)
                                    <tr>
                                        <td>{{$dataSettingItem->id}}</td>
                                        <td>{{$dataSettingItem->config_key}}</td>
                                        <td>{{$dataSettingItem->config_value}}</td>
                                        <td>
                                            <a href="{{route('setting.edit',['id'=>$dataSettingItem->id]) . '?type=' .$dataSettingItem->type}}" class="btn btn-default">Edit</a>
                                            <a
                                                data-url="{{route('setting.delete',['id'=>$dataSettingItem->id])}}"
                                                href=""
                                                class="btn btn-danger action-delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$dataSetting->links('pagination::bootstrap-4')}}

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection








