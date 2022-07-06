@extends('layouts.app')

@section('content')
    <h5 class="mb-4">Update product info</h5>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('products.update') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $product->id }}">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror"
                                    name="name" value="{{ old('name') ?? $product->name }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Price</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('price') {{ 'is-invalid' }} @enderror"
                                    name="price" value="{{ old('price') ?? $product->price }}" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Measuring Unit</label>
                            <div class="col-sm-9">
                                <input type="text"
                                    class="form-control @error('measure_unit') {{ 'is-invalid' }} @enderror"
                                    name="measure_unit" value="{{ old('measure_unit') ?? $product->measure_unit }}"
                                    required>
                                @error('measure_unit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Brand</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('brand') {{ 'is-invalid' }} @enderror"
                                    name="brand" value="{{ old('brand') ?? $product->brand }}" required>
                                @error('brand')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Warning Threshold</label>
                            <div class="col-sm-9 ">
                                <input type="text"
                                    class="form-control @error('warn_threshold') {{ 'is-invalid' }} @enderror"
                                    name="warn_threshold" value="{{ old('warn_threshold') ?? $product->warn_threshold }}"
                                    required>
                                @error('warn_threshold')
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
