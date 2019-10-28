@extends('layouts.BackEnd.master')

@section('title','Management Category')

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
                        <li class="breadcrumb-item"><a href="{{ route('Admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('Admin.category.index') }}">Management Category</a></li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            @can('category-create')
                                <a class="btn btn-info" href="{{ route('Admin.category.create') }}"> Create New Category</a>
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
                                        <th>Title_ar</th>
                                        <th>Title_en</th>
                                        <th>Slug</th>
                                        <th>SubCategory Count</th>
                                        <th>created_AT</th>
                                        <th>Action</th>
                                    </tr>

                                    </thead>

                                    <tbody>

                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{$category->title_ar}}</td>
                                            <td>{{$category->title_en}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>{{$category->subcategories->count()}}</td>

                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $category->updated_at)->diffForHumans() }}</td>
                                            <td>


                                                @can('category-showdetails')
                                                    <button class="btn btn-success waves-effect"
                                                            data-mytitle_ar="{{$category->title_ar}}"
                                                            data-mytitle_en="{{$category->title_en}}"
                                                            data-subcategorytitle_ar="@foreach($category->subcategories as $subcategory)|{{$subcategory->title_ar}}|@endforeach"
                                                            data-subcategorytitle_en="@foreach($category->subcategories as $subcategory)|{{$subcategory->title_en}}|@endforeach"
                                                            data-myimage="{{$category->image}}"
                                                            data-mydetails_ar="{!!$category->details_ar!!}"
                                                            data-mydetails_en="{!!$category->details_en!!}"
                                                            data-myid={{$category->id}} data-toggle="modal"
                                                            data-target="#show"><i class="fa fa-eye"></i></button>
                                                @endcan
                                                @can('category-edit')
                                                    <a href="{{ route('Admin.category.edit',$category->id) }}"
                                                       class="btn btn-info waves-effect">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('category-delete')

                                                    <button class="btn btn-danger"
                                                            data-myid={{$category->id}} data-toggle="modal"
                                                            data-target="#delete"><i class="fa fa-trash"></i></button>
                                                @endcan

                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title_ar</th>
                                        <th>Title_en</th>
                                        <th>Slug</th>
                                        <th>SubCategory Count</th>
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
            @section('model')
                @include('Admin.category.model')
            @endsection
            @section('ajax')
                <script>

                    $('#show').on('show.bs.modal', function (event) {

                        var button = $(event.relatedTarget)
                        var title_ar = button.data('mytitle_ar')
                        var title_en = button.data('mytitle_en')
                        var subcategorytitle_ar = button.data('subcategorytitle_ar')
                        var subcategorytitle_en = button.data('subcategorytitle_en')
                        var image = button.data('myimage')
                        var details_ar = button.data('mydetails_ar')
                        var details_en = button.data('mydetails_en')
                        var id = button.data('myid')
                        var modal = $(this)
                        var url='{{ env('APP_URL') }}'
                        document.getElementById('imageBox').src = url+"/app/public/category/" + image;
                        document.getElementById('imageBox0').src = url+"/app/public/category/" + image;
                        modal.find('.modal-body #title_ar').val(title_ar);
                        modal.find('.modal-body #title_en').val(title_en);
                        modal.find('.modal-body #subcategorytitle_ar').val(subcategorytitle_ar);
                        modal.find('.modal-body #subcategorytitle_en').val(subcategorytitle_en);
                        modal.find('.modal-body #image').val(image);
                        modal.find('.modal-body #details_ar').val(details_ar);
                        modal.find('.modal-body #details_en').val(details_en);
                        modal.find('.modal-body #id').val(id);
                    })

                    $('#delete').on('show.bs.modal', function (event) {

                        var button = $(event.relatedTarget)
                        var id = button.data('myid')
                        var modal = $(this)

                        modal.find('.modal-body #id').val(id);
                    })


                </script>
@endsection
