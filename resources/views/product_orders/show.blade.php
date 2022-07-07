@extends('layouts.app')

@section('content')
    <h5 class="mb-4">Customer Order Info</h5>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-lg-6 col-12">
                            <label for="">Customer Name:</label>
                            <div>{{ $order->cust_name }}</div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="">Customer Phone:</label>
                            <div>{{ $order->cust_hpn }}</div>
                        </div>
                    </div>
                    <div class="row border-top mb-2">
                        <div class="col-lg-6 col-12 mt-2">
                            <label for="">Cake Type: </label>
                            <div>{{ $order->type }}</div>
                        </div>
                        <div class="col-lg-6 col-12 mt-2">
                            <label for="">Cake Quantity: </label>
                            <div>{{ $order->quantity }}</div>
                        </div>
                        <div class="col-lg-6 col-12 mt-2">
                            <label for="">Cake Flavour: </label>
                            <div>{{ $order->flavour }}</div>
                        </div>
                        <div class="col-lg-6 col-12 mt-2">
                            <label for="">Cake Filling: </label>
                            <div>{{ $order->filling }}</div>
                        </div>
                        <div class="col-lg-6 col-12 mt-2">
                            <label for="">Cake Shape: </label>
                            <div>{{ $order->shape }}</div>
                        </div>
                        <div class="col-lg-6 col-12 mt-2">
                            <label for="">Cake Size: </label>
                            <div>{{ $order->size }}</div>
                        </div>
                        <div class="col-lg-6 col-12 mt-2">
                            <label for="">Cake Price: </label>
                            <div>RM {{ number_format($order->price, 2) }}</div>
                        </div>
                    </div>
                    <div class="row border-top">
                        <div class="col-lg-6 col-12 mt-2">
                            <label for="">Order Date: </label>
                            <div>{{ date('Y-m-d H:i A', strtotime($order->order_datetime)) }}</div>
                        </div>
                        <div class="col-lg-6 col-12 mt-2">
                            <label for="">Dispatch Date: </label>
                            <div>
                                {{ @$order->dispatch_datetime != null ? date('Y-m-d H:i A', strtotime($order->dispatch_datetime)) : '-' }}
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <label for="">Remarks: </label>
                            <div class="form-control" style="height: 100px">
                                {{ $order->remark }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('product_orders.index') }}" class="btn btn-primary">Return</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
