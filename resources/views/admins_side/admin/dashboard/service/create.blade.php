@extends('admins_side.admin.layouts.dashboard')
@section('content')
    <?php
//    if ($errors){
//        dd($errors);
//    }


    ?>
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
                   <a href="{{ route('admin.dashboard.service-index')}}">Services</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center p-3">
        <form action="{{ route('admin.dashboard.service-create')}}" method="POST"  autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div id="service_image_preview" class="mb-3"></div>
            <div class="form-group">
                <label>Choose Service image</label>
                <input type="file" class="form-control" id="service_image" name="service_image" onchange="preview_image('service_image','#service_image_preview');" required>
            </div>
            <div class="form-group">
                <label for="brand_id">Categories</label>
                <select class="form-control" name="category_id" id="category_id" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ (old("category_id") == $category->id ? "selected":"") }}>{{$category->id.' '.$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="handy_man_id">Handy Men</label>
                <select class="form-control" name="handy_man_id" id="handy_man_id" required>
                    <option value="">Select Handy Man</option>
                    @foreach($handyMen as $handyman)
                        <option value="{{$handyman->id}}" {{ (old("handy_man_id") == $handyman->id ? "selected":"") }}>{{$handyman->id.' '.$handyman->full_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" value="{{old('title')}}" name="title" id="title" required>
                @if ($errors->has('title'))
                    <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" required>{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number"
                       step="0.01"
                       class="form-control"
                       value="{{ old('price') !== null ? number_format((float) old('price'), 2, '.', '') : '' }}"
                       name="price"
                       id="price"
                       required>
                @if ($errors->has('price'))
                    <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('price') }}</span>
                @endif
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Submit</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/js/service.js")}}></script>
@endsection
