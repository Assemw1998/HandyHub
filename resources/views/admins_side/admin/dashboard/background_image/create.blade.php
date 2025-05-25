@extends('admins_side.admin.layouts.dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.dashboard.background-image-index')}}">Background Images</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center p-3">
        <form action="{{ route('admin.dashboard.background-image-create')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Background Image Title</label>
                <input type="text" class="form-control" value="{{old('background_image_title')}}" name="background_image_title" id="background_image_title" required>
                @if ($errors->has('background_image_title'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('background_image_title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Background Image Description</label>
                <textarea  class="form-control"  id="background_image_description" name="background_image_description" required>{{old('background_image_description')}}</textarea>

                @if ($errors->has('background_image_description'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('background_image_description') }}</span>
                @endif
            </div>


            <div class="form-group">
                <label>Choose Background image</label>
                <input type="file" class="form-control" id="background_image" name="background_image" onchange="preview_image('background_image','#background_image_preview');" required>
            </div>
            <div id="background_image_preview" class="mb-3"></div>
            <hr>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Submit</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/js/backgroundImage.js")}}></script>
@endsection
