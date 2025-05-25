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
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center">
        <div class="row col-12 text-right mb-4">
            <a href="{{ route('admin.dashboard.background-image-create-view')}}" class="btn btn-outline-primary">Add New Background Image</a>
        </div>
        <div class="row col-12 text-center">
            <table id="background_image_table" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Background Image Title</th>
                        <th>Background Image Description</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($backgroundImages as $backgroundImage)
                    <tr>
                        <td>{{$backgroundImage->id}}</td>
                        <td><img width='200' height='150' class='rounded p-2' src="{{ asset($backgroundImage->image_url) }}"></td>
                        <td>{{$backgroundImage->background_image_title}}</td>
                        <td>{{$backgroundImage->background_image_description}}</td>
                        <td>{{$backgroundImage->created_at}}</td>
                        <td>{{$backgroundImage->updated_at}}</td>
                        <td>
                            <a href="{{ route('admin.dashboard.background-image-view',['id' => $backgroundImage->id])}}" class="btn btn-outline-info  view d-block m-2" data-id=""><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Background Image Title</th>
                        <th>Background Image Description</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>View</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/js/backgroundImage.js")}}></script>
@endsection
