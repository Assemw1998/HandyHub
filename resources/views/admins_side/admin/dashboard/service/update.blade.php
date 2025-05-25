@extends('admins_side.admin.layouts.dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }}  #{{$service->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.dashboard.service-index')}}">Service</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center p-3">
        <form action="{{ route('admin.dashboard.service-update',['id' => $service->id])}}" method="POST"  autocomplete="off" enctype="multipart/form-data">
            @csrf
            <label>Profile image</label>
            @if(!isset($service->image_url))
                <div id="service_image_preview" class="mb-3"></div>
                <div class="form-group">

                    <input type="file" class="form-control" id="service_image" name="service_image" onchange="preview_image('service_image','#service_image_preview');" required>
                </div>
            @else
                <div id="service_image_preview" class="mb-3">

                    <div class="image-area">
                        <button type="button" data-id={{$service->id}} class="close AClass rounded-lg image-delete-button">
                        <span>&times;</span>
                        </button>
                        <img width='200' height='150' class='rounded p-2' src="{{ asset($service->image_url) }}">
                    </div>
                </div>
            @endif
            <div class="form-group">
                <label for="category_id">Categories</label>
                <select class="form-control" name="category_id" id="category_id" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        @if(old("category_id"))
                            <option value="{{$category->id}}" {{ (old("category_id") == $category->id ? "selected":"") }}>{{$category->id.' '.$category->name}}</option>
                        @else
                            <option value="{{$category->id}}" {{ ( $service->category_id == $category->id ? "selected":"") }}>{{$category->id.' '.$category->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="handy_man_id">Handymen</label>
                <select class="form-control" name="handy_man_id" id="handy_man_id" required>
                    <option value="">Select HandyMan</option>
                    @foreach($handyMen as $handyMan)
                        @if(old("handy_man_id"))
                            <option value="{{$handyMan->id}}" {{ (old("handy_man_id") == $handyMan->id ? "selected":"") }}>{{$handyMan->id.' '.$handyMan->full_name}}</option>
                        @else
                            <option value="{{$handyMan->id}}" {{ ( $service->handy_man_id == $handyMan->id ? "selected":"") }}>{{$handyMan->id.' '.$handyMan->full_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" value="{{(old('title')? old('title'): $service->title )}}" name="title" id="title" required>
                @if ($errors->has('full_name'))
                    <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description"  id="description" required>{{(old('description')? old('description'): $service->description )}}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number"
                       step="0.01"
                       class="form-control"
                       value="{{ old('price') !== null ? number_format((float) old('price'), 2, '.', '') : number_format((float) $service->price, 2, '.', '') }}"
                       name="price"
                       id="price"
                       required>
                @if ($errors->has('price'))
                    <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('price') }}</span>
                @endif
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Update</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/js/service.js")}}></script>
@endsection
