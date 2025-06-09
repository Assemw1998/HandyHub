
@extends('client_side.layouts.index')

@section('content')
    <main class="padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="section-title text-center">
                <h1 style="margin-top: 100px;">Your Orders</h1>
                <p class="section-description">Manage and track your service requests</p>
            </div>

            @forelse($orders as $order)
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="mb-0 text-primary">{{ $order->service->title ?? 'N/A' }}</h4>
                            <span class="badge
                            @if($order->status == App\Models\Order::STATUS_COMPLETED) bg-success
                            @elseif($order->status == App\Models\Order::STATUS_IN_PROGRESS) bg-warning
                            @elseif(in_array($order->status, [App\Models\Order::STATUS_CANCELLED_BY_CUSTOMER, App\Models\Order::STATUS_CANCELLED_BY_ADMIN, App\Models\Order::STATUS_CANCELLED_BY_HANDYMAN])) bg-danger
                            @else bg-secondary
                            @endif">
                            <span class="badge {{ $order->status_badge_class }}">
                                {{ $order->status_label }}
                            </span>
                        </span>
                        </div>

                        <ul class="list-unstyled mb-3">
                            <li><i class="bi bi-currency-dollar"></i> <strong>Price:</strong> {{ $order->service->price ?? 'N/A' }} JD</li>
                            <li><i class="bi bi-calendar-check"></i> <strong>Ordered on:</strong> {{ $order->created_at->format('F d, Y') }}</li>
                            <li><i class="bi bi-tag"></i> <strong>Category:</strong> {{ $order->service->category->name ?? 'N/A' }}</li>
                        </ul>

                        <div class="d-flex flex-wrap gap-2">
                            @if(!in_array($order->status, [App\Models\Order::STATUS_COMPLETED, App\Models\Order::STATUS_IN_PROGRESS,App\Models\Order::STATUS_CANCELLED_BY_ADMIN,App\Models\Order::STATUS_CANCELLED_BY_CUSTOMER,App\Models\Order::STATUS_CANCELLED_BY_HANDYMAN]))
                                <form action="{{ route('customer.profile.customer-order-cancel', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-x-circle"></i> Cancel Order
                                    </button>
                                </form>
                            @endif

                            @if($order->status == App\Models\Order::STATUS_COMPLETED && !$order->service->rates->where('customer_id', auth()->id())->count())
                                <form action="{{ route('customer.profile.customer-order-rate', $order->id) }}" method="POST" class="rating-form mt-3">
                                    @csrf
                                    <div class="rating">
                                        @for ($i = 5; $i >= 1; $i--)
                                            <input type="radio" id="star{{ $i }}-order{{ $order->id }}" name="rate" value="{{ $i }}" required />
                                            <label for="star{{ $i }}-order{{ $order->id }}" title="{{ $i }} stars">&#9733;</label>
                                        @endfor
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-warning mt-2">
                                        <i class="bi bi-star-fill"></i> Submit Rating
                                    </button>
                                </form>
                            @else
                                <span class="text-muted small"><i class="bi bi-check-circle"></i> Rated or Not Completed</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info text-center">You have no orders yet.</div>
            @endforelse
        </div>
    </main>

    <script type="text/javascript" src="{{ asset('custom/client_side/js/customer.js') }}"></script>
@endsection
