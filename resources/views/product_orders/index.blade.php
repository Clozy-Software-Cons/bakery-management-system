@extends('layouts.app')

@section('content')
    <style>
        .nav-link:not(.active) {
            background-color: transparent !important
        }

        .nav-link.active {
            color: rgb(93, 160, 253) !important;
        }
    </style>
    <div class="row">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ session('success') }}
            </div>
        @endif

        <div class="col-12">
            <h5 class="mb-4">Order List</h5>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('product_orders.index') }}" method="post">
                                @csrf
                                <ul class="nav nav-tabs">
                                    @foreach ($status as $key => $stat)
                                        <li class="nav-item">
                                            <button type="submit" value="{{ $key }}" name="status"
                                                class="nav-link @if (@$search['status'] == $key) active @elseif (@$search['status'] == null && $key == 'pending') active @endif">
                                                {{ $stat }}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Order ID</th>
                                            <th>Customer Name</th>
                                            <th>Phone</th>
                                            <th>Quantity</th>
                                            <th>Cake Type</th>
                                            <th>Order Date</th>
                                            <th>Dispatch Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($product_orders) > 0)
                                            @foreach ($product_orders as $order_key => $order)
                                                <tr class="text-nowrap">
                                                    <td>{{ $product_orders->firstItem() + $order_key }}</td>
                                                    <td>{{ $order->cust_id }}</td>
                                                    <td>{{ $order->cust_name }}</td>
                                                    <td>{{ $order->cust_hpn }}</td>
                                                    <td>{{ $order->quantity }}</td>
                                                    <td>{{ $order->type }}</td>
                                                    <td>{{ $order->order_datetime }}</td>
                                                    <td>{{ $order->dispatch_datetime ?? '-' }}</td>
                                                    <td class="text-center" style="width: 200px">
                                                        <a href="{{ route('product_orders.show', $order->cust_id) }}"
                                                            class="btn btn-sm btn-info d-inline-block">Info</a>
                                                        <a href="{{ route('product_orders.edit', $order->cust_id) }}"
                                                            class="btn btn-sm btn-warning d-inline-block">Edit</a>
                                                            <form class="d-inline-block" action="{{ route('products_orders.delete') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $order->cust_id }}">
                                                                <button type="submit" class="btn btn-sm btn-danger d-inline-block"
                                                                    id="btn_delete_product_order">Delete</button>
                                                            </form>
                                                        </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="9" class="text-center">No record found.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div>
                                    {!! $product_orders->links('pagination::bootstrap-4') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on("click", "#btn_delete_product_order", function(e) {
            e.preventDefault();

            if (confirm('Confirm to delete this product order?')) {
                $(this).closest('form').submit();
            }
        });
    </script>
@endsection
