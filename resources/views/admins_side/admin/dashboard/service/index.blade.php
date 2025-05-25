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
                <a href="{{ route('admin.dashboard.service-create-view')}}" class="btn btn-outline-primary">Add New
                    service</a>
            </div>
            <div class="row col-12 text-center">
                <table id="service_table" class="display">
                    <thead>
                    <tr>
                        <th>#</th>
                        <td>Service image</td>
                        <th>Category</th>
                        <th>Handy Men</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{$service->id}}</td>
                            <td><img width='200' height='150' class='rounded p-2'
                                     src="{{ asset($service->image_url) }}"></td>
                            <td>{{$service->category->name??null}}</td>
                            <td>{{$service->handyMan->full_name??null}}</td>
                            <td>{{$service->title}}</td>
                            <td>{{$service->description}}</td>
                            <td>{{$service->price}}</td>
                            <td>{{$service->status}}</td>
                            <td>{{$service->AdminCreatedBy->full_name}}</td>
                            <td>{{$service->AdminUpdatedBy->full_name}}</td>
                            <td>{{$service->created_at}}</td>
                            <td>{{$service->updated_at}}</td>
                            <td>
                                <a href="{{ route('admin.dashboard.service-view',['id' => $service->id])}}"
                                   class="btn btn-outline-info  view d-block m-2" data-id=""><i
                                        class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <td>Service image</td>
                        <th>Category</th>
                        <th>Handy Men</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>View</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </section>
    </div>
    <script type="text/javascript" src={{asset("custom/admins_side/js/service.js")}}></script>
@endsection
