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
            <table id="contact_us_table" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contactsUs as $contactUs)
                        <tr>
                            <td>{{$contactUs->id}}</td>
                            <td>{{$contactUs->full_name}}</td>
                            <td>{{$contactUs->email}}</td>
                            <td>{{$contactUs->subject}}</td>
                            <td>{{$contactUs->message}}</td>
                            <td>{{$contactUs->created_at}}</td>
                            <td>{{$contactUs->updated_at}}</td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/js/contact_us.js")}}></script>
@endsection
