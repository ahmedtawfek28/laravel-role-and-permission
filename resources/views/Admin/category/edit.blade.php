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
                            <li class="breadcrumb-item"><a href="{{ route('Admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('Admin.category.index') }}">Category</a></li>
                            <li class="breadcrumb-item">Edit Category</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
      <div class=" modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">New category</h4>
        </div>
        <form action="{{ route('Admin.category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Title_Ar,Title_En,Images</h4>
                                <div class="form-group">
                                    <label for="title_ar">Title_Ar</label>
                                    <input type="text" class="form-control" name="title_ar" id="title_ar" value="{{ $category->title_ar }}">
                                </div>
                                <div class="form-group">
                                    <label for="title_en">Title_en</label>
                                    <input type="text" class="form-control" name="title_en" id="title_en" value="{{ $category->title_en }}">
                                </div>
                                <div class="form-group">
                                
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image" id="image" aria-describedby="fileHelp">
                                    </div>
                    
                            </div>
				<div class="details_ar">
                    <label for="details_ar">Details_Ar</label>
					<textarea id="mymce" name="details_ar" >{{ $category->details_ar }}</textarea>
					</div>
<br>
<br>
                    <div class="details_en">
                    <label for="details_en">Details_En</label>
					<textarea id="mymce" name="details_en" >{{ $category->details_en }}</textarea>
                    </div>
					</div>
                    </div>
					</div>
                  <div class="modal-footer">
                        <a href="{{ route('Admin.category.index') }}" class="btn btn-danger waves-effect">BACK</a>
                   
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
            </div>
        </form>
      </div>

    </div>
    
@endsection
            @section('js')
                {!! Html::script('BackEnd/assets/node_modules/tinymce/tinymce.min.js') !!}
                <script>
                    $(function() {

                        if ($("#mymce").length > 0) {
                            tinymce.init({
                                selector: "textarea#mymce",
                                theme: "modern",
                                height: 300,
                                plugins: [
                                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                                    "save table contextmenu directionality emoticons template paste textcolor"
                                ],
                                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

                            });
                        }
                    });
                </script>

@endsection
