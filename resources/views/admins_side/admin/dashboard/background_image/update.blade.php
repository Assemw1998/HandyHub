@extends('admins_side.admin.layouts.dashboard')
@section('content')
<link rel="stylesheet" href={{ asset("custom/admins_side/css/backgroundImage.css") }} />
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }} #{{$backgroundImage->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.dashboard.background-image-index')}}">Background Images</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center p-3">
        <form action="{{ route('admin.dashboard.background-image-update',['id' => $backgroundImage->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Background Image Title</label>
                <input type="text" class="form-control" value="{{(old('name')? old('name'): $backgroundImage->background_image_title )}}" name="background_image_title" id="background_image_title" required>
                @if ($errors->has('background_image_title'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('background_image_title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Background Image Description</label>
                <textarea  class="form-control"  id="background_image_description" name="background_image_description" required>{{(old('name')? old('name'): $backgroundImage->background_image_description )}}</textarea>

                @if ($errors->has('background_image_description'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('background_image_description') }}</span>
                @endif
            </div>
            <label>Choose Background image</label>
            @if(!isset($backgroundImage->image_url))
            <div class="form-group">

                <input type="file" class="form-control" id="background_image" name="background_image" onchange="preview_image('background_image','#background_image_preview');" required>
            </div>
            <div id="background_image_preview" class="mb-3"></div>
            @else
            <div id="background_image_preview" class="mb-3">

                <div class="image-area">
                    <button type="button" data-id={{$backgroundImage->id}} class="close AClass rounded-lg image-delete-button">
                        <span>&times;</span>
                    </button>
                    <img width='200' height='150' class='rounded p-2' src="{{ asset($backgroundImage->image_url) }}">
                </div>
            </div>
            @endif
            <hr>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Update</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/js/backgroundImage.js")}}></script>
@endsection
