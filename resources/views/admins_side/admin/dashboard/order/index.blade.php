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
        <div class="row col-12 text-center">
            <table id="order_table" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Service Name</th>
                        <th>Category Name</th>
                        <th>Customer Name -ID</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                            <td>{{$order->id}}</td>
                            <td>{{$order->service->title}}</td>
                            <td>{{$order->service->category->name}}</td>
                            <td>{{$order->customer->full_name.' - '.$order->customer->id}}</td>
                            <td><span class="badge {{ $order->status_badge_class }}">{{ $order->status_label }}</span></td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->updated_at}}</td>
                            <td>
                                <a href="{{ route('admin.dashboard.order-view',['id' => $order->id])}}" class="btn btn-outline-info  view d-block m-2" data-id=""><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Service Name</th>
                        <th>Category Name</th>
                        <th>Customer Name</th>
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
<script type="text/javascript" src={{asset("custom/admins_side/js/order.js")}}></script>
@endsection
