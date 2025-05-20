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
            <a href="{{ route('admin.dashboard.handyman-create-view')}}" class="btn btn-outline-primary">Add New HandyMan</a>
        </div>
        <div class="row col-12 text-center">
            <table id="handy_man_table" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($handyMen as $handyMan)
                    <tr>
                        <td>{{$handyMan->id}}</td>
                        <td>{{$handyMan->full_name}}</td>
                        <td>{{$handyMan->email}}</td>
                        <td>{{$handyMan->phone_number}}</td>
                        <td>{{$handyMan->address}}</td>
                        <td><span class="
                        @if($handyMan->status) bg-success
                        @else bg-danger
                        @endif p-1">{{$handyMan->status_label}}</span></td>
                        <td>{{$handyMan->adminCreatedBy->full_name}}</td>
                        <td>{{$handyMan->adminUpdatedBy->full_name}}</td>
                        <td>
                            <a href="{{ route('admin.dashboard.handyman-view',['id' => $handyMan->id])}}" class="btn btn-outline-info  view d-block m-2" data-id=""><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>View</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/js/handy-man.js")}}></script>
@endsection
