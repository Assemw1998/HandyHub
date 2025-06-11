@extends('admins_side.admin.layouts.dashboard')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <link rel="stylesheet" href={{ asset("custom/admins_side/css/order.css") }} />
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-capitalize">{{ Request::segment(3) }} #{{$order->id}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('admin.dashboard.order-index')}}">Order</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="mt-3 content text-dark center">
            <div class="container m-5 p-5">
                @php
                    $stepStatuses = \App\Models\Order::getStepperStatuses();
                    $currentStatus = $order->status;
                    $stepKeys = array_keys($stepStatuses);
                @endphp

                <div class="d-flex justify-content-between align-items-center position-relative mb-4"
                     style="border-bottom: 2px solid #e9ecef;">
                    @foreach ($stepStatuses as $code => $label)
                        @php
                            $index = array_search($code, $stepKeys) + 1;
                            $isActive = $currentStatus === $code;
                            $isCompleted = array_search($currentStatus, $stepKeys) > array_search($code, $stepKeys);
                            $circleClass = $isActive ? 'bg-success text-white'
                                         : ($isCompleted ? 'bg-secondary text-white'
                                         : 'bg-light text-muted');
                            $textClass = $isActive ? 'text-success fw-bold' : 'text-muted';
                        @endphp

                        <div class="text-center flex-fill">
                            <div class="rounded-circle {{ $circleClass }} mx-auto mb-2"
                                 style="width: 30px; height: 30px; line-height: 30px;">
                                {{ $index }}
                            </div>
                            <div class="{{ $textClass }}" style="font-size: 14px;">{{ $label }}</div>
                        </div>
                    @endforeach
                </div>

                {{-- Step buttons --}}
                <form action="{{ route('admin.dashboard.order-update-status', $order) }}" method="POST" class="mb-4">
                    @csrf
                    @method('PATCH')
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($stepStatuses as $status => $label)
                            <button type="submit" name="status" value="{{ $status }}"
                                    class="btn {{ $currentStatus == $status ? 'btn-success' : 'btn-outline-secondary' }}">
                                {{ $label }}
                            </button>
                        @endforeach
                    </div>
                </form>

                {{-- Cancel buttons --}}
                <div class="d-flex gap-2">
                    <form action="{{ route('admin.dashboard.order-cancel', $order) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="cancel_by" value="admin">
                        <button type="submit" class="btn btn-danger">Cancel by Admin</button>
                    </form>

                    <form action="{{ route('admin.dashboard.order-cancel', $order) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="cancel_by" value="handyman">
                        <button type="submit" class="btn btn-danger">Cancel by Handyman</button>
                    </form>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Service Name</label>
                        <div>{{$order->service->title}}</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Category Name</label>
                        <div>{{$order->service->category->name}}</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Customer Name - ID</label>
                        <div>{{$order->customer->full_name.' - '.$order->customer->id}}</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Full Address</label>
                        <div>{{$order->full_address??'-'}}</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Note / Description</label>
                        <div>{{$order->note_description??'-'}}</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Status</label>
                        <div><span class="badge {{ $order->status_badge_class }}">{{ $order->status_label }}</span>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Created At</label>
                        <div>{{$order->created_at}}</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Updated At</label>
                        <div>{{$order->updated_at}}</div>
                    </div>
                </li>
            </ul>
        </section>
    </div>
    <script type="text/javascript" src={{asset("custom/admins_side/js/category.js")}}></script>
@endsection
