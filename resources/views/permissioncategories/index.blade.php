@extends('layouts.BackEnd.master')

@section('title','Management Permissioncategory')

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
                            <h3 class="text-themecolor">Permissioncategory</h3>
                            <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('permissioncategories.index') }}">Management Permissioncategories</a></li>
                            </ol>
                        </div>
                        <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                    @can('permission-create')
                                        <a class="btn btn-info" href="{{ route('permissioncategories.create') }}"> Create New PermissionCategory</a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        <div class="">
                            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
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
                                                                <th>No</th>
                                                                <th>Name</th>
                                                                <th width="280px">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            @foreach ($permissioncategories as $key => $permissioncategory)
                                                            <tr>
                                                                    <td>{{ ++$i }}</td>
                                                                    <td>{{ $permissioncategory->name }}</td>
                                                                    <td>
                                                                        <form action="{{ route('permissioncategories.destroy',$permissioncategory->id) }}" method="POST">
                                                                            <a class="btn btn-info" href="{{ route('permissioncategories.show',$permissioncategory->id) }}">Show</a>
                                                                            @can('permissioncategory-edit')
                                                                            <a class="btn btn-primary" href="{{ route('permissioncategories.edit',$permissioncategory->id) }}">Edit</a>
                                                                            @endcan
                                                        
                                                        
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            @can('permissioncategory-delete')
                                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                                            @endcan
                                                                        </form>
                                                                    </td>
                                                            </tr>
                                                            @endforeach
                                                    </tbody>
                                                    <thead>
                                                            <tr>
                                                                    <th>No</th>
                                                                    <th>Name</th>
                                                                    <th width="280px">Action</th>
                                                            </tr>
                                                        </thead>
        
    </table>

</div>
</div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->




@endsection