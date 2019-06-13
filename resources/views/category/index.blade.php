@extends('layouts.BackEnd.master')

@section('title','Management Categories')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Category</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Management Category</a></li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            @can('category-create')
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i
                                        class="fa fa-plus-circle"></i> Create New
                                </button>

                            @endcan
                        </div>
                    </div>
                </div>
                <div class="">
                    <button
                        class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10">
                        <i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-striped">

                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title</th>
                                        <th>Slug</th>

                                        <th>Image</th>
                                        <th>created_AT</th>

                                        <th>Action</th>
                                    </tr>

                                    </thead>

                                    <tbody>

                                    @foreach($categories as $Category)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{$Category->title}}</td>
                                            <td>{{$Category->slug}}</td>

                                            <td>{{substr($Category->image,0,25)}}
                                                @if(strlen($Category->image)>25)
                                                    [..]
                                                @endif


                                            </td>
                                            <td>{{$Category->updated_at}}</td>
                                            <td>
                                                @can('category-edit')
                                                    <button class="btn btn-info" data-mytitle="{{$Category->title}}"
                                                            data-myimage="{{$Category->image}}"
                                                            data-myid={{$Category->id}} data-toggle="modal"
                                                            data-target="#edit">Edit
                                                    </button>
                                                @endcan
                                                @can('category-delete')

                                                    <button class="btn btn-danger"
                                                            data-myid={{$Category->id}} data-toggle="modal"
                                                            data-target="#delete">Delete
                                                    </button>
                                                @endcan  </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Image</th>
                                        <th>created_AT</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('js')
    {!! Html::script('BackEnd/assets/node_modules/bootstrap/js/popper.min.js') !!}
@endsection
@section('model')
    @include('category.model')
@endsection
@section('ajax')
    @include('category.ajax')
@endsection
