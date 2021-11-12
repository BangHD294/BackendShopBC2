@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <!-- Content Wrappert -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'Dashboard', 'key'=>'Home'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    Trang chu
{{--                    <div class="card col-12">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">DataTable with default features</h3>--}}
{{--                            <div class="col-12"><a href="{{route('categories.create')}}" class="btn btn-success float-right">Thêm mới</a></div>--}}
{{--                        </div>--}}

{{--                        <!-- /.card-header -->--}}
{{--                        <div class="card-body">--}}
{{--                            <table id="example1" class="table table-bordered table-striped">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>Rendering engine</th>--}}
{{--                                    <th>Browser</th>--}}
{{--                                    <th>Platform(s)</th>--}}
{{--                                    <th>Engine version</th>--}}
{{--                                    <th>CSS grade</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td>Trident</td>--}}
{{--                                    <td>Internet--}}
{{--                                        Explorer 4.0--}}
{{--                                    </td>--}}
{{--                                    <td>Win 95+</td>--}}
{{--                                    <td> 4</td>--}}
{{--                                    <td>X</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>Trident</td>--}}
{{--                                    <td>Internet--}}
{{--                                        Explorer 5.0--}}
{{--                                    </td>--}}
{{--                                    <td>Win 95+</td>--}}
{{--                                    <td>5</td>--}}
{{--                                    <td>C</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>Trident</td>--}}
{{--                                    <td>Internet--}}
{{--                                        Explorer 5.5--}}
{{--                                    </td>--}}
{{--                                    <td>Win 95+</td>--}}
{{--                                    <td>5.5</td>--}}
{{--                                    <td>A</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>Trident</td>--}}
{{--                                    <td>Internet--}}
{{--                                        Explorer 6--}}
{{--                                    </td>--}}
{{--                                    <td>Win 98+</td>--}}
{{--                                    <td>6</td>--}}
{{--                                    <td>A</td>--}}
{{--                                </tr>--}}

{{--                                </tbody>--}}

{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-body -->--}}
{{--                    </div>--}}

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- content-wrapper -->

@endsection
























{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 bg-white border-b border-gray-200">--}}
{{--                    You're logged in!--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}
{{--    <!DOCTYPE html>--}}
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
