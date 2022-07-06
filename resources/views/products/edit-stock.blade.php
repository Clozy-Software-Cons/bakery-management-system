@extends('layouts.app')

@section('content')
    <h5 class="mb-4">Update stock info</h5>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('products.update-stock') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $product->id }}">

                        <h5 class="text-dark font-weight-bold">{{ $product->name }}</h5>
                        <p class="text-danger">Current: {{ $product->quantity . ' ' . $product->measure_unit }}</p>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Stock Action</label>
                            <div class="col-sm-9">
                                <select class="form-control @error('stock_action') {{ 'is-invalid' }} @enderror"
                                    name="stock_action">
                                    <option value="1" {{ old('stock_action') == '1' ? 'selected' : '' }}>Inbound
                                    </option>
                                    <option value="2" {{ old('stock_action') == '2' ? 'selected' : '' }}>Outbound
                                    </option>
                                </select>

                                @error('stock_action')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Quantity ({{ $product->measure_unit }})</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('quantity') {{ 'is-invalid' }} @enderror"
                                    name="quantity" value="{{ old('quantity') }}" required>
                                @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
