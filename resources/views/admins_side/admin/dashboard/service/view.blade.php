@extends('admins_side.admin.layouts.dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }} #{{$service->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.dashboard.service-index')}}">Services</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center">
    <div class="col-12 col-lg-6 p-0 mb-2">
            <a class="btn btn-outline-success  col-lg-3 col-12 update mb-2" href="{{ route('admin.dashboard.service-update-view',['id' => $service->id])}}" data-id="">Update</a>
            <a class="btn btn-outline-danger col-lg-3 col-12 delete mb-2" data-id="{{$service->id}}">Delete</a>
             <a class="btn btn-outline-info col-lg-3 col-12 mb-2 activate-deactivate" data-id="{{$service->id}}">{{($service->status?'Deactivate':'Activate')}}</a>
    </div>
        <li class="list-group-item">
            <div class="form-group">
                <label class=" d-block">Service image</label>
                <img width='200' height='150' class='rounded p-2' src="{{ asset($service->image_url) }}">
            </div>
        </li>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="form-group">
                    <label>Category</label>
                    <div>{{$service->category->name??null}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Handy Men</label>
                    <div>{{$service->handyMan->full_name??null}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Title</label>
                    <div>{{$service->title??null}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Description</label>
                    <div>{{$service->description??null}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Price</label>
                    <div>{{$service->price??null}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Created By</label>
                    <div>{{$service->adminCreatedBy->full_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Updated By</label>
                    <div>{{$service->adminCreatedBy->full_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Created At</label>
                    <div>{{$service->created_at}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Updated At</label>
                    <div>{{$service->updated_at}}</div>
                </div>
            </li>
        </ul>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/js/service.js")}}></script>
@endsection
