@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{ session('success') }}
        </div>
    @endif

    <h5 class="mb-4">Edit Order</h5>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('product_orders.update', $order->cust_id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Customer Name</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                           class="form-control @error('cust_name') {{ 'is-invalid' }} @enderror"
                                           name="cust_name" value="{{ old('cust_name', $order->cust_name) }}" required>
                                    @error('cust_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Customer Phone</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                           class="form-control @error('cust_hpn') {{ 'is-invalid' }} @enderror"
                                           name="cust_hpn" value="{{ old('cust_hpn', $order->cust_hpn) }}" required>
                                    @error('cust_hpn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row mt-4">
                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Cake Type</label>
                                <div class="col-sm-9 btn-group">
                                    <select class="form-control" name="type" required>
                                        <option value="">--- Select type ---</option>
                                        @foreach(App\Models\ProductOrder::types() as $key => $type)
                                            <option
                                                value="{{ $key }}" {{ $order->type === $key ? 'selected' : '' }}>
                                                {{ $type }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Cake Quantity</label>
                                <div class="col-sm-9">
                                    <input type="number"
                                           class="form-control @error('quantity') {{ 'is-invalid' }} @enderror"
                                           name="quantity" value="{{ old('quantity', $order->quantity) }}" required>
                                    @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Cake Flavour</label>
                                <div class="col-sm-9 btn-group">
                                    <select class="form-control" name="flavour" required>
                                        <option value="">--- Select flavour ---</option>
                                        @foreach(App\Models\ProductOrder::flavours() as $key => $type)
                                            <option
                                                value="{{ $key }}" {{ $order->flavour === $key ? 'selected' : '' }}>
                                                {{ $type }}</option>
                                        @endforeach
                                    </select>
                                    @error('flavour')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Cake Filling</label>
                                <div class="col-sm-9 btn-group">
                                    <select class="form-control" name="filling" required>
                                        <option value="">--- Select filling ---</option>
                                        @foreach(App\Models\ProductOrder::fillings() as $key => $type)
                                            <option
                                                value="{{ $key }}" {{ $order->filling === $key ? 'selected' : '' }}>
                                                {{ $type }}</option>
                                        @endforeach
                                    </select>
                                    @error('filling')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Cake Shape</label>
                                <div class="col-sm-9 btn-group">
                                    <select class="form-control" name="shape" required>
                                        <option value="">--- Select shape ---</option>
                                        @foreach(App\Models\ProductOrder::shapes() as $key => $type)
                                            <option
                                                value="{{ $key }}" {{ $order->shape === $key ? 'selected' : '' }}>
                                                {{ $type }}</option>
                                        @endforeach
                                    </select>
                                    @error('shape')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Cake Size</label>
                                <div class="col-sm-9 btn-group">
                                    <select class="form-control" name="size" required>
                                        <option value="">--- Select size ---</option>
                                        @foreach(App\Models\ProductOrder::sizes() as $key => $type)
                                            <option
                                                value="{{ $key }}" {{ $order->size === $key ? 'selected' : '' }}>
                                                {{ $type }}</option>
                                        @endforeach
                                    </select>
                                    @error('size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Cake Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('price') {{ 'is-invalid' }} @enderror"
                                           name="price" value="{{ old('price', $order->price) }}" required>
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row mt-4">
                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Order Date</label>
                                <div class="col-sm-9">
                                    <input type="datetime-local"
                                           class="form-control @error('order_datetime') {{ 'is-invalid' }} @enderror"
                                           name="order_datetime" value="{{ old('order_datetime', $order->order_datetime) }}" required>
                                    @error('order_datetime')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Dispatch Date</label>
                                <div class="col-sm-9">
                                    <input type="datetime-local"
                                           class="form-control @error('dispatch_datetime') {{ 'is-invalid' }} @enderror"
                                           name="dispatch_datetime" value="{{ old('dispatch_datetime', $order->dispatch_datetime) }}" required>
                                    @error('dispatch_datetime')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Dispatch Place</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                           class="form-control @error('dispatch_place') {{ 'is-invalid' }} @enderror"
                                           name="dispatch_place" value="{{ old('dispatch_place', $order->dispatch_place) }}" required>
                                    @error('dispatch_place')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9 btn-group">
                                    <select class="form-control" name="status" required>
                                        @foreach(App\Models\ProductOrder::statuses() as $key => $type)
                                            <option
                                                value="{{ $key }}" {{ $order->status === $key ? 'selected' : '' }}>
                                                {{ $type }}</option>
                                        @endforeach
                                    </select>
                                    @error('size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Remarks</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control @error('remark') {{ 'is-invalid' }} @enderror"
                                              name="remark">{{ old('remark', $order->remark) }}</textarea>
                                    {{--<input type="date" class="form-control @error('dispatch_datetime') {{ 'is-invalid' }} @enderror"
                                           name="name" value="{{ old('dispatch_datetime') }}" required>--}}
                                    @error('remark')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary mx-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
