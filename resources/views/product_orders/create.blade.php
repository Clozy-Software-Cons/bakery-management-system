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

    <h5 class="mb-4">Create New Order</h5>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('product_orders.store') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Customer Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('cust_name') {{ 'is-invalid' }} @enderror"
                                        name="cust_name" value="{{ old('cust_name') }}" required>
                                    @error('cust_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Customer Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('cust_hpn') {{ 'is-invalid' }} @enderror"
                                        name="cust_hpn" value="{{ old('cust_hpn') }}" required>
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
                                        <option value="Sponge">Sponge</option>
                                        <option value="Butter">Butter</option>
                                        <option value="Cupcake">Cupcake</option>
                                        <option value="Tart">Tart</option>
                                        <option value="20 Cupcake">20 Cupcake</option>
                                        <option value="30 Cupcake">30 Cupcake</option>
                                        <option value="Mousse">Mousse</option>
                                        <option value="Cheese">Cheese</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Cake Quantity</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control @error('quantity') {{ 'is-invalid' }} @enderror"
                                           name="quantity" value="{{ old('quantity') }}" required>
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
                                        <option value="Original">Original</option>
                                        <option value="Chocolate">Chocolate</option>
                                        <option value="Matcha">Matcha</option>
                                        <option value="Dark Chocolate">Dark Chocolate</option>
                                        <option value="Red Velvet">Red Velvet</option>
                                        <option value="Other">Other</option>
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
                                        <option value="Chocolate">Chocolate</option>
                                        <option value="Mocha">Mocha</option>
                                        <option value="Blueberry">Blueberry</option>
                                        <option value="Strawberry">Strawberry</option>
                                        <option value="Mango">Mango</option>
                                        <option value="Peach">Peach</option>
                                        <option value="Other">Other</option>
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
                                        <option value="Round">Round</option>
                                        <option value="Square">Square</option>
                                        <option value="Rectangle">Rectangle</option>
                                        <option value="Heart">Heart</option>
                                        <option value="Other">Other</option>
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
                                        <option value="6 inch">6 inch</option>
                                        <option value="7 inch">7 inch</option>
                                        <option value="8 inch">8 inch</option>
                                        <option value="9 inch">9 inch</option>
                                        <option value="10 inch">10 inch</option>
                                        <option value="12 inch">12 inch</option>
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
                                           name="price" value="{{ old('price') }}" required>
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
                                    <input type="datetime-local" class="form-control @error('order_datetime') {{ 'is-invalid' }} @enderror"
                                           name="order_datetime" value="{{ old('order_datetime') }}" required>
                                    @error('order_datetime')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Dispatch Date</label>
                                <div class="col-sm-9">
                                    <input type="datetime-local" class="form-control @error('dispatch_datetime') {{ 'is-invalid' }} @enderror"
                                           name="dispatch_datetime" value="{{ old('dispatch_datetime') }}" required>
                                    @error('dispatch_datetime')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Dispatch Place</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('dispatch_place') {{ 'is-invalid' }} @enderror"
                                           name="dispatch_place" value="{{ old('dispatch_place') }}" required>
                                    @error('dispatch_place')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 d-flex">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9 btn-group">
                                    <select class="form-control" name="status" required>
                                        <option value="pending" selected>Pending</option>
                                        <option value="ready">Ready</option>
                                        <option value="delivered">Delivered</option>
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
                                              name="remark">{{ old('remark') }}</textarea>
                                    {{--<input type="date" class="form-control @error('dispatch_datetime') {{ 'is-invalid' }} @enderror"
                                           name="name" value="{{ old('dispatch_datetime') }}" required>--}}
                                    @error('remark')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary mx-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
